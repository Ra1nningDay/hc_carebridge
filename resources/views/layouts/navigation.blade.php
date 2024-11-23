<nav class="navbar navbar-expand-lg border bg-white sticky-top animated-navbar">
    <div class="container-fluid px-4">
        <!-- โลโก้และชื่อแบรนด์ -->
        <a class="navbar-brand d-flex align-items-center text-black fs-4 logo-animation" href="{{ route('welcome') }}">
            <img src="{{ asset('images/logos/logo-brand.png') }}" width="50" height="50" alt="โลโก้แบรนด์" class="img-fluid">
            <span class="fw-bold ps-1" style="font-size: 28px; color: #003e29;">CareBridge</span>
        </a>

        <!-- ปุ่ม Navbar Toggler -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- แถบค้นหา -->
        <form class="m-0 d-md-none d-sm-none d-lg-block px-2 search-bar-animation" action="" method="get">
            <div class="input-group">
                <div class="position-relative">
                    <input type="text" class="form-control border rounded-pill py-2" placeholder="ค้นหา" aria-label="ค้นหา" style="border-radius: 20px; padding-left: 35px; width:400px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search position-absolute" viewBox="0 0 16 16" style="top: 50%; left: 10px; transform: translateY(-50%);">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
            </div>              
        </form>

        <!-- เมนู Collapse -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- เมนู Navbar -->
            <ul class="navbar-nav text-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0 active nav-hover" href="{{route('welcome')}}">สำรวจ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0 nav-hover" href="{{route('caregiver')}}">ค้นหาผู้ดูแล</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0 nav-hover" href="{{route('posts.index')}}">บทความ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0 nav-hover" href="{{route('survey.list')}}">ประเมินสุขภาพ</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0 nav-hover" href="{{route('contact')}}">ติดต่อเรา</a>
                </li>
            </ul>

            <!-- เมนูสำหรับผู้ใช้ที่ล็อกอิน -->
            @auth
            <div class="d-flex flex-column flex-lg-row align-items-center ms-lg-auto">

                <!-- ไอคอนสร้างโพสต์ -->
                <a class="text-black text-decoration-none d-flex align-items-center me-0 me-lg-3 mb-3 mb-lg-0" href="{{route('posts.create')}}">
                    <span class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </span>
                    <span>สร้างโพสต์</span>
                </a>

                <!-- Notification Icon -->
                <div class="dropdown position-relative me-3">
                    <button class="btn btn-light border-0 position-relative" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path d="M2 3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H5.414l-3.707 3.707a1 1 0 0 1-1.707-.707V3zm2-1a2 2 0 0 0-2 2v9.586l3-3H13a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H4z"/>
                            <path d="M7.066 5.993a.5.5 0 1 0-.933-.357 3.002 3.002 0 0 0 5.734 0 .5.5 0 1 0-.933.357 2.002 2.002 0 0 1-3.868 0z"/>
                            <path d="M4.066 8.993a.5.5 0 1 0-.933-.357 3.002 3.002 0 0 0 5.734 0 .5.5 0 1 0-.933.357 2.002 2.002 0 0 1-3.868 0z"/>
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notificationCount">
                            3
                        </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="notificationDropdown" style="width: 300px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="chatDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-chat-dots"></i>
                                @if (isset($unreadMessages) && $unreadMessages > 0)
                                    <span class="badge bg-danger">{{ $unreadMessages }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatDropdown">
                                @if (isset($conversations) && $conversations->isNotEmpty())
                                    @foreach ($conversations as $conversation)
                                        <li>
                                            <a href="{{ route('chat.show', $conversation->id) }}" class="dropdown-item">
                                                <strong>{{ $conversation->users->firstWhere('id', '!=', Auth::id())->name }}</strong>
                                                <p class="mb-0 text-truncate">
                                                    {{ $conversation->messages->first()->message ?? 'No messages yet' }}
                                                </p>
                                            </a>
                                        </li>
                                    @endforeach
                                @else
                                    <li><span class="dropdown-item text-muted">No Conversations</span></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- เมนูผู้ใช้ -->
                <button class="btn profile-animation mb-3 mb-lg-0 p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" src="{{ auth()->user()->avatar_url }}" width="32" height="32" alt="">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-animation">
                    <li><a class="dropdown-item" href="{{route('profile.index')}}">โปรไฟล์</a></li>
                    <li><a class="dropdown-item" href="{{route('profile.edit')}}">แก้ไขโปรไฟล์</a></li>
                    <li><a class="dropdown-item" href="{{route('caregiver.register')}}">สมัครเป็นผู้ดูแล</a></li>
                    <li><a class="dropdown-item" href="#">การตั้งค่า</a></li>
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <!-- ปุ่มสมัครและเข้าสู่ระบบ -->
            <div class="d-flex flex-column flex-lg-row ms-auto">
                <a href="{{ route('register') }}" class="btn rounded-pill mb-2 mb-lg-0 me-lg-2">สมัครสมาชิก</a>
                <a href="{{ route('login') }}" class="btn rounded-pill text-white" style="background-color: #003d2b;">เข้าสู่ระบบ</a>
            </div>
            @endauth
        </div>
    </div>
</nav>
