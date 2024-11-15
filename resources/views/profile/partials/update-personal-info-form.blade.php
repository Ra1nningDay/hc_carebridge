<header class="mb-4">
    <h2 class="h5 text-dark fw-bold">
        {{ __('อัปเดตข้อมูลส่วนตัว') }}
    </h2>
    <p class="text-muted">
        {{ __('กรุณาอัปเดตข้อมูลส่วนตัวของคุณเพื่อให้ข้อมูลในโปรไฟล์ถูกต้องและทันสมัยอยู่เสมอ') }}
    </p>
</header>

<form method="POST" action="{{ route('profile.updatePersonalInfo') }}" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <!-- Date of Birth -->
    <div class="mb-3">
        <label for="date_of_birth" class="form-label">วันเดือนปีเกิด</label>
        <input type="date" id="date_of_birth" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $personalInfo->date_of_birth ?? '') }}" required>
        <div class="form-text">กรุณาใส่วันเดือนปีเกิดของคุณ</div>
        @error('date_of_birth') 
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <!-- Gender -->
    <div class="mb-3">
        <label for="gender" class="form-label">เพศ</label>
        <select id="gender" name="gender" class="form-select" required>
            <option value="">เลือกเพศ</option>
            <option value="male" {{ (old('gender', $personalInfo->gender ?? '') == 'male') ? 'selected' : '' }}>ชาย</option>
            <option value="female" {{ (old('gender', $personalInfo->gender ?? '') == 'female') ? 'selected' : '' }}>หญิง</option>
            <option value="other" {{ (old('gender', $personalInfo->gender ?? '') == 'other') ? 'selected' : '' }}>อื่นๆ</option>
        </select>
        <div class="form-text">กรุณาเลือกเพศที่ตรงกับคุณ</div>
        @error('gender') 
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <!-- Phone Number -->
    <div class="mb-3">
        <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
        <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone', $personalInfo->phone ?? '') }}" placeholder="กรอกหมายเลขโทรศัพท์ของคุณ" required>
        <div class="form-text">กรุณาใส่เบอร์โทรศัพท์ที่สามารถติดต่อได้</div>
        @error('phone') 
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <!-- Address -->
    <div class="mb-3">
        <label for="address" class="form-label">ที่อยู่</label>
        <textarea id="address" class="form-control" name="address" rows="3" placeholder="กรอกที่อยู่ของคุณ" required>{{ old('address', $personalInfo->address ?? '') }}</textarea>
        <div class="form-text">กรุณาใส่ที่อยู่ปัจจุบันของคุณ</div>
        @error('address') 
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <!-- Medical History -->
    <div class="mb-3">
        <label for="medical_history" class="form-label">ประวัติทางการแพทย์</label>
        <textarea id="medical_history" class="form-control" name="medical_history" rows="3" placeholder="กรอกประวัติทางการแพทย์ของคุณ">{{ old('medical_history', $personalInfo->medical_history ?? '') }}</textarea>
        <div class="form-text">กรุณาใส่ข้อมูลเกี่ยวกับประวัติทางการแพทย์ที่สำคัญ</div>
        @error('medical_history') 
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <!-- Allergies -->
    <div class="mb-3">
        <label for="allergies" class="form-label">ประวัติการแพ้</label>
        <textarea id="allergies" class="form-control" name="allergies" rows="2" placeholder="กรอกข้อมูลเกี่ยวกับอาการแพ้ของคุณ">{{ old('allergies', $personalInfo->allergies ?? '') }}</textarea>
        <div class="form-text">กรุณาแจ้งข้อมูลเกี่ยวกับการแพ้เพื่อความปลอดภัย</div>
        @error('allergies') 
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100">บันทึก</button>
</form>
