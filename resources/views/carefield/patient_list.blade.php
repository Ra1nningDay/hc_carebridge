@extends('layouts.carefield')

@section('title', 'CareField')

@section('content')
<div class="container-fluid my-5 mx-2">
    <h1 class="mb-4">การจัดการผู้ป่วย</h1>

    <!-- Section: รายชื่อผู้ป่วย -->
    <h2 class="mb-4">รายชื่อผู้ป่วย</h2>
    <div class="row g-4">
        @for ($i = 0; $i < 6; $i++) <!-- วนลูปเพื่อสร้าง Skeleton -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="skeleton-image" style="height: 200px; background-color: #e0e0e0;"></div>
                <div class="card-body">
                    <h5 class="skeleton-text" style="width: 70%; height: 20px; background-color: #e0e0e0; margin-bottom: 15px;"></h5>
                    <p class="skeleton-text" style="width: 50%; height: 15px; background-color: #e0e0e0; margin-bottom: 10px;"></p>
                    <p class="skeleton-text" style="width: 80%; height: 15px; background-color: #e0e0e0; margin-bottom: 10px;"></p>
                    <p class="skeleton-text" style="width: 60%; height: 15px; background-color: #e0e0e0;"></p>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection

<style>
    .skeleton-image {
        animation: skeleton-loading 1.5s infinite;
    }

    .skeleton-text {
        animation: skeleton-loading 1.5s infinite;
        border-radius: 5px;
    }

    @keyframes skeleton-loading {
        0% {
            background-color: #e0e0e0;
        }
        50% {
            background-color: #f0f0f0;
        }
        100% {
            background-color: #e0e0e0;
        }
    }
</style>
