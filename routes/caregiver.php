<?php 
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CaregiverController;

    // Route สำหรับการค้นหา caregiver
    Route::get('caregiver', function () {
        return view('caregiver.find_caregiver');
    })->name('caregiver');

    // Route สำหรับแสดงฟอร์มสมัครเป็น caregiver โดยใช้ CaregiverController
    Route::get('/caregiver/register', [CaregiverController::class, 'showApplicationForm'])->name('caregiver.register');

    // Route สำหรับการส่งข้อมูลการสมัคร
    Route::post('/caregiver/apply', [CaregiverController::class, 'submitApplication'])->name('caregiver.apply');
