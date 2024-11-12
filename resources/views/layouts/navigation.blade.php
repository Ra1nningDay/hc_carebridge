{{-- <style>
    .nav-link.active {
        border-bottom: 2px solid black;
    }
</style> --}}

<nav class="navbar navbar-expand-lg border bg-white sticky-top">
    <div class="container-fluid" style="max-width: 1320px;">
        <div class="">
            <a class="navbar-brand d-flex align-items-center text-black fs-4" href="{{ route('welcome') }}">
                <img src="{{ asset('images/logos/logo-brand.png') }}" alt="logo-brand" class="img-fluid">
                <div class="d-flex flex-column">
                    <span class="fw-bold ps-1" style="font-size: 28px">CareBridge</span>
                </div>
            </a>
        </div>

        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <form class="m-0 d-none d-md-flex px-2" action="" method="get">
            <div class="input-group">
                <div class="position-relative">
                    <input type="text" class="form-control border rounded-pill py-2" placeholder="Search" aria-label="Search" style="border-radius: 20px; padding-left: 35px; width:400px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search position-absolute" viewBox="0 0 16 16" style="top: 50%; left: 10px; transform: translateY(-50%);">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                    </svg>
                </div>
            </div>              
        </form>

        <div class="collapse navbar-collapse justify-content-start px-2" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0 active" href="{{route('welcome')}}">Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0" href="#">Hire Caregivers</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0" href="#">Find Jobs</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black px-3 py-0" href="{{route('posts.index')}}">Blog</a>
                </li>
            </ul>
        </div>

        @auth
        <div class="dropdown d-flex">
                <div class="d-flex justify-content-center align-items-center px-2 ">
                    <a class="text-black text-decoration-none d-flex align-items-center" href="{{route('posts.create')}}">
                        <span class="me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                            </svg>
                        </span>
                        <span>Create</span>
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <a class="text-black text-decoration-none d-flex align-items-center" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4"/>
                        </svg>
                    </a>
                </div>
            
            <button class="btn rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="" width="32" height="32" alt="">
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                <li><a class="dropdown-item" href="{{route('profile.posts',  Auth::id())}}">My Posts</a></li>
                <li><a class="dropdown-item" href="#">Manage Subscriptions</a></li>
                <li><a class="dropdown-item" href="#">Setting</a></li>
                <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>                
            </ul>            
        </div>
        @else
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
            <ul class="navbar-nav d-none d-md-flex">
                <li class="nav-item">
                    <div class="p-1 rounded-5 px-2 mb-2 mb-md-0">
                        <a class="nav-link text-black" href="{{ route('register') }}">Sign up</a>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="bg-dark p-1 px-3 rounded-5">
                        <a class="nav-link link-secondary text-white" href="{{ route('login') }}">Log in</a>
                    </div>
                </li>
            </ul>
        </div>
        @endauth
    </div>
</nav>
