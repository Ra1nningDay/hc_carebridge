<nav class="navbar navbar-expand-lg border bg-white sticky-top animated-navbar">
    <div class="container-fluid px-4">
        <!-- Logo and Brand Name -->
        <a class="navbar-brand d-flex align-items-center text-black fs-4 logo-animation" href="{{ route('welcome') }}">
            <img src="{{ asset('images/logos/logo-brand.png') }}" width="50" height="50" alt="Brand Logo" class="img-fluid">
            <span class="fw-bold ps-1" style="font-size: 28px; color: #003e29;">CareBridge</span>
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Center Menu Items -->
            <ul class="navbar-nav mx-auto text-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-1 active nav-hover" href="{{ route('welcome') }}">สำรวจ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-1 nav-hover" href="{{ route('caregiver') }}">ค้นหาผู้ดูแล</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-1 nav-hover" href="{{ route('posts.index') }}">บทความ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-1 nav-hover" href="{{ route('survey.list') }}">ประเมินสุขภาพ</a>
                </li>
            </ul>

            <!-- Authenticated User Menu -->
            @auth
            <div class="d-flex align-items-center ms-lg-auto">
                <!-- Create Post Icon -->
                <a class="text-black text-decoration-none d-flex align-items-center me-3" href="{{ route('posts.create') }}">
                    <span class="me-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                    </span>
                    <span>สร้างโพสต์</span>
                </a>

                <!-- Profile Dropdown -->
                <button class="btn profile-animation p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" src="{{ auth()->user()->avatar_url }}" width="32" height="32" alt="User Profile">
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-animation">
                    <li><a class="dropdown-item" href="{{ route('profile.index') }}">โปรไฟล์</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">แก้ไขโปรไฟล์</a></li>
                    <li><a class="dropdown-item" href="{{ route('caregiver.register') }}">สมัครเป็นผู้ดูแล</a></li>
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
            <!-- Login/Sign-up Buttons -->
            <div class="d-flex flex-column flex-lg-row ms-auto">
                <a href="{{ route('register') }}" class="btn rounded-pill mb-2 mb-lg-0 me-lg-2">สมัครสมาชิก</a>
                <a href="{{ route('login') }}" class="btn rounded-pill text-white" style="background-color: #003d2b;">เข้าสู่ระบบ</a>
            </div>
            @endauth
        </div>
    </div>
</nav>

<!-- CSS -->
<style>
    /* Navbar Animations */
    .animated-navbar {
        animation: fadeIn 1s ease-in-out;
    }

    /* Navbar Responsiveness */
    @media (max-width: 1024px) {
        .navbar {
            padding: 10px 20px;
        }
        .navbar-brand img {
            width: 40px;
            height: 40px;
        }
        .navbar-brand span {
            font-size: 22px;
        }
        .navbar-toggler {
            padding: 8px 10px;
        }
        .nav-link {
            font-size: 0.9rem;
        }
        .btn {
            font-size: 0.85rem;
            padding: 8px 10px;
        }
    }

    /* Mobile Specific Styles */
    @media (max-width: 768px) {
        .navbar-brand span {
            font-size: 18px;
        }
        .nav-link {
            font-size: 0.85rem;
            padding: 6px 8px;
        }
        .btn {
            font-size: 0.8rem;
            padding: 6px 8px;
        }
        .profile-animation img {
            width: 28px;
            height: 28px;
        }
    }

    /* Navbar Link Hover */
    .nav-hover:hover {
        color: #bcbdbc !important;
        transition: all 0.3s ease;
    }

    /* Keyframes */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Dropdown Menu Animation */
    .dropdown-animation {
        animation: slideDown 0.5s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
