<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <div class="logo-wrapper">
                <span class="logo-text">HappilyWeds</span>
                <span class="logo-tagline">Matrimony & Matchmaking</span>
            </div>
        </a>

        <!-- Mobile Menu Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Menu -->
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">
                        <i class="bi bi-house-door d-lg-none me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('search*') ? 'active' : '' }}" href="/search">
                        <i class="bi bi-search d-lg-none me-2"></i>Search
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('profiles*') ? 'active' : '' }}" href="/profiles">
                        <i class="bi bi-people d-lg-none me-2"></i>Browse Profiles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('success-stories*') ? 'active' : '' }}" href="/success-stories">
                        <i class="bi bi-heart d-lg-none me-2"></i>Success Stories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="/contact">
                        <i class="bi bi-telephone d-lg-none me-2"></i>Contact
                    </a>
                </li>
                
                @auth
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-1"></i> My Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                            <li><a class="dropdown-item" href="/profile/edit"><i class="bi bi-person me-2"></i>My Profile</a></li>
                            <li><a class="dropdown-item" href="/matches"><i class="bi bi-heart me-2"></i>My Matches</a></li>
                            <li><a class="dropdown-item" href="/shortlisted"><i class="bi bi-star me-2"></i>Shortlisted</a></li>
                            <li><a class="dropdown-item" href="/messages"><i class="bi bi-chat-dots me-2"></i>Messages</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Auth Buttons -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right d-lg-none me-2"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-2"></i>Register Free
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>