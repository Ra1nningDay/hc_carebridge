@extends('layouts.carefield')

@section('title', 'CareField')

@section('content')
<div class="container-fluid mt-5 mx-2">
    <h1 class="mb-4">ภาพรวมข้อมูลการลงพื้นที่</h1>

    <!-- Section: Skeleton Cards -->
    <div class="row g-4">
        <!-- Skeleton Card: จำนวนผู้ป่วยทั้งหมด -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <div class="skeleton-box" style="width: 60%; height: 30px; margin-bottom: 15px;"></div>
                <div class="skeleton-box" style="width: 80%; height: 20px;"></div>
            </div>
        </div>

        <!-- Skeleton Card: ผู้ป่วยชาย -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <div class="skeleton-box" style="width: 60%; height: 30px; margin-bottom: 15px;"></div>
                <div class="skeleton-box" style="width: 80%; height: 20px;"></div>
            </div>
        </div>

        <!-- Skeleton Card: ผู้ป่วยหญิง -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <div class="skeleton-box" style="width: 60%; height: 30px; margin-bottom: 15px;"></div>
                <div class="skeleton-box" style="width: 80%; height: 20px;"></div>
            </div>
        </div>
    </div>

    <!-- Section: Skeleton Chart -->
    <div class="mt-5">
        <div class="skeleton-box" style="width: 100%; height: 300px;"></div>
    </div>
</div>
@endsection

<!-- Skeleton CSS -->
<style>
    .skeleton-box {
        background-color: #e0e0e0;
        border-radius: 4px;
        animation: skeleton-loading 1.5s infinite;
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
