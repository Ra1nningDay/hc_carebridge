<div class="d-flex flex-column p-3 bg-light border-end"
     id="sidebar"
     style="position: fixed; height: 100vh; width: 215px; z-index: 1000;">
     
    <h5 class="fw-bold text-center mb-4 text-primary">Navigation</h5>
    
    <ul class="nav nav-pills flex-column mt-3 mb-auto">
        <!-- Profile -->
        <li class="nav-item mb-3">
            <a href="{{ route('profile.index') }}" 
               class="nav-link d-flex align-items-center {{ request()->is('profile/view') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-person-circle me-2"></i>
                Profile
            </a>
        </li>

        <!-- Edit Profile -->
        <li class="nav-item mb-3">
            <a href="{{ route('profile.edit') }}" 
               class="nav-link d-flex align-items-center {{ request()->is('profile/edit') ? 'active bg-primary text-white' : 'text-dark' }}">
                <i class="bi bi-pencil-square me-2"></i>
                Edit Profile
            </a>
        </li>

        <!-- Edit Caregiver -->
        @if (auth()->user()->caregiver)
            <li class="nav-item mb-3">
                <a href="{{ route('caregiver.edit') }}" 
                   class="nav-link d-flex align-items-center {{ request()->is('caregiver/edit') ? 'active bg-primary text-white' : 'text-dark' }}">
                    <i class="bi bi-heart me-2"></i>
                    Edit Caregiver
                </a>
            </li>
        @endif
    </ul>

    <footer class="mt-auto text-center">
        <p class="small text-muted">&copy; 2024 CareBridge</p>
    </footer>
</div>
