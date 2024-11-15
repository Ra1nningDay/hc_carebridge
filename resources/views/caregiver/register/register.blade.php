@extends('layouts.app')

@section('title', 'Apply as Caregiver')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Left Column: Form -->
        <div class="col-md-6">
            <h2>Apply as a Caregiver</h2>
            <p>Complete the form below to apply as a caregiver for the elderly.</p>

            @if(session('message'))
                <div class="alert alert-info">
                    {{ session('message') }}
                </div>
            @else
                <form action="{{ route('caregiver.apply') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id ?? '' }}" required>

                    <div class="form-group mt-3">
                        <label for="specialization">Specialization</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" required>
                    </div>

                    <div class="form-group mt-3">
                        <label for="experience_years">Experience (Years)</label>
                        <input type="number" class="form-control" id="experience_years" name="experience_years" required>
                    </div>

                    <!-- Hidden fields for latitude and longitude -->
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">

                    <div class="form-group mt-4">
                        <button type="button" onclick="getLocation()" class="btn btn-info">Get Location</button>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </div>

                    <!-- Map container using Maps Embed API -->
                    <div id="map-container" class="mt-3" style="height: 400px;">
                        <iframe 
                            id="googleMap" 
                            width="100%" 
                            height="100%" 
                            frameborder="0" 
                            style="border:0" 
                            allowfullscreen 
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&q=0,0">
                        </iframe>
                    </div>
                </form>
            @endif
        </div>

        <!-- Right Column: Progress Section -->
        <div class="col-md-6">
            <h4>Application Progress</h4>
            <ul class="list-group mt-3">
                <li class="list-group-item {{ $currentStep >= 1 ? 'active' : '' }}">Step 1: Fill out application form</li>
                <li class="list-group-item {{ $currentStep >= 2 ? 'active' : '' }}">Step 2: Await review and approval</li>
                <li class="list-group-item {{ $currentStep >= 3 ? 'active' : '' }}">Step 3: Confirm your status</li>
            </ul>

            <div class="progress mt-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ ($currentStep / 4) * 100 }}%;" aria-valuenow="{{ ($currentStep / 4) * 100 }}" aria-valuemin="0" aria-valuemax="100">
                    {{ ($currentStep / 4) * 100 }}%
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
