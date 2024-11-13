<!-- resources/views/partials/sidebar.blade.php -->
<nav id="sidebarMenu" class="col-md-2 bg-light sidebarr" style="background-color: #f8f9fc; height: 100vh; padding: 20px;">
    <div class="position-sticky">
        <!-- Logo and Brand Name -->
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('images/logos/logo-brand.png') }}" alt="Logo" width="40" height="40" class="me-2">
            <span class="fs-4 fw-bold text-dark">CareBridge</span>
        </div>

        <!-- Navigation Links -->
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="#" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-speedometer2 me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="#" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-folder me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>User Management</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="#" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-list me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>Public Information</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="{{ route('dashboard.caregiver-management') }}" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-calendar me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>Caregiver Overview</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link d-flex align-items-center text-dark p-3 w-100" href="#" style="font-size: 1rem; border-radius: 8px;">
                    <i class="bi bi-gear me-3" style="font-size: 1.2rem; color: #0d6efd;"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
