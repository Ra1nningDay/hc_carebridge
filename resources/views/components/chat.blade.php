<div>
    <!-- ปุ่มแชท -->
    <div class="chat-btn" onclick="toggleChat()">
        <i class="bi bi-chat-dots"></i>
    </div>

    <!-- กล่องแชท -->
    <div class="chat-box">
        <div class="chat-header text-white bg-primary">
            Chatbot
            <button class="close-chat" onclick="toggleChat()">&times;</button>
        </div>
        <div class="chat-body" id="chat-body">
            <p class="text-muted">Bot: Hello! How can I assist you today?</p>
        </div>
        <div class="chat-footer">
            <input type="text" id="user-message" placeholder="Type a message..." />
            <button onclick="sendMessage()"><i class="bi bi-send"></i></button>
        </div>
    </div>

    <!-- Styles -->
    <style>
        .chat-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #007bff;
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .chat-btn:hover {
            transform: scale(1.1);
        }

        .chat-btn i {
            color: #fff;
            font-size: 24px;
        }

        .chat-box {
            position: fixed;
            bottom: 90px;
            right: 20px;
            width: 350px;
            height: 0;
            background: #f8f9fa;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 999;
        }

        .chat-box.active {
            height: 500px;
            opacity: 1;
            transform: translateY(0);
        }

        .chat-header {
            padding: 10px;
            text-align: center;
            font-weight: bold;
            position: relative;
        }

        .close-chat {
            position: absolute;
            top: 5px;
            right: 10px;
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
        }

        .chat-body {
            padding: 10px;
            height: calc(100% - 80px);
            overflow-y: auto;
            background: #f1f1f1;
        }

        .chat-footer {
            padding: 10px;
            background: #e9ecef;
            display: flex;
            gap: 10px;
        }

        .chat-footer input {
            flex: 1;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid #ced4da;
            font-size: 14px;
        }

        .chat-footer button {
            background: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 8px 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-body p {
            padding: 8px 12px;
            border-radius: 20px;
            max-width: 80%;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .chat-body .text-start {
            background-color: #d1e7dd;
            align-self: flex-start;
        }

        .chat-body .text-end {
            background-color: #f8d7da;
            align-self: flex-end;
        }

        .chat-body .text-muted {
            font-style: italic;
            font-size: 12px;
            color: #6c757d;
        }
    </style>

    <!-- Script -->
    <script>
        function toggleChat() {
            const chatBox = document.querySelector('.chat-box');
            chatBox.classList.toggle('active');
        }

        async function sendMessage() {
            const messageInput = document.getElementById('user-message');
            const message = messageInput.value.trim();

            if (message === '') return;

            // แสดงข้อความของผู้ใช้ในแชท
            const chatBody = document.getElementById('chat-body');
            const userMessageElem = document.createElement('p');
            userMessageElem.textContent = message;
            userMessageElem.classList.add('text-end');
            chatBody.appendChild(userMessageElem);

            // ล้างช่องกรอกข้อความ
            messageInput.value = '';

            // เรียก API ผ่าน Laravel route
            try {
                const response = await fetch('{{ route('chatbot.message') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ message }),
                });

                const data = await response.json();

                // แสดงข้อความตอบกลับจากบอท
                const botMessageElem = document.createElement('p');
                botMessageElem.textContent = data.reply;
                botMessageElem.classList.add('text-start');
                chatBody.appendChild(botMessageElem);
            } catch (error) {
                console.error('Error:', error);
                const errorMessageElem = document.createElement('p');
                errorMessageElem.textContent = 'Error: Unable to connect to the chatbot.';
                errorMessageElem.classList.add('text-danger');
                chatBody.appendChild(errorMessageElem);
            }

            // เลื่อนแชทไปด้านล่าง
            chatBody.scrollTop = chatBody.scrollHeight;
        }
    </script>
</div>
