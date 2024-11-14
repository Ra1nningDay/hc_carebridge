@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="caregiver-banner position-relative d-flex justify-content-center align-items-center" style="margin-bottom: 128px;">
    <div class="container text-center">
        <h1>Find the perfect, reliable caregiver for your loved one</h1>
        <p>Affordable and dependable caregivers at your fingertips</p>
        <div class="d-flex justify-content-center mt-3">
            <input type="text" class="form-control caregiver-search" placeholder="Search for caregivers..." aria-label="Search" style="max-width: 600px;">
        </div>
    </div>
    <div class="position-absolute bg-secondary top-100 start-50 translate-middle rounded-3 p-3" style="width: 1080px; height: 80px;">
        <div class="row h-100">
            <div class="col-6 d-flex justify-content-center align-items-center">
                <h4 class="text-white mb-0">Lorem ipsum dolor sit amet.</h4>
            </div>
            <div class="col-6 d-flex justify-content-center align-items-center">
                <h4 class="text-white mb-0">Lorem ipsum dolor sit amet.</h4>
            </div>
        </div>
    </div>
</div>

{{-- Caregiver Lists --}}
<section style="margin-bottom: 72px;">
    <div class="container">
        <div class="py-3 pb-5">
            <div class="d-flex justify-content-center">
                <h2 class="fs-2 mt-4 mb-5 pb-2 text-center d-inline-block " style="border-bottom: 4px solid black;">Our Caregiver</h2>
            </div>
        
            <div class="row justify-content-center g-2 mb-4 mt-5">
                <!-- Caregiver Card Loop -->
                @foreach ($caregivers as $caregiver)
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0 rounded-3 p-3 position-relative" style="max-width: 400px; max-height: 100%;">
                            <div class="position-absolute bg-dark rounded-circle translate-middle" style="left: 80%; top: 5%">
                                <img class="img-fluid rounded-circle" src="{{ asset('path/to/avatar.jpg') }}" alt="Avatar" width="85" height="85">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mt-3">{{ $caregiver->user->name ?? 'Name Unavailable' }}</h5>
                                <p class="text-muted">Location: {{ $caregiver->personalInfo->address ?? 'Not specified' }}</p>
                                <h6 class="fw-bold mt-3">Reasons to hire me</h6>
                                <p>{{ $caregiver->specialization ?? 'Specialization not specified' }}</p>
                                <hr>
                                <p class="fw-bold">FROM</p>
                                <p class="fs-4 fw-bold">$24.00/hour</p> <!-- Example rate, modify as needed -->
                                {{-- ตรวจสอบการเรียก route และส่งค่า id --}}
                                <a href="{{ route('profile.profile', ['id' => $caregiver->id]) }}" class="btn btn-outline-primary w-100">View Profile</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection

<style>
  .caregiver-banner {
    background-color: #f4f4f4;
    height: 560px;
  }

  .caregiver-search {
    height: 40px;
    border-radius: 20px !important;
    background-color: #fff;
  }
</style>
