@extends('layouts.app')

@section('title', 'Confirm Your Application Status')

@section('content')
<div class="container mt-5">
    <div class="row g-5">
        <!-- Left Column: Application Status -->
        <div class="col-md-6">
            <h2 class="fw-bold text-primary mb-4">Application Status</h2>
            <p class="text-muted">Your application has been reviewed. Here is the result of your application:</p>

            <!-- Display Application Status -->
            @if($status == 'Approved')
                <div class="alert alert-success rounded-4 shadow-sm">
                    <h5 class="fw-bold">🎉 Approved!</h5>
                    <p>Congratulations! Your application has been approved. Welcome aboard!</p>
                </div>
            @elseif($status == 'Rejected')
                <div class="alert alert-danger rounded-4 shadow-sm">
                    <h5 class="fw-bold">❌ Rejected</h5>
                    <p>We regret to inform you that your application has been rejected. Feel free to contact us for more information.</p>
                </div>
            @else
                <div class="alert alert-info rounded-4 shadow-sm">
                    <h5 class="fw-bold">⏳ Pending Review</h5>
                    <p>Your application is still under review. Please check back later for updates.</p>
                </div>
            @endif
        </div>

        <!-- Right Column: Progress Section -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="fw-bold mb-0">Application Progress</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item {{ $status ? 'text-primary fw-bold' : '' }}">
                            <i class="bi bi-check-circle-fill me-2 text-success"></i> Step 1: Fill out application form
                        </li>
                        <li class="list-group-item {{ $status ? 'text-primary fw-bold' : '' }}">
                            <i class="bi bi-check-circle-fill me-2 text-success"></i> Step 2: Await review and approval
                        </li>
                        <li class="list-group-item {{ $status ? 'text-primary fw-bold' : '' }}">
                            <i class="bi bi-check-circle-fill me-2 text-success"></i> Step 3: Confirm your status
                        </li>
                    </ul>

                    <div class="mt-4">
                        <div class="progress" style="height: 30px;">
                            <div 
                                class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
                                role="progressbar" 
                                style="width: 100%;" 
                                aria-valuenow="100" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                                100%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
