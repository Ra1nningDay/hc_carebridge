<!-- resources/views/profile/partials/sidebar.blade.php -->
<div class="d-flex flex-column p-3 bg-light border-end"
     id="sidebar"
     style="position: fixed; height: 100vh; width: 215px; z-index: 1000;">
     
    <ul class="nav nav-pills flex-column mt-3 mb-auto">
        <li class="nav-item">
            <a href="{{ route('profile.index') }}" class="nav-link {{ request()->is('profile/view') ? 'active' : '' }}">
                Profile
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->is('profile/edit') ? 'active' : '' }}">
                Edit Profile
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('caregiver.edit') }}" class="nav-link {{ request()->is('caregiver/edit') ? 'active' : '' }}">
                Edit Caregiver
            </a>
        </li>
    </ul>
</div>
