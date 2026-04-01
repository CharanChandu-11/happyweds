<div class="sidebar">
    <div class="logo-container">
        <a href="#" class="logo">
            <i class="fas fa-threads"></i>
            <span>HappilyWeds</span>
        </a>
    </div>
    <ul class="nav-links">
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        @can('Manage Profiles')
        <li class="{{ request()->routeIs('admin.profiles.*') ? 'active' : '' }}">
            <a href="{{ route('admin.profiles.index') }}">
                <i class="bi bi-person-badge"></i>
                <span>Profiles</span>
            </a>
        </li>
        @endcan
        
        @can('Manage Users')
        <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}">
                <i class="bi bi-people-fill"></i>
                <span>Users</span>
            </a>
        </li>
        @endcan
        
        @can('Manage Roles')
        <li class="{{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
            <a href="{{ route('admin.roles.index') }}">
                <i class="bi bi-shield-lock"></i>
                <span>Roles</span>
            </a>
        </li>
        @endcan
        
        @can('Manage Permissions')
        <li class="{{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
            <a href="{{ route('admin.permissions.index') }}">
                <i class="bi bi-shield-lock-fill"></i>
                <span>Permissions</span>
            </a>
        </li>
        @endcan
        
        {{-- MASTER SETTINGS --}}
        @can('Manage Masters')
        <li class="submenu 
            {{ request()->routeIs('admin.educations.*') ||
               request()->routeIs('admin.occupations.*') ||
               request()->routeIs('admin.areas.*') ||
               request()->routeIs('admin.castes.*') ||
               request()->routeIs('admin.country-codes.*') ? 'active' : '' }}">

            <a href="#">
                <i class="bi bi-sliders"></i>
                <span>Masters</span>
                <i class="bi bi-chevron-down arrow"></i>
            </a>

            <ul>
                <li class="{{ request()->routeIs('admin.country-codes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.country-codes.index') }}">
                        🌍 Country Codes
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.educations.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.educations.index') }}">
                        🎓 Highest Qualification
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.occupations.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.occupations.index') }}">
                        💼 Occupations
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.areas.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.areas.index') }}">
                        📍 Areas
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.castes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.castes.index') }}">
                        🧬 Castes
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('admin.gotras.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.gotras.index') }}">
                        🧬 Gotras
                    </a>
                </li>
            </ul>
        </li>
        @endcan

    </ul>
</div>