<!-- resources/views/partials/sidebar.blade.php -->
<nav id="sidebarMenu" class="col-md-2 bg-white sidebarr border" style=" height: 100vh; padding: 20px;">
    <div class="position-sticky">
        <!-- Navigation Links -->
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="{{route('carefield.index')}}" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-speedometer2 me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>หน้าหลัก</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="{{route('carefield.form')}}" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-list me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>แบบฟอร์มจัดการ</span>
                </a>
            </li>
             <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="{{ route('carefield.patient') }}" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-folder me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>รายชื่อผู้รับการตรวจ</span>
                </a>
            </li>
            {{-- <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="{{route('dashboard.user-management')}}" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-folder me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>บันทึกการตรวจสุขภาพ</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
