@extends('layouts.app')

@section('title', 'Health Assessment Dashboard')

@section('content')
<div class="container">
    <h1 class="mt-4 text-center">แบบประเมินสุขภาพ</h1>
    <p class="lead text-center">เลือกแบบประเมินที่คุณต้องการใช้งาน</p>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('survey.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="ค้นหาแบบประเมิน..." value="{{ $search ?? '' }}">
            <button class="btn btn-primary" type="submit">ค้นหา</button>
        </div>
    </form>

    <!-- Assessment Cards -->
    <div class="row">
        @foreach($assessments as $assessment)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center">{{ $assessment->name }}</h5>
                    <p class="card-text text-center text-muted">{{ $assessment->description }}</p>
                    <a href="{{ route('survey.show', $assessment->id) }}" class="btn btn-primary mt-auto w-100 text-center">เริ่มแบบประเมิน</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
