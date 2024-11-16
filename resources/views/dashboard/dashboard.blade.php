<!-- resources/views/dashboard.blade.php -->
@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <section class="row mb-4 mt-4">
        <div class="col-12 mb-3">
            <h2>Task Summary</h2>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Digital Marketing Agency</h5>
                    <p class="card-text">Landing Page Design</p>
                    <p class="text-muted">Progress: 50%</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Online Course Mobile Apps</h5>
                    <p class="card-text">Landing Page Design</p>
                    <p class="text-muted">Progress: 75%</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Political Actions</h5>
                    <p class="card-text">Landing Page Design</p>
                    <p class="text-muted">Progress: 30%</p>
                </div>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Online Course Timeline</h5>
                    <!-- Insert Timeline Graphic or Chart Here -->
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Project Statistics</h5>
                    <p class="text-muted">Completion: 76%</p>
                    <!-- Insert Chart Here -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
