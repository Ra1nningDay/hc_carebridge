@extends('layouts.app')

@section('title', 'CareBridge - Bridging Healthcare and Support')

@section('content')
        @include('home_partials.carousel')

        {{-- Service Section --}}
        @include('home_partials.services')

        {{-- Find Caregiver Section --}}
        @include('home_partials.find_caregiver')

        {{-- About Us Section --}}
        @include('home_partials.about_us')
        
        {{-- Caregiver Section--}}
        @include('home_partials.caregiver_list')


        <!-- Latest Stories Section -->
        @include('home_partials.lastest_stories')


        {{-- <header>
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
        </main> --}}
    </div>  
    @include('layouts.footer')
@endsection
