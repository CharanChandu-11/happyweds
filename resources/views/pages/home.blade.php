@extends('layouts.master')

@section('title', 'HappilyWeds - Find Your Perfect Life Partner')

@push('page-styles')
<style>
    /* Matrimony Home Page Styles */
    :root {
        --primary-pink: #f8a5c2;
        --light-pink: #fdeff6;
        --dark-pink: #e75480;
        --gold: #d4af37;
        --light-gold: #f7efd9;
        --text-dark: #333333;
        --text-light: #666666;
        --white: #ffffff;
        --success: #10b981;
        --gradient-pink: linear-gradient(135deg, #f8a5c2, #e75480);
        --gradient-gold: linear-gradient(135deg, #d4af37, #f7efd9);
        --gradient-blue: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --shadow-soft: 0 10px 30px rgba(0, 0, 0, 0.08);
        --shadow-hard: 0 20px 40px rgba(231, 84, 128, 0.15);
        --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* Hero Section */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: var(--white);
        padding: 120px 0 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .hero-content {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }
    
    .hero-subtitle {
        font-size: 1.3rem;
        margin-bottom: 2.5rem;
        opacity: 0.9;
        line-height: 1.6;
    }
    
    /* Search Bar */
    .search-container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        margin-top: 50px;
    }
    
    .search-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        align-items: end;
    }
    
    .form-group {
        margin-bottom: 0;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-dark);
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .form-select, .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-size: 1rem;
        transition: var(--transition);
    }
    
    .form-select:focus, .form-control:focus {
        border-color: var(--primary-pink);
        box-shadow: 0 0 0 3px rgba(248, 165, 194, 0.2);
        outline: none;
    }
    
    .btn-search {
        background: var(--gradient-pink);
        color: var(--white);
        border: none;
        padding: 14px 30px;
        border-radius: 10px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    .btn-search:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(231, 84, 128, 0.3);
    }
    
    /* Features Section */
    .features-section {
        padding: 100px 0;
        background: var(--white);
    }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }
    
    .section-title h2 {
        font-size: 2.8rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }
    
    .section-title h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--gradient-pink);
        border-radius: 2px;
    }
    
    .section-title p {
        font-size: 1.2rem;
        color: var(--text-light);
        max-width: 700px;
        margin: 0 auto;
    }
    
    .feature-card {
        background: var(--white);
        border-radius: 20px;
        padding: 40px 30px;
        text-align: center;
        box-shadow: var(--shadow-soft);
        transition: var(--transition);
        height: 100%;
        border: 2px solid transparent;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hard);
        border-color: var(--primary-pink);
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background: var(--light-pink);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--dark-pink);
        transition: var(--transition);
    }
    
    .feature-card:hover .feature-icon {
        background: var(--gradient-pink);
        color: var(--white);
        transform: scale(1.1);
    }
    
    .feature-card h3 {
        font-size: 1.4rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 15px;
    }
    
    .feature-card p {
        color: var(--text-light);
        line-height: 1.6;
        margin-bottom: 20px;
    }
    
    /* Profiles Section */
    .profiles-section {
        padding: 100px 0;
        background: linear-gradient(135deg, #fdeff6 0%, #f7f7f7 100%);
    }
    
    .profile-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
        transition: var(--transition);
        margin-bottom: 30px;
        height: 100%;
    }
    
    .profile-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hard);
    }
    
    .profile-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    
    .profile-content {
        padding: 25px;
    }
    
    .profile-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }
    
    .profile-name {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 5px;
    }
    
    .profile-age {
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    .profile-verified {
        background: var(--success);
        color: var(--white);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .profile-details {
        margin-bottom: 20px;
    }
    
    .profile-detail {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
        color: var(--text-light);
        font-size: 0.95rem;
    }
    
    .profile-detail i {
        color: var(--primary-pink);
        width: 20px;
    }
    
    .profile-actions {
        display: flex;
        gap: 10px;
    }
    
    .btn-profile {
        flex: 1;
        padding: 10px;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }
    
    .btn-view {
        background: var(--light-pink);
        color: var(--dark-pink);
    }
    
    .btn-view:hover {
        background: var(--dark-pink);
        color: var(--white);
    }
    
    .btn-connect {
        background: var(--gradient-pink);
        color: var(--white);
    }
    
    .btn-connect:hover {
        opacity: 0.9;
        transform: translateY(-2px);
    }
    
    /* Success Stories */
    .stories-section {
        padding: 100px 0;
        background: var(--white);
    }
    
    .story-card {
        background: var(--white);
        border-radius: 20px;
        padding: 40px;
        box-shadow: var(--shadow-soft);
        transition: var(--transition);
        height: 100%;
    }
    
    .story-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hard);
    }
    
    .story-content {
        position: relative;
        padding-left: 40px;
        margin-bottom: 30px;
    }
    
    .story-content::before {
        content: '"';
        position: absolute;
        left: 0;
        top: -20px;
        font-size: 4rem;
        color: var(--primary-pink);
        font-family: Georgia, serif;
        opacity: 0.3;
    }
    
    .story-text {
        font-size: 1.1rem;
        line-height: 1.8;
        color: var(--text-dark);
        font-style: italic;
        margin-bottom: 30px;
    }
    
    .story-couple {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .couple-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--light-pink);
    }
    
    .couple-info h4 {
        margin: 0 0 5px;
        color: var(--text-dark);
        font-weight: 600;
    }
    
    .couple-info p {
        margin: 0;
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    /* How It Works */
    .process-section {
        padding: 100px 0;
        background: linear-gradient(135deg, #fdeff6 0%, #f7f7f7 100%);
    }
    
    .process-step {
        text-align: center;
        padding: 20px;
        position: relative;
    }
    
    .step-number {
        width: 60px;
        height: 60px;
        background: var(--gradient-pink);
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0 auto 25px;
        position: relative;
        z-index: 2;
    }
    
    .process-step h3 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 15px;
    }
    
    .process-step p {
        color: var(--text-light);
        line-height: 1.6;
    }
    
    /* CTA Section */
    .cta-section {
        padding: 100px 0;
        background: var(--gradient-blue);
        color: var(--white);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .cta-content {
        max-width: 700px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .cta-title {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .cta-subtitle {
        font-size: 1.2rem;
        margin-bottom: 40px;
        opacity: 0.9;
    }
    
    .btn-cta {
        background: var(--white);
        color: var(--dark-pink);
        padding: 16px 45px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: var(--transition);
    }
    
    .btn-cta:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        color: var(--dark-pink);
    }
    
    /* Stats Section */
    .stats-section {
        padding: 80px 0;
        background: var(--white);
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
    }
    
    .stat-card {
        text-align: center;
        padding: 40px 20px;
        background: var(--light-pink);
        border-radius: 20px;
        transition: var(--transition);
    }
    
    .stat-card:hover {
        transform: translateY(-10px);
        background: var(--gradient-pink);
        color: var(--white);
    }
    
    .stat-card:hover .stat-number,
    .stat-card:hover .stat-label {
        color: var(--white);
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        color: var(--dark-pink);
        margin-bottom: 10px;
        line-height: 1;
    }
    
    .stat-label {
        font-size: 1.1rem;
        color: var(--text-dark);
        font-weight: 600;
    }
    
    /* Responsive Design */
    @media (max-width: 1199.98px) {
        .hero-title {
            font-size: 3rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 991.98px) {
        .hero-section {
            padding: 80px 0 50px;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .features-section,
        .profiles-section,
        .stories-section,
        .process-section,
        .cta-section {
            padding: 80px 0;
        }
        
        .search-form {
            grid-template-columns: 1fr;
        }
        
        .profile-actions {
            flex-direction: column;
        }
    }
    
    @media (max-width: 767.98px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .cta-title {
            font-size: 2rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
        }
        
        .search-container {
            padding: 20px;
            margin-top: 30px;
        }
        
        .feature-card,
        .profile-card,
        .story-card {
            margin-bottom: 30px;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
    }
    
    @media (max-width: 575.98px) {
        .hero-title {
            font-size: 1.8rem;
        }
        
        .cta-title {
            font-size: 1.8rem;
        }
        
        .btn-cta {
            width: 100%;
            justify-content: center;
        }
        
        .story-card {
            padding: 25px;
        }
        
        .story-couple {
            flex-direction: column;
            text-align: center;
        }
    }
</style>
@endpush

@section('page-content')
<!-- Hero Section with Search -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="hero-content">
                    <h1 class="hero-title">Find Your Perfect Life Partner</h1>
                    <p class="hero-subtitle">
                        Join thousands of successful matches on India's most trusted matrimonial platform. 
                        Start your journey to finding true love and lifelong happiness today.
                    </p>
                    
                    <div class="search-container">
                        <form class="search-form" action="{{ route('search') }}" method="GET">
                            <div class="form-group">
                                <label for="lookingFor">I'm looking for</label>
                                <select class="form-select" id="lookingFor" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="male">Bride</option>
                                    <option value="female">Groom</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="religion">Religion</label>
                                <select class="form-select" id="religion" name="religion">
                                    <option value="">Any</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="muslim">Muslim</option>
                                    <option value="christian">Christian</option>
                                    <option value="sikh">Sikh</option>
                                    <option value="jain">Jain</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="age">Age</label>
                                <select class="form-select" id="age" name="age">
                                    <option value="">Any</option>
                                    <option value="18-25">18-25</option>
                                    <option value="26-30">26-30</option>
                                    <option value="31-35">31-35</option>
                                    <option value="36-40">36-40</option>
                                    <option value="41+">41+</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="location">Location</label>
                                <select class="form-select" id="location" name="location">
                                    <option value="">Any</option>
                                    <option value="delhi">Delhi</option>
                                    <option value="mumbai">Mumbai</option>
                                    <option value="bangalore">Bangalore</option>
                                    <option value="chennai">Chennai</option>
                                    <option value="kolkata">Kolkata</option>
                                    <option value="hyderabad">Hyderabad</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn-search">
                                <i class="bi bi-search"></i> Find Matches
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" data-count="1000+">0</div>
                <div class="stat-label">Happy Marriages</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="50000+">0</div>
                <div class="stat-label">Registered Members</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="200+">0</div>
                <div class="stat-label">Cities Covered</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="98%">0</div>
                <div class="stat-label">Success Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose HappilyWeds?</h2>
            <p>Discover why we're India's most trusted matrimonial platform</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3>Verified Profiles</h3>
                    <p>All profiles are manually verified to ensure authenticity and security.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <h3>Smart Matching</h3>
                    <p>Advanced algorithms find compatible matches based on preferences.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h3>Secure Chat</h3>
                    <p>Private messaging system with complete privacy and security.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h3>Mobile App</h3>
                    <p>Stay connected on the go with our dedicated mobile application.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Profiles -->
<section class="profiles-section">
    <div class="container">
        <div class="section-title">
            <h2>Featured Profiles</h2>
            <p>Meet some of our most compatible members</p>
        </div>
        
        <div class="row g-4">
            @foreach($featuredProfiles as $profile)
            <div class="col-lg-3 col-md-6">
                <div class="profile-card">
                    <div class="image-wrapper">
                        <img src="{{ $profile['image'] }}" alt="{{ $profile['name'] }}" class="profile-image {{ auth()->check() ? '' : 'blur-image' }}">
                        @guest
                        <div class="login-overlay">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                                Login to view
                            </a>
                        </div>
                        @endguest
                    </div>
                    
                    <div class="profile-content">
                        <div class="profile-header">
                            <div>
                                <div class="profile-name">{{ $profile['name'] }}</div>
                                <div class="profile-age">{{ $profile['age'] }} years</div>
                            </div>
                            @if($profile['verified'])
                            <div class="profile-verified">
                                <i class="bi bi-check-lg"></i> Verified
                            </div>
                            @endif
                        </div>
                        
                        <div class="profile-details">
                            <div class="profile-detail">
                                <i class="bi bi-briefcase"></i>
                                <span>{{ $profile['profession'] }}</span>
                            </div>
                            <div class="profile-detail">
                                <i class="bi bi-geo-alt"></i>
                                <span>{{ $profile['location'] }}</span>
                            </div>
                            <div class="profile-detail">
                                <i class="bi bi-mortarboard"></i>
                                <span>{{ $profile['education'] }}</span>
                            </div>
                        </div>
                        
                        <div class="profile-actions">
                            <button class="btn-profile btn-view" onclick="viewProfile({{ $profile['id'] }})">
                                <i class="bi bi-eye"></i> View
                            </button>
                            <button class="btn-profile btn-connect" onclick="connectProfile({{ $profile['id'] }})">
                                <i class="bi bi-heart"></i> Connect
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ route('search') }}" class="btn-cta">
                <i class="bi bi-people"></i> View All Profiles
            </a>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="process-section">
    <div class="container">
        <div class="section-title">
            <h2>How It Works</h2>
            <p>Find your perfect match in 4 simple steps</p>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <h3>Create Profile</h3>
                    <p>Sign up and create your detailed profile with photos and preferences.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">02</div>
                    <h3>Find Matches</h3>
                    <p>Browse compatible profiles or let our AI suggest perfect matches.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">03</div>
                    <h3>Connect Safely</h3>
                    <p>Use our secure messaging system to connect with potential matches.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">04</div>
                    <h3>Meet & Marry</h3>
                    <p>Take the relationship forward with family approval and plan your wedding.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories -->
<section class="stories-section">
    <div class="container">
        <div class="section-title">
            <h2>Success Stories</h2>
            <p>Real couples who found love through HappilyWeds</p>
        </div>
        
        <div class="row g-4">
            @foreach($successStories as $story)
            <div class="col-lg-4">
                <div class="story-card">
                    <div class="story-content">
                        <div class="story-text">{{ $story['quote'] }}</div>
                    </div>
                    <div class="story-couple">
                        <img src="{{ $story['image'] }}" alt="{{ $story['couple'] }}" class="couple-avatar">
                        <div class="couple-info">
                            <h4>{{ $story['couple'] }}</h4>
                            <p>Married {{ $story['date'] }}</p>
                            <p><i class="bi bi-geo-alt"></i> {{ $story['location'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Find Your Perfect Match?</h2>
            <p class="cta-subtitle">
                Join thousands of successful couples who found their life partners through HappilyWeds. 
                Your journey to lifelong happiness starts here.
            </p>
            <a href="{{ route('register') }}" class="btn-cta">
                <i class="bi bi-heart-fill"></i> Create Free Profile
            </a>
            <p class="mt-4" style="opacity: 0.8; font-size: 0.9rem;">
                Free registration • Verified profiles • Safe & secure
            </p>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const statNumbers = document.querySelectorAll('.stat-number[data-count]');

        statNumbers.forEach(stat => {
    
            const rawValue = stat.getAttribute('data-count');
    
            // Extract number
            let number = parseFloat(rawValue.replace(/[^0-9.]/g, ''));
    
            // Detect suffix
            let suffix = rawValue.replace(/[0-9.]/g, '');
    
            // Convert K / M to real number
            if (rawValue.includes('K')) number *= 1000;
            if (rawValue.includes('M')) number *= 1000000;
    
            let current = 0;
            const duration = 2000;
            const step = number / (duration / 20);
    
            const updateCounter = () => {
                current += step;
    
                if (current < number) {
                    stat.textContent = formatNumber(Math.floor(current)) + suffix;
                    setTimeout(updateCounter, 20);
                } else {
                    stat.textContent = formatNumber(number) + suffix;
                }
            };
    
            // Start when visible
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCounter();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
    
            observer.observe(stat);
        });
    
        // Format number with commas + K
        function formatNumber(num) {
            if (num >= 1000000) return (num / 1000000).toFixed(1) + "M";
            if (num >= 1000) return (num / 1000).toFixed(0) + "K";
            return num;
        }
        
        // Search form enhancement
        const searchForm = document.querySelector('.search-form');
        if (searchForm) {
            searchForm.addEventListener('submit', function(e) {
                // Add loading state
                const submitBtn = this.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Searching...';
                submitBtn.disabled = true;
                
                // Simulate search delay
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 1500);
            });
        }
    });
    
    // Profile actions
    function viewProfile(profileId) {
        // In real app, redirect to profile page
        window.location.href = `/profiles/${profileId}`;
    }
    
    function connectProfile(profileId) {
        // Show connect modal or redirect
        alert('Connect feature would open here. Profile ID: ' + profileId);
    }
</script>
@endpush