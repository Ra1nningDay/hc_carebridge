@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-5">
    <section class="row">
        <!-- User Statistics Card -->
        <div class="col-md-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">สถิติผู้ใช้งาน</h5>
                        <i class="bi bi-person-circle" style="font-size: 2rem; color: #467061;"></i>
                    </div>
                    <h2 class="card-text text-center text-success">{{ $userCount }}</h2>
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
                    <h2 class="card-text text-center text-warning">{{ $postCount }}</h2>
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
                    <h2 class="card-text text-center text-primary">{{ $visitCount }}</h2>
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
                    <h2 class="card-text text-center text-info">{{ $commentCount }}</h2>
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
                    <h2 class="card-text text-center text-success">{{ $caregiverCount }}</h2>
                    <p class="text-muted text-center">จำนวนผู้ดูแลทั้งหมด</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Add Chart for User Statistics -->
    <section class="row">
        <div class="col-md-8">
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <h5 class="card-title">สถิติการใช้งาน (กราฟ)</h5>
                    <canvas id="userStatsChart"></canvas>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('userStatsChart').getContext('2d');
    var userStatsChart = new Chart(ctx, {
        type: 'bar', // กราฟแท่ง
        data: {
            labels: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.'], // ใส่ข้อมูลเดือนหรือข้อมูลที่คุณต้องการ
            datasets: [{
                label: 'จำนวนผู้ใช้งาน',
                data: [12, 19, 3, 5, 2, 3], // ใส่ข้อมูลที่ได้จากฐานข้อมูลหรือข้อมูลที่คุณต้องการแสดง
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // กำหนดสี
                borderColor: 'rgba(54, 162, 235, 1)', // กำหนดสีขอบ
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection

<style>
    /* เพิ่มการกำหนดสีและการปรับแต่ง */
    .card {
        background-color: #ffffff;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 15px #0000001a;
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

    .container-fluid {
        padding: 0 15px;
    }

    .col-md-4 {
        margin-bottom: 20px;
    }

    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }
</style>
