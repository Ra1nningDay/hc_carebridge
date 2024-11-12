@extends('layouts.app')

@section('title', 'CareBridge - Bridging Healthcare and Support')

@section('content')
        @include('home_partials.carousel')

        {{-- Find Caregiver Section --}}
        @include('home_partials.find_caregiver')


        {{-- Service Section --}}
        <section class="" style="margin-bottom: 72px;">
            <div class="container" style="max-width: 1080px;">
                <div class="d-flex justify-content-center">
                    <h2 class="fw-bold d-inline-block pb-2" style="border-bottom: 4px solid green;">Our Services</h2>
                </div>
                <p class="text-muted text-center">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                
                <div class="row g-3 mt-5">
                    <!-- Service Card 1 (Left) -->
                    <div class="col-md-12 mb-4 d-flex">
                        <div class="col-6 d-flex align-items-center justify-content-center">
                            <img src="https://via.placeholder.com/400x300" alt="Caregiver Image" class="img-fluid rounded-5">
                        </div>
                        <div class="col-6">
                            <div class="">
                                <div class="text-start" style="padding: 36px 0px 36px 0px">
                                    <div class="mb-3">
                                        <img src="https://via.placeholder.com/50" alt="Icon" class="img-fluid">
                                    </div>
                                    <h5 class="-title fw-bold" style="border-bottom: 4px solid #6e6e6e76; display: inline;">Caregivers</h5>
                                    <p class="-text text-muted mt-3">Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service Card 2 (Right) -->
                    <div class="col-md-12 mb-4 d-flex flex-row-reverse">
                        <div class="col-6 d-flex align-items-center justify-content-center">
                            <img src="https://via.placeholder.com/400x300" alt="Community Image" class="img-fluid rounded-5">
                        </div>
                        <div class="col-6">
                            <div class="">
                                <div class="text-end" style="padding: 36px 0px 36px 36px">
                                    <div class="mb-3">
                                        <img src="https://via.placeholder.com/50" alt="Icon" class="img-fluid">
                                    </div>
                                    <h5 class="card-title fw-bold" style="border-bottom: 4px solid #6e6e6e76; display: inline;">Community</h5>
                                    <p class="card-text text-muted mt-3">Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <!-- Service Card 3 (Left) -->
                    <div class="col-md-12 mb-4 d-flex">
                        <div class="col-6">
                            <div class="">
                                <div class="" style="padding: 36px 36px">
                                    <div class="mb-3">
                                        <img src="https://via.placeholder.com/50" alt="Icon" class="img-fluid">
                                    </div>
                                    <h5 class="card-title fw-bold" style="border-bottom: 4px solid #6e6e6e76; display: inline;">Chatbot</h5>
                                    <p class="card-text text-muted mt-3">Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-flex align-items-center justify-content-center">
                            <img src="https://via.placeholder.com/400x300" alt="Chatbot Image" class="img-fluid rounded-5">
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

         {{-- About Us Section --}}
        <section class="" style="margin-bottom: 108px;">
            <div class="container">
                <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="position-relative">
                            <img class="img-fluid rounded-3" loading="lazy" src="{{ asset('images/carousels/older1.png')}}" alt="About 1" style="height: 460px;">
                            <div class="position-absolute rounded-3 w-100 h-100 top-0" style="background-color: rgba(0, 0, 0, 0.2);"></div>
                            <div class="position-absolute rounded-3 bottom-0 w-100" style="background-color: rgba(0, 0, 0, 0.5);">
                                <div class="p-4">
                                    <h3 class="text-white fs-3">Making Every Day a<br> <span style="border-bottom: 4px solid white;">Quality Day for the Elderly</span></h3>
                                    {{-- <hr class="mb-0 text-white"> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="row justify-content-xl-center">
                            <div class="col-12 col-xl-11">
                                <h2 class="fw-bold d-inline-block pb-2" style="border-bottom: 4px solid green;">About Us?</h2>
                                <p class="lead fs-4 text-secondary mb-3">We are a group of students dedicated to creating a website for elderly care, aiming to improve their quality of life by providing health information, matching them with suitable caregivers, and offering services that meet their needs.
                                </p>
                                <p class="mb-5">Our choice to create this website isn’t merely about completing a project; we genuinely recognize the importance and real needs of the elderly, who often require care and access to reliable information. Our team strives to design an easy-to-use system, enabling the elderly and their families to access services and information conveniently and securely.</p>
                                <div class="row gy-4 gy-md-0 gx-xxl-5X">
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex">
                                            <div class="me-4 text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="h4 mb-3" >Versatile Brand</h2>
                                                <p class="text-secondary mb-0">We are crafting a digital method that subsists life across all mediums.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="d-flex">
                                            <div class="me-4 text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <h2 class="h4 mb-3">Digital Agency</h2>
                                                <p class="text-secondary mb-0">We believe in innovation by merging primary with elaborate ideas.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        


        {{-- Caregiver Lists --}}
        <section style="margin-bottom: 72px; background-color: #f4f4f4;">
            <div class="container">
                <div class="py-3 pb-5">
                    <div class="d-flex justify-content-center">
                        <h2 class="fs-2 mt-4 mb-5 pb-2 text-center d-inline-block " style="border-bottom: 4px solid black;">Our Caregiver</h2>
                    </div>
                
                    <div class="row justify-content-center g-2 mb-4 mt-5">
                        <!-- Card 1 -->
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 rounded-3 p-3 position-relative" style="max-width: 300px; max-height: 100%;">
                                <div class="position-absolute bg-dark rounded-circle position-absolute translate-middle" style="left: 75%; top: 5%">
                                        <img class="img-fluid" src="" alt="" width="110" height="110">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Name</h5>
                                    <p class="text-muted">Location</p>
                                    <h6 class="fw-bold mt-3">Reasons to hire me</h6>
                                    <p>Knowledgeable PSW, very caring and gentle, honest and clean.</p>
                                    <hr>
                                    <p class="fw-bold">FROM</p>
                                    <p class="fs-4 fw-bold">$24.00/hour</p>
                                    <a href="#" class="btn btn-outline-primary w-100">View profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 rounded-3 p-3 position-relative" style="max-width: 300px; max-height: 100%;">
                                <div class="position-absolute bg-dark rounded-circle position-absolute translate-middle" style="left: 75%; top: 5%">
                                        <img class="img-fluid" src="" alt="" width="110" height="110">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Name</h5>
                                    <p class="text-muted">Location</p>
                                    <h6 class="fw-bold mt-3">Reasons to hire me</h6>
                                    <p>Knowledgeable PSW, very caring and gentle, honest and clean.</p>
                                    <hr>
                                    <p class="fw-bold">FROM</p>
                                    <p class="fs-4 fw-bold">$24.00/hour</p>
                                    <a href="#" class="btn btn-outline-primary w-100">View profile</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow-sm border-0 rounded-3 p-3 position-relative" style="max-width: 300px; max-height: 100%;">
                                <div class="position-absolute bg-dark rounded-circle position-absolute translate-middle" style="left: 75%; top: 5%">
                                        <img class="img-fluid" src="" alt="" width="110" height="110">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Name</h5>
                                    <p class="text-muted">Location</p>
                                    <h6 class="fw-bold mt-3">Reasons to hire me</h6>
                                    <p>Knowledgeable PSW, very caring and gentle, honest and clean.</p>
                                    <hr>
                                    <p class="fw-bold">FROM</p>
                                    <p class="fs-4 fw-bold">$24.00/hour</p>
                                    <a href="#" class="btn btn-outline-primary w-100">View profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Latest Stories Section -->
        <section style="margin-bottom: 72px;">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-4">Latest Stories</h2>
                    <div class="p-2 mb-3 border border-3 rounded-5">
                        <a href="" class="text-decoration-none text-dark">Explore More Stories</a>
                    </div>
                </div>
                <div class="row">
                    <!-- Main article area -->
                    <div class="col-md-7">
                        @if($posts->first())
                            <div class="card border-0 mb-4" style="height: 100%;">
                                <img src="{{ $posts->first()->image ? asset('storage/' . $posts->first()->image) : 'https://via.placeholder.com/600x300' }}" 
                                    class="card-img-top" 
                                    alt="Main Article Image" 
                                    style="width: 100%; height: 300px; object-fit: cover;">
                                <div class="card-body">
                                    <p class="text-muted">{{ $posts->first()->author->name ?? 'Unknown Author' }}</p>
                                    <a href="{{ route('posts.show', $posts->first()->id) }}">
                                        <h5 class="card-title">{{ $posts->first()->title }}</h5>
                                    </a>
                                    <p class="card-text">{{ Str::limit($posts->first()->content, 150) }}</p>
                                    <small class="text-muted">{{ $posts->first()->created_at->format('M d, Y') }} • {{ $posts->first()->read_time ?? '5 min' }} read</small>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!-- Smaller articles list -->
                    <div class="col-md-5">
                        @foreach($posts->skip(1)->take(3) as $post)
                            <div class="card border-0 mb-4" style="height: calc(33.33% - 1rem);">
                                <div class="row g-0 h-100">
                                    <div class="col-4">
                                        <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/100' }}" 
                                            class="img-fluid rounded-start h-100" 
                                            alt="Small Article Image" 
                                            style="object-fit: cover;">
                                    </div>
                                    <div class="col-8">
                                        <div class="card-body d-flex flex-column justify-content-center">
                                            <p class="text-muted">{{ $post->author->name ?? 'Unknown Author' }}</p>
                                            <a href="{{ route('posts.show', $post->id) }}" class="mb-4">
                                                <p class="card-text">{{ $post->title }}</p>
                                            </a>
                                            <small class="text-muted">{{ $post->created_at->format('M d, Y') }} • {{ $post->read_time ?? '5 min' }} read</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>


        <header>
            <div class="container-fluid" style="max-width: 1320px;">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Choose Your Plan</h1>
                    <p class="fs-5 text-muted">Flexible plans designed to bring peace of mind for you and your loved ones.</p>
                </div>
            </div>
        </header>
        <main class="flex-grow-1">
            <div class="container"> 
                <div class="row row-cols-1 row-cols-md-3 text-center pt-4" style="margin-bottom: 72px;">
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Free</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">0Bath<small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Access to health advice</li>
                                    <li>Community forum access</li>
                                    <li>Email support</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                            </div>
                        </div>  
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm">
                            <div class="card-header py-3">
                                <h4 class="my-0 fw-normal">Plus</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">35Baht<small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>All features</li>
                                    <li>Priority support</li>
                                    <li>Priority email support</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-4 rounded-3 shadow-sm border-primary">
                            <div class="card-header py-3 text-white bg-primary border-primary">
                                <h4 class="my-0 fw-normal">Family</h4>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title pricing-card-title">70Baht<small class="text-muted fw-light">/mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>All Plus features</li>
                                    <li>Extended family support</li>
                                    <li>Dedicated health consultant</li>
                                </ul>
                                <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>  
@endsection
