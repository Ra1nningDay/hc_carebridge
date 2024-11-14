@extends('layouts.app')

@section('title', 'Application Submitted')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Application Submitted</h2>
            <p>Your application as a caregiver has been submitted successfully. We will review your application and notify you once it’s complete.</p>
        </div>

        <!-- Right Column: Progress Section -->
        <div class="col-md-6">
            <h4>Application Progress</h4>
            <ul class="list-group mt-3">
                <li class="list-group-item active">Step 1: Fill out application form</li>
                <li class="list-group-item active">Step 2: Submit application</li>
                <li class="list-group-item">Step 3: Await review and approval</li>
                <li class="list-group-item">Step 4: Confirm your status</li>
            </ul>

            <div class="progress mt-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                    50%
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
