<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // เริ่มต้นบทสนทนา
    public function startConversation($userId)
    {
        $conversation = Conversation::whereHas('users', function ($query) {
            $query->where('users.id', Auth::id());
        })->whereHas('users', function ($query) use ($userId) {
            $query->where('users.id', $userId);
        })->first();

        if (!$conversation) {
            $conversation = Conversation::create(['title' => 'Conversation']);
            $conversation->users()->attach([Auth::id(), $userId]);
        }

        return redirect()->route('chat.show', $conversation->id);
    }

    // แสดงหน้าแชท
    public function showConversation($id)
    {
        $conversation = Conversation::with(['messages.user', 'users'])->findOrFail($id);

        if (!$conversation->users->contains(Auth::id())) {
            abort(403, 'Unauthorized action.');
        }

        Message::where('conversation_id', $id)
            ->where('is_read', false)
            ->where('user_id', '!=', Auth::id())
            ->update(['is_read' => true]);

        return view('chat.show', compact('conversation'));
    }

    // ส่งข้อความ
    public function sendMessage(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);

        if (!$conversation->users->contains(Auth::id())) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'message' => 'required|string|max:1000',
        ]); 

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'content' => $request->message,
            'is_read' => false,
        ]);

        return response()->json($message);
    }

    // ดึงข้อความทั้งหมดในบทสนทนา
    public function fetchMessages($conversationId)
    {
        $conversation = Conversation::find($conversationId);

        // ดึงข้อความทั้งหมดพร้อมข้อมูลผู้ใช้
        $messages = $conversation->messages()->with('user')->get();

        // ส่งข้อมูลกลับไปยัง client-side (AJAX)
        return response()->json($messages);
    }
}
