@extends('layouts.app')

@section('title', 'Awaiting Review and Approval')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Awaiting Review and Approval</h2>
            <p>Your application is currently under review. Once the review process is complete, we will notify you about the result.</p>
        </div>
        
        <!-- Right Column: Progress Section -->
        <div class="col-md-6">
            <h4>Application Progress</h4>
            <ul class="list-group mt-3">
                <li class="list-group-item active">Step 1: Fill out application form</li>
                <li class="list-group-item active">Step 2: Await review and approval</li>
                <li class="list-group-item">Step 3: Confirm your status</li>
            </ul>

            <div class="progress mt-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                    75%
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
