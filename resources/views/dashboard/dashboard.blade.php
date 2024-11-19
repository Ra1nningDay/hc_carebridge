@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <section class="row mb-4 mt-4">
        <div class="col-12 mb-3">
            <h2 class="fw-bold">Task Summary</h2>
        </div>

        <!-- User Statistics Card -->
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">สถิติผู้ใช้งาน</h5>
                        <i class="bi bi-person-circle" style="font-size: 2rem; color: #467061;"></i>
                    </div>
                    <h2 class="card-text text-center text-success">{{ $userCount }}</h2> <!-- แสดงจำนวนผู้ใช้งาน -->
                    <p class="text-muted text-center">ผู้ใช้งานทั้งหมด</p>
                </div>
            </div>
        </div>

        <!-- Post Count Card -->
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">จำนวนกระทู้</h5>
                        <i class="bi bi-file-earmark-post" style="font-size: 2rem; color: #467061;"></i>
                    </div>
                    <h2 class="card-text text-center text-warning">{{ $postCount }}</h2> <!-- แสดงจำนวนกระทู้ -->
                    <p class="text-muted text-center">จำนวนกระทู้ทั้งหมด</p>
                </div>
            </div>
        </div>

        <!-- Website Visit Count Card -->
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">สถิติการเข้าชมเว็บไซต์</h5>
                        <i class="bi bi-bar-chart-line" style="font-size: 2rem; color: #467061;"></i>
                    </div>
                    <h2 class="card-text text-center text-primary">{{ $visitCount }}</h2> <!-- แสดงจำนวนการเข้าชม -->
                    <p class="text-muted text-center">การเข้าชมทั้งหมด</p>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <!-- Comment Count Card -->
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">จำนวนคอมเมนต์</h5>
                        <i class="bi bi-chat-dots" style="font-size: 2rem; color: #467061;"></i>
                    </div>
                    <h2 class="card-text text-center text-info">{{ $commentCount }}</h2> <!-- แสดงจำนวนคอมเมนต์ -->
                    <p class="text-muted text-center">จำนวนคอมเมนต์ทั้งหมด</p>
                </div>
            </div>
        </div>

        <!-- Caregiver Count Card -->
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">จำนวนผู้ดูแล</h5>
                        <i class="bi bi-person-check" style="font-size: 2rem; color: #467061;"></i>
                    </div>
                    <h2 class="card-text text-center text-success">{{ $caregiverCount }}</h2> <!-- แสดงจำนวนผู้ดูแล -->
                    <p class="text-muted text-center">จำนวนผู้ดูแลทั้งหมด</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<style>
    /* เพิ่มการกำหนดสีและการปรับแต่ง */
    .card {
        background-color: #ffffff;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .card-title {
        font-weight: 600;
        color: #003e29;
    }

    .card-text {
        font-size: 2rem;
        font-weight: 700;
    }

    .card-body {
        text-align: center;
    }

    .bi {
        font-size: 2rem;
    }
    
    /* ทำให้กราฟการแสดงผลเต็ม */
    .container-fluid {
        padding: 0 15px;
    }

    /* เพิ่มรูปทรงให้กราฟ */
    .col-md-4 {
        margin-bottom: 20px;
    }

    /* เพิ่มกรอบและเงาของการ์ด */
    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
</style>
