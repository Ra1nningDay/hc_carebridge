<nav class="navbar navbar-expand-lg border bg-white sticky-top">
    <div class="container-fluid px-4">
        <!-- Logo and Brand Name -->
        <a class="navbar-brand d-flex align-items-center text-black fs-4" href="{{ route('welcome') }}">
            <img src="{{ asset('images/logos/logo-brand.png') }}" width="50" height="50" alt="logo-brand" class="img-fluid">
            <span class="fw-bold ps-1" style="font-size: 28px">{{ __("CareBridge") }}</span>
        </a>

        <!-- Navbar Toggler for Small Screens -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Search Bar (only visible on medium and larger screens) -->
        <form class="m-0 d-none d-md-flex px-2" action="" method="get">
            <div class="input-group">
                <div class="position-relative">
                    <input type="text" class="form-control border rounded-pill py-2" placeholder="{{ __('Search') }}" aria-label="{{ __('Search') }}" style="border-radius: 20px; padding-left: 35px; width:400px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search position-absolute" viewBox="0 0 16 16" style="top: 50%; left: 10px; transform: translateY(-50%);">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
            </div>              
        </form>

        <!-- Collapsible Navbar Links -->
        <div class="collapse navbar-collapse justify-content-start px-2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0 active" href="{{route('welcome')}}">{{ __('Explore') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0" href="{{route('caregiver')}}">{{ __('Hire Caregivers') }}</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0" href="{{route('posts.index')}}">{{ __('Blog') }}</a>
                </li>
            </ul>
        </div>

        <!-- Authentication Links or User Menu -->
        @auth
        <div class="d-flex align-items-center">
            <!-- Create Post Icon -->
            <a class="text-black text-decoration-none d-flex align-items-center me-3" href="{{route('posts.create')}}">
                <span class="me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </span>
                <span>{{ __('Create') }}</span>
            </a>

            <!-- Profile Dropdown -->
            <button class="btn rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle" src="{{ asset('images/user-profile.png') }}" width="32" height="32" alt="">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{route('profile.index')}}">{{ __('Profile') }}</a></li>
                <li><a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Edit Profile') }}</a></li>
                <li><a class="dropdown-item" href="{{route('caregiver.register')}}">{{ __('Become a Caregiver') }}</a></li>
                <li><a class="dropdown-item" href="#">{{ __('Manage Subscriptions') }}</a></li>
                <li><a class="dropdown-item" href="#">{{ __('Settings') }}</a></li>
                <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        @else
        <!-- Sign Up and Login Buttons for Guests -->
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center ms-3">
            <a href="{{ route('register') }}" class="btn btn-outline-dark rounded-pill mb-2 mb-md-0 me-md-2">{{ __('Sign up') }}</a>
            <a href="{{ route('login') }}" class="btn btn-dark rounded-pill">{{ __('Log in') }}</a>
        </div>
        @endauth
    </div>
</nav>
