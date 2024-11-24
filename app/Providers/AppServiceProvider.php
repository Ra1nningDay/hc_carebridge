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
            $userId = Auth::id();

            if ($userId) {
                $conversations = Conversation::whereHas('users', function ($query) use ($userId) {
                    $query->where('users.id', $userId);
                })
                ->with(['users', 'messages' => function ($query) {
                    $query->latest();
                }])
                ->get();

                // Count unread messages
                $unreadMessages = Message::where('is_read', false)
                    ->whereHas('conversation.users', function ($query) use ($userId) {
                        $query->where('users.id', $userId);
                    })
                    ->count();
            } else {
                $conversations = collect();
                $unreadMessages = 0;
            }

            $view->with(compact('conversations', 'unreadMessages'));
        });

    }
}
