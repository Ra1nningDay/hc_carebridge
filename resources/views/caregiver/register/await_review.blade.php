@extends('layouts.app')

@section('title', 'Awaiting Review and Approval')

@section('content')
<div class="container mt-5">
    <div class="row g-5">
        <!-- Left Column: Review Status -->
        <div class="col-md-6">
            <h2 class="fw-bold text-primary mb-4">Awaiting Review and Approval</h2>
            <p class="text-muted">
                Your application is currently under review. Our team is evaluating your information. 
                Once the review process is complete, you will be notified about the result.
            </p>

            <!-- Info Alert -->
            <div class="alert alert-info rounded-4 shadow-sm">
                <h5 class="fw-bold">⏳ Under Review</h5>
                <p>
                    Thank you for your patience! If you have any questions, feel free to contact our support team.
                </p>
            </div>
        </div>
        
        <!-- Right Column: Progress Section -->
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="fw-bold mb-0">Application Progress</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-check-circle-fill me-2 text-success"></i> Step 1: Fill out application form
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-clock-history me-2 text-warning"></i> Step 2: Await review and approval
                        </li>
                        <li class="list-group-item text-muted">
                            <i class="bi bi-circle me-2"></i> Step 3: Confirm your status
                        </li>
                    </ul>

                    <div class="mt-4">
                        <div class="progress" style="height: 30px;">
                            <div 
                                class="progress-bar progress-bar-striped progress-bar-animated bg-warning" 
                                role="progressbar" 
                                style="width: 75%;" 
                                aria-valuenow="75" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                                75% Complete
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
