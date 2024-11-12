@extends('layouts.app')

@section('content')
<h1>ข้อมูลส่วนตัวของคุณ</h1>
<a href="{{ route('profile.edit') }}">แก้ไขข้อมูลส่วนตัว</a>

<ul>
    <li>ชื่อ: {{ $user->name }}</li>
    <li>อีเมล: {{ $user->email }}</li>
    <li>วันเกิด: {{ $personalInfo->date_of_birth ?? '-' }}</li>
    <li>เพศ: {{ $personalInfo->gender ?? '-' }}</li>
    <li>เบอร์โทรศัพท์: {{ $personalInfo->phone ?? '-' }}</li>
    <li>ที่อยู่: {{ $personalInfo->address ?? '-' }}</li>
</ul>
@endsection
