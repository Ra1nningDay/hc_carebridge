@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="caregiver-banner position-relative d-flex justify-content-center align-items-center" style="margin-bottom: 128px; background-color:#003e29;">
    <div class="container text-center">
        <h1 style="color:#abe7bb">Find the perfect, reliable caregiver for your loved one</h1>
        <p style="color:#abe7bb">Affordable and dependable caregivers at your fingertips</p>

        <!-- Dropdown for Province -->
        <div class="d-flex justify-content-center mt-3">
            <select id="province-select" class="form-select" style="max-width: 200px; margin-right: 10px;">
                <option value="">Select Province</option>
                <option value="13.7563,100.5018">Bangkok</option>
                <option value="10.49560350,99.18476060">Chumphon</option>
                <option value="7.8804,98.3923">Phuket</option>
                <!-- Add more provinces here -->
            </select>
            <button id="search-province-btn" class="btn btn-info">Search by Province</button>
        </div>

        <!-- GPS Search Button -->
        <div class="d-flex justify-content-center mt-3">
            <button id="search-gps-btn" class="btn btn-warning">Search by Current Location (GPS)</button>
        </div>
    </div>
    <div class="position-absolute bg-dark top-100 start-50 translate-middle" style="width: 1080px; height: 100px;">
        
    </div>
</div>

{{-- Caregiver Lists --}}
<section style="margin-bottom: 72px;">
    <div class="container">
        <div class="py-3 pb-5">
            <div class="container text-center my-5">
                <h2 class="fw-bold" style="font-size: 2rem; color: #2c3e50;">Our Caregiver</h2>
                <div style="height: 4px; width: 60px; background-color: #f39c12; margin: 8px auto 24px;"></div>
            </div>
        
            <div class="row justify-content-center g-2 mb-4 mt-5">
                <!-- Caregiver Card Loop -->
                @foreach ($caregivers as $caregiver)
                    <div class="col-md-3 mt-4">
                        <div class="card shadow-sm border-0 rounded-3 p-3 position-relative" style="max-width: 400px; max-height: 100%;">
                            <div class="position-absolute bg-dark rounded-circle translate-middle" style="left: 80%; top: 5%">
                                <img class="img-fluid rounded-circle" src="{{ asset('path/to/avatar.jpg') }}" alt="Avatar" width="85" height="85">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mt-3">{{ $caregiver->user->name ?? 'Name Unavailable' }}</h5>
                               <p class="text-muted">Location: {{ $caregiver->personalInfo->address ?? 'None' }}</p>
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

<script>
    // Search by Province
    document.getElementById('search-province-btn').addEventListener('click', function () {
        const provinceSelect = document.getElementById('province-select');
        const selectedProvince = provinceSelect.value;

        if (selectedProvince) {
            const [latitude, longitude] = selectedProvince.split(',');

            alert(`Searching caregivers in province: ${provinceSelect.options[provinceSelect.selectedIndex].text}, Latitude: ${latitude}, Longitude: ${longitude}`);
            
            // Redirect to search results with selected province's latitude and longitude
            window.location.href = `/caregiver/search?latitude=${latitude}&longitude=${longitude}`;
        } else {
            alert('Please select a province to search.');
        }
    });

    // Search by Current Location (GPS)
    document.getElementById('search-gps-btn').addEventListener('click', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                alert(`Searching caregivers near your current location: Latitude: ${latitude}, Longitude: ${longitude}`);

                // Redirect to search results with current latitude and longitude
                window.location.href = `/caregiver/search?latitude=${latitude}&longitude=${longitude}`;
            }, function (error) {
                alert('Unable to fetch your current location. Please try again.');
            });
        } else {
            alert('Geolocation is not supported by your browser.');
        }
    });
</script>
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
