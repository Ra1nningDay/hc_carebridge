@extends('layouts.app')

@section('title', 'Nearby Caregivers')

@section('content')
<div class="container mt-5">
    <h2>Nearby Caregivers</h2>
    <p>Your Location: <strong>Latitude:</strong> {{ $latitude }}, <strong>Longitude:</strong> {{ $longitude }}</p>

    @if ($caregivers->isEmpty())
        <div class="alert alert-warning mt-4">
            No caregivers found within your area. Try expanding your search radius or check back later.
        </div>
    @else
        <div class="row mt-4">
            @foreach ($caregivers as $caregiver)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $caregiver->user->name ?? 'Unknown' }}</h5>
                            <p class="text-muted mb-2">Specialization: {{ $caregiver->specialization ?? 'Not specified' }}</p>
                            <p class="text-muted mb-2">Distance: {{ round($caregiver->distance, 2) }} km</p>
                            <a href="{{ route('profile.profile', ['id' => $caregiver->id]) }}" class="btn btn-primary mt-3 w-100">View Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
