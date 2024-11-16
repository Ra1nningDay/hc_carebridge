@extends('layouts.app')

@section('title', 'Apply as Caregiver')

@section('content')
<div class="container mt-5">
    <div class="row g-5">
        <!-- Left Column: Form -->
        <div class="col-md-6">
            <h2 class="fw-bold text-primary mb-4">Apply as a Caregiver</h2>
            <p class="text-muted">Fill in the details below to join our team of caregivers. Ensure the information is accurate for smooth processing.</p>

            @if(session('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
                <form action="{{ route('caregiver.apply') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    
                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id ?? '' }}">

                    <div class="mb-4">
                        <label for="specialization" class="form-label fw-semibold">Specialization</label>
                        <input type="text" id="specialization" name="specialization" class="form-control rounded-4" placeholder="e.g., Nursing, Physical Therapy" required>
                    </div>

                    <div class="mb-4">
                        <label for="experience_years" class="form-label fw-semibold">Experience (Years)</label>
                        <input type="number" id="experience_years" name="experience_years" class="form-control rounded-4" placeholder="Enter your experience in years" required>
                    </div>

                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">

                    <div class="d-flex justify-content-between gap-2 mt-4">
                        <button type="button" onclick="getLocation()" class="btn btn-info rounded-pill px-4">
                            <i class="bi bi-geo-alt"></i> Get Location
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-send"></i> Submit Application
                        </button>
                    </div>

                    <!-- Map container -->
                    <div id="map-container" class="mt-4 border rounded-3 overflow-hidden" style="height: 300px;">
                        <iframe 
                            id="googleMap" 
                            width="100%" 
                            height="100%" 
                            frameborder="0" 
                            style="border:0;" 
                            allowfullscreen 
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&q=0,0">
                        </iframe>
                    </div>
                </form>
            @endif
        </div>

        <!-- Right Column: Progress Section -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0 fw-bold">Application Progress</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item {{ $currentStep >= 1 ? 'text-primary fw-bold' : '' }}">
                            <i class="bi bi-check-circle-fill me-2"></i> Step 1: Fill out the application form
                        </li>
                        <li class="list-group-item {{ $currentStep >= 2 ? 'text-primary fw-bold' : '' }}">
                            <i class="bi bi-clock-history me-2"></i> Step 2: Await review and approval
                        </li>
                        <li class="list-group-item {{ $currentStep >= 3 ? 'text-primary fw-bold' : '' }}">
                            <i class="bi bi-check-circle-fill me-2"></i> Step 3: Confirm your status
                        </li>
                    </ul>

                    <div class="mt-4">
                        <div class="progress" style="height: 30px;">
                            <div 
                                class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                                role="progressbar" 
                                style="width: {{ ($currentStep / 3) * 100 }}%;" 
                                aria-valuenow="{{ ($currentStep / 3) * 100 }}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                                {{ ($currentStep / 3) * 100 }}%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(setPosition, showError, { enableHighAccuracy: true });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function setPosition(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        
        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;

        // Update Google Maps Embed URL
        const mapIframe = document.getElementById("googleMap");
        mapIframe.src = `https://www.google.com/maps/embed/v1/place?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&q=${latitude},${longitude}`;

        alert("Location captured successfully!");
    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }
</script>
@endsection
