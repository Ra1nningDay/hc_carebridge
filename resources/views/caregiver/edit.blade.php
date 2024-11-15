@extends('layouts.app')

@section('title', 'Edit Caregiver Profile')

@section('content')
<div class="container mt-5">
    <h2>Edit Caregiver Profile</h2>

    <form action="{{ route('caregiver.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <!-- Caregiver Specialization -->
        <div class="form-group mt-3">
            <label for="specialization">Specialization</label>
            <input type="text" class="form-control" id="specialization" name="specialization" value="{{ $caregiver->specialization }}" required>
        </div>

        <!-- Experience Years -->
        <div class="form-group mt-3">
            <label for="experience_years">Experience (Years)</label>
            <input type="number" class="form-control" id="experience_years" name="experience_years" value="{{ $caregiver->experience_years }}" required>
        </div>

        <!-- Latitude and Longitude -->
        <div class="form-group mt-3">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $caregiver->latitude }}" readonly>
        </div>
        <div class="form-group mt-3">
            <label for="longitude">Longitude</label>
            <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $caregiver->longitude }}" readonly>
        </div>

        <!-- Map and Update Button -->
        <button type="button" id="update-location-btn" class="btn btn-info mt-3">Update Location</button>

        <!-- Location Preview -->
        <iframe 
            id="map-preview" 
            width="100%" 
            height="300" 
            frameborder="0" 
            class="mt-3" 
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&q={{ $caregiver->latitude ?? 13.736717 }},{{ $caregiver->longitude ?? 100.523186 }}">
        </iframe>

        <button type="submit" class="btn btn-primary mt-4">Update Profile</button>
    </form>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&callback=initMap" async defer></script>

<script>
    let map, marker;

    function initMap() {
        const initialPosition = {
            lat: {{ $caregiver->latitude ?? 13.736717 }},
            lng: {{ $caregiver->longitude ?? 100.523186 }}
        };

        map = new google.maps.Map(document.getElementById('map'), {
            center: initialPosition,
            zoom: 15
        });

        marker = new google.maps.Marker({
            position: initialPosition,
            map: map,
            draggable: true,
        });
    }

    document.getElementById('update-location-btn').addEventListener('click', () => {
        const position = marker.getPosition();
        const latitude = position.lat();
        const longitude = position.lng();

        document.getElementById('latitude').value = latitude;
        document.getElementById('longitude').value = longitude;

        document.getElementById('map-preview').src = `https://www.google.com/maps/embed/v1/place?key=AIzaSyC9jFNX78kT7vUPMaWDcxTYCFMT1XgWdGs&q=${latitude},${longitude}`;
        alert("Location updated successfully!");
    });
</script>
@endsection
