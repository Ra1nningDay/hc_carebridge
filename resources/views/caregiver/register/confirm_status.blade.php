@extends('layouts.app')

@section('title', 'Confirm Your Application Status')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Application Status</h2>
            <p>Your application has been reviewed. Here is the result of your application:</p>

            <!-- แสดงสถานะการสมัคร -->
            @if($status == 'Approved')
                <div class="alert alert-success">Congratulations! Your application has been approved.</div>
            @elseif($status == 'Rejected')
                <div class="alert alert-danger">We are sorry. Your application has been rejected.</div>
            @else
                <div class="alert alert-info">Your application is still pending. Please check back later.</div>
            @endif
        </div>
        
        <!-- Right Column: Progress Section -->
        <div class="col-md-6">
            <h4>Application Progress</h4>
            <ul class="list-group mt-3">
                <li class="list-group-item active">Step 1: Fill out application form</li>
                <li class="list-group-item active">Step 2: Await review and approval</li>
                <li class="list-group-item active">Step 3: Confirm your status</li>
            </ul>

            <div class="progress mt-4">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                    100%
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
