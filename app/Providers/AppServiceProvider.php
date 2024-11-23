<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;
use App\Models\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // กำหนดภาษาเริ่มต้น
        $locale = session('locale', 'en');
        app()->setLocale($locale);

        // View Composer สำหรับ layouts.navigation
        View::composer('layouts.navigation', function ($view) {
            $userId = Auth::id(); // ตรวจสอบว่า user ล็อกอินหรือยัง

            if ($userId) {
                // ดึงบทสนทนาของผู้ใช้
                $conversations = Conversation::whereHas('users', function ($query) use ($userId) {
                    $query->where('users.id', $userId); // ระบุตาราง 'users' ชัดเจน
                })->with(['users', 'messages'])->get();

                // นับจำนวนข้อความที่ยังไม่ได้อ่าน
                $unreadMessages = Message::where('is_read', false)
                    ->whereHas('conversation.users', function ($query) use ($userId) {
                        $query->where('users.id', $userId); // ระบุตาราง 'users' ชัดเจน
                    })->count();
            } else {
                $conversations = collect(); // สร้าง collection ว่าง
                $unreadMessages = 0;
            }

            // ส่งตัวแปรไปที่ Blade
            $view->with(compact('conversations', 'unreadMessages'));
        });

    }
}
