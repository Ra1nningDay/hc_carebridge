<?php 
use App\Http\Controllers\ChatController;

Route::middleware(['auth'])->group(function () {
    // เริ่มต้นการสนทนา
    Route::get('/chat/start/{userId}', [ChatController::class, 'startConversation'])->name('chat.start');
    
    // แสดงหน้าแชท
    Route::get('/chat/{id}', [ChatController::class, 'showConversation'])->name('chat.show');
    
    // ส่งข้อความ
    Route::post('/chat/{id}/send', [ChatController::class, 'sendMessage'])->name('chat.send');
});

