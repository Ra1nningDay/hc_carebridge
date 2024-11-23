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
        // ค้นหาว่ามีการสนทนาระหว่างผู้ใช้สองคนนี้หรือไม่
        $conversation = Conversation::whereHas('users', function ($query) {
            $query->where('id', Auth::id());
        })->whereHas('users', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->first();

        // หากไม่มีบทสนทนา ให้สร้างบทสนทนาใหม่
        if (!$conversation) {
            $conversation = Conversation::create();
            $conversation->users()->attach([Auth::id(), $userId]);
        }

        return redirect()->route('chat.show', $conversation->id);
    }

    // แสดงหน้าแชท
    public function showConversation($id)
    {
        $conversation = Conversation::with(['messages.user'])->findOrFail($id);

        // ตรวจสอบสิทธิ์ในการเข้าถึง
        if (!$conversation->users->contains(Auth::id())) {
            abort(403, 'Unauthorized action.');
        }

        return view('chat.show', compact('conversation'));
    }

    // ส่งข้อความ
    public function sendMessage(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);

        // ตรวจสอบสิทธิ์ในการส่งข้อความ
        if (!$conversation->users->contains(Auth::id())) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::id(),
            'content' => $request->message,
            'is_read' => false, // กำหนดข้อความเริ่มต้นว่ายังไม่ได้อ่าน
        ]);

        return redirect()->route('chat.show', $conversation->id);
    }

    // ฟังก์ชันสำหรับแสดงบทสนทนาของผู้ใช้ปัจจุบัน
    public function getUserConversations()
    {
        $userId = Auth::id();

        // ดึงข้อมูลบทสนทนาทั้งหมดของผู้ใช้
        $conversations = Conversation::whereHas('users', function ($query) use ($userId) {
            $query->where('id', $userId);
        })->with(['messages' => function ($query) {
            $query->latest();
        }])->get();

        // นับจำนวนข้อความที่ยังไม่ได้อ่าน
        $unreadMessages = Message::where('is_read', false)
            ->whereHas('conversation.users', function ($query) use ($userId) {
                $query->where('id', $userId);
            })->count();

        return compact('conversations', 'unreadMessages');
    }

    // อัปเดตสถานะข้อความเป็น "อ่านแล้ว"
    public function markMessageAsRead($conversationId)
    {
        $conversation = Conversation::findOrFail($conversationId);

        // ตรวจสอบสิทธิ์
        if (!$conversation->users->contains(Auth::id())) {
            abort(403, 'Unauthorized action.');
        }

        Message::where('conversation_id', $conversationId)
            ->where('is_read', false)
            ->update(['is_read' => true]);
    }
}
