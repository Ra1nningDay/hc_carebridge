<form method="POST" action="{{ route('profile.updatePersonalInfo') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="date_of_birth" class="form-label">วันเกิด</label>
        <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth', $personalInfo->date_of_birth ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="gender" class="form-label">เพศ</label>
        <select name="gender" class="form-control">
            <option value="">เลือกเพศ</option>
            <option value="male" {{ (old('gender', $personalInfo->gender ?? '') == 'male') ? 'selected' : '' }}>ชาย</option>
            <option value="female" {{ (old('gender', $personalInfo->gender ?? '') == 'female') ? 'selected' : '' }}>หญิง</option>
            <option value="other" {{ (old('gender', $personalInfo->gender ?? '') == 'other') ? 'selected' : '' }}>อื่น ๆ</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
        <input type="text" class="form-control" name="phone" value="{{ old('phone', $personalInfo->phone ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">ที่อยู่</label>
        <input type="text" class="form-control" name="address" value="{{ old('address', $personalInfo->address ?? '') }}">
    </div>

    <!-- เพิ่มฟิลด์อื่น ๆ ตามที่ต้องการ เช่น medical_history, allergies -->
    
    <button type="submit" class="btn btn-primary">บันทึกข้อมูลส่วนตัวเพิ่มเติม</button>
</form>
