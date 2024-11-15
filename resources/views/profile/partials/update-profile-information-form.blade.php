<section class="mb-5">
    <header class="mb-4">
        <h2 class="h5 text-dark fw-bold">
            {{ __('ข้อมูลโปรไฟล์') }}
        </h2>
        <p class="text-muted">
            {{ __("อัปเดตข้อมูลโปรไฟล์และอีเมลของบัญชีคุณ.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
        @csrf
        @method('patch')
        
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="form-label fw-semibold">{{ __('ชื่อ') }}</label>
            <input id="name" name="name" type="text" class="form-control px-3 py-2" value="{{ old('name', $user->name) }}" required>
            <div class="form-text">{{ __('ชื่อเต็มของคุณที่จะปรากฏบนโปรไฟล์.') }}</div>
            @error('name') 
                <span class="text-danger small">{{ $message }}</span> 
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">{{ __('อีเมล') }}</label>
            <input id="email" name="email" type="email" class="form-control px-3 py-2" value="{{ old('email', $user->email) }}" required>
            <div class="form-text">{{ __('เราจะใช้อีเมลนี้ในการติดต่อกับคุณ กรุณาตรวจสอบให้แน่ใจว่าถูกต้อง.') }}</div>
            @error('email') 
                <span class="text-danger small">{{ $message }}</span> 
            @enderror

            <!-- Email Verification -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="small text-muted mt-2">
                    {{ __('อีเมลของคุณยังไม่ได้รับการยืนยัน.') }}
                    <button form="send-verification" class="btn btn-link p-0 text-primary fw-bold">{{ __('คลิกที่นี่เพื่อส่งลิงก์ยืนยันอีกครั้ง.') }}</button>
                    @if (session('status') === 'verification-link-sent')
                        <div class="text-success small mt-2">{{ __('ลิงก์ยืนยันใหม่ได้ถูกส่งไปยังอีเมลของคุณแล้ว.') }}</div>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">{{ __('บันทึก') }}</button>
        </div>

        <!-- Success Message -->
        @if (session('status') === 'profile-updated')
            <div class="text-success small mt-2 text-end">{{ __('บันทึกสำเร็จ.') }}</div>
        @endif
    </form>
</section>
