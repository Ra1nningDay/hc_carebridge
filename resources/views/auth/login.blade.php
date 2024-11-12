@extends('layouts.html')

@section('title', 'Log in')

@section('content')
    <div class="container-fluid" style="min-height: 100vh; max-width: 1080px;">
        <div class="d-flex pt-5">
            <x-card-container>
                <x-slot name="body">
                    <h1 class="fs-3">Log in to your account</h1>
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf
                
                        <!-- Email Address -->
                        <div class="pt-3 mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" style="padding: 8px 16px;" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                
                        <!-- Password -->
                        <div class="pt-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                @if (Route::has('password.request'))
                                <a class="text-primary text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
                            </div>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" style="padding: 8px 16px;" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                
                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                        </div>
                
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="form-control btn btn-primary" style="padding: 14px 0; font-size: 16px;">
                                {{ __('Log in') }}
                            </button>
                        </div>
                    </form>
                </x-slot>
                <x-slot name="footer">
                    <p class="m-0">New to CareBridge? <span><a href="{{ route('register')}}">Create acount</a></span></p>
                </x-slot>
            </x-card-container>
        </div>
    </div>
@endsection