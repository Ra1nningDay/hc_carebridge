<section class="mb-5">
    <header class="mb-4">
        <h2 class="h5 text-dark">
            {{ __('อัปเดตรหัสผ่าน') }}
        </h2>
        <p class="text-muted">
            {{ __('เพื่อความปลอดภัย โปรดตั้งรหัสผ่านใหม่ที่ยาวและไม่ซ้ำกับรหัสผ่านเดิม') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="needs-validation" novalidate>
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="current_password" class="form-label">{{ __('รหัสผ่านปัจจุบัน') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control" placeholder="{{ __('กรุณากรอกรหัสผ่านปัจจุบัน') }}" required>
            @error('current_password') 
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('รหัสผ่านใหม่') }}</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('กรุณากรอกรหัสผ่านใหม่') }}" required>
            @error('password') 
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('ยืนยันรหัสผ่านใหม่') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="{{ __('กรุณายืนยันรหัสผ่านใหม่') }}" required>
            @error('password_confirmation') 
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100">
            {{ __('บันทึกการเปลี่ยนแปลง') }}
        </button>

        <!-- Success Message -->
        @if (session('status') === 'password-updated')
            <div class="alert alert-success mt-3" role="alert">
                {{ __('เปลี่ยนรหัสผ่านสำเร็จเรียบร้อย') }}
            </div>
        @endif
    </form>
</section>
