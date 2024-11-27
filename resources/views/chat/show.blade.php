@extends('layouts.app')

@section('title', 'Chat')

@section('content')
<div class="container py-4 caregiver-chat-container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm border-0 caregiver-chat-card">
                <!-- ส่วนหัว -->
                <div class="card-header caregiver-chat-header d-flex align-items-center">
                    <img src="{{ $conversation->users->where('id', '!=', auth()->id())->first()->avatar_url ?? asset('images/default-avatar.png') }}" 
                        alt="{{ $conversation->users->where('id', '!=', auth()->id())->first()->name ?? 'Unknown User' }}" 
                        class="rounded-circle me-2 chat-header-profile">
                    <h5 class="mb-0">แชทกับ {{ $conversation->users->where('id', '!=', auth()->id())->first()->name }}</h5>
                </div>

                <!-- กล่องข้อความ -->
                <div class="card-body p-0 caregiver-chat-body">
                    <div class="caregiver-chat-box" id="chat-box">
                        <!-- ข้อความจะถูกเพิ่มที่นี่จาก AJAX -->
                    </div>
                </div>

                <!-- ฟอร์มส่งข้อความ -->
                <div class="p-3 caregiver-chat-footer">
                    <form id="chat-form">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="message" name="message" autocomplete="off" class="form-control caregiver-chat-input" placeholder="Type your message..." required>
                            <button type="submit" class="btn caregiver-chat-send-btn">
                                <i class="fa fa-paper-plane px-2 pe-3" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .text-read {
        margin-top: -12.5px;
    }

    /* รูปโปรไฟล์ในส่วนหัว */
    .chat-header-profile {
        width: 40px; /* ขนาดความกว้าง */
        height: 40px; /* ขนาดความสูง */
        object-fit: cover; /* ทำให้รูปภาพไม่บิดเบี้ยว */
        border-radius: 50%; /* ทำให้เป็นวงกลม */
        border: 2px solid #ffffff; /* เพิ่มขอบสีขาว */
    }

    /* รูปโปรไฟล์ในกล่องแชท */
    .chat-profile-image {
        width: 40px; /* ขนาดรูปโปรไฟล์ */
        height: 40px;
        object-fit: cover;
        border-radius: 50%; /* ทำให้รูปภาพเป็นวงกลม */
        border: 1px solid #ddd; /* เส้นขอบบาง */
    }

    /* คอนเทนเนอร์หลัก */
    .caregiver-chat-container {
        padding: 20px;
        border-radius: 10px;
    }

    /* กล่องแชท */
    .caregiver-chat-box {
        padding: 20px;
        background-color: #e7e7e7; /* พื้นหลังสีเข้ม */
        height: 450px;
        overflow-y: auto;
    }

    /* Bubble ข้อความ */
    .caregiver-chat-bubble {
        max-width: 70%;
        padding: 10px 15px;
        border-radius: 18px; /* ทำให้โค้งมน */
        font-size: 1rem;
        line-height: 1.5;
        word-wrap: break-word;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .caregiver-chat-bubble-user {
        background-color: #e6890b; /* สีข้อความของผู้ใช้ */
        color: #ffffff;
        text-align: left;
        border-bottom-right-radius: 4px; /* มุมขวาล่าง */
        border-bottom-left-radius: 18px;
    }

    .caregiver-chat-bubble-other {
        background-color: #467061; /* สีข้อความของคู่สนทนา */
        color: #ffffff;
        text-align: left;
        border-bottom-left-radius: 4px; /* มุมซ้ายล่าง */
        border-bottom-right-radius: 18px;
    }

    /* รูปโปรไฟล์ */
    .chat-profile-image {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%; /* ทำให้รูปเป็นวงกลม */
        border: 2px solid #ffffff; /* ขอบสีขาว */
    }

    /* ส่วนหัว */
    .caregiver-chat-header {
        background-color: #003e29; /* สีโทนอบอุ่น */
        color: #ffffff;
        padding: 15px;
        border-bottom: none;
        border-radius: 10px 10px 0 0;
    }

    /* ช่องป้อนข้อความ */
    .caregiver-chat-input {
        background-color: #e7e7e7;
        color: #333;
        border: none;
        border-radius: 20px 0 0 20px;
        padding: 10px 15px;
    }

    .caregiver-chat-send-btn {
        background-color: #467061;
        border: none;
        color: #ffffff;
        border-radius: 0 20px 20px 0;
        transition: background-color 0.2s ease-in-out, transform 0.1s;
    }

    .caregiver-chat-send-btn:hover {
        background-color: #37584e; /* สี Hover ของปุ่ม */
        transform: scale(1.05);
    }

    /* ส่วน Footer */
    .caregiver-chat-footer {
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 0 0 10px 10px;
    }

    /* การตอบสนองสำหรับมือถือ */
    @media (max-width: 768px) {
        .caregiver-chat-box {
            height: 300px;
        }

        .caregiver-chat-bubble {
            max-width: 85%;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const chatBox = document.getElementById('chat-box');
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message');
    const authUserId = {{ auth()->id() }};
    const conversationId = {{ $conversation->id }};

    // ฟังก์ชันดึงข้อความ
    const fetchMessages = () => {
        fetch(`/chat/${conversationId}/messages`)
            .then(response => response.json())
            .then(messages => {
                chatBox.innerHTML = ''; // ลบข้อความเก่า
                messages.forEach(message => {
                    const isMine = message.user_id === authUserId;

                    chatBox.innerHTML += `
                        <div class="d-flex ${isMine ? 'justify-content-end' : 'justify-content-start'} mb-3 align-items-start">
                            <div class="caregiver-chat-bubble ${isMine ? 'caregiver-chat-bubble-user' : 'caregiver-chat-bubble-other'}">
                                <p class="m-0 text-white">${message.content}</p>
                            </div>
                        </div>
                    `;
                });
                chatBox.scrollTop = chatBox.scrollHeight; // เลื่อนลงไปยังข้อความล่าสุด
            });
    };

    // เรียกใช้ฟังก์ชันเพื่อโหลดข้อความเมื่อหน้าโหลด
    fetchMessages();

    // Polling: ดึงข้อความทุกๆ 3 วินาที
    setInterval(fetchMessages, 3000); // ทุกๆ 3 วินาที

    // ส่งข้อความใหม่
    chatForm.addEventListener('submit', e => {
        e.preventDefault();
        const message = messageInput.value;

        if (message.trim() !== '') {
            fetch(`/chat/${conversationId}/send`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message })
            })
            .then(response => response.json())
            .then(data => {
                messageInput.value = ''; // ล้างข้อความ
                fetchMessages(); // รีเฟรชข้อความ
            });
        }
    });
});

</script>

@endsection
