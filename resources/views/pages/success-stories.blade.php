@extends('layouts.master')

@section('title', 'Success Stories - HappilyWeds Matrimony')

@push('page-styles')
<style>
    /* Success Stories Page Styles - Matching Home Page Design */
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
    
    /* Success Hero Section */
    .success-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                    url('https://images.unsplash.com/photo-1511285560929-80b456fea0bc?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: var(--white);
        padding: 140px 0 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .success-hero-content {
        max-width: 800px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .success-hero-title {
        font-size: 3.8rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }
    
    .success-hero-subtitle {
        font-size: 1.4rem;
        margin-bottom: 2.5rem;
        opacity: 0.9;
        line-height: 1.6;
    }
    
    /* Featured Story Section */
    .featured-story-section {
        padding: 100px 0;
        background: linear-gradient(135deg, #fdeff6 0%, #f7f7f7 100%);
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
    
    /* Featured Story Card */
    .featured-story-card {
        background: var(--white);
        border-radius: 25px;
        overflow: hidden;
        box-shadow: var(--shadow-hard);
        transition: var(--transition);
        margin-bottom: 50px;
    }
    
    .featured-story-content {
        padding: 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
    }
    
    .featured-story-content::before {
        content: '"';
        position: absolute;
        top: 30px;
        left: 40px;
        font-size: 8rem;
        color: var(--primary-pink);
        font-family: Georgia, serif;
        opacity: 0.2;
        line-height: 1;
    }
    
    .featured-story-text {
        font-size: 1.4rem;
        line-height: 1.8;
        color: var(--text-dark);
        font-style: italic;
        margin-bottom: 40px;
        position: relative;
        z-index: 1;
    }
    
    .featured-couple-info {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 30px;
    }
    
    .featured-couple-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid var(--light-pink);
    }
    
    .featured-couple-details h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }
    
    .featured-couple-details p {
        color: var(--text-light);
        font-size: 1rem;
        margin-bottom: 8px;
    }
    
    .wedding-date {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--dark-pink);
        font-weight: 600;
    }
    
    .story-stats {
        display: flex;
        gap: 30px;
        margin-top: 20px;
        flex-wrap: wrap;
    }
    
    .stat-item {
        display: flex;
        align-items: center;
        gap: 10px;
        background: var(--light-pink);
        padding: 10px 20px;
        border-radius: 50px;
    }
    
    .stat-icon {
        color: var(--dark-pink);
        font-size: 1.2rem;
    }
    
    .stat-text {
        font-weight: 600;
        color: var(--text-dark);
    }
    
    .featured-story-image {
        height: 100%;
        min-height: 500px;
        background-size: cover;
        background-position: center;
        position: relative;
    }
    
    .featured-story-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(231, 84, 128, 0.2), rgba(248, 165, 194, 0.1));
    }
    
    /* Stories Grid Section */
    .stories-grid-section {
        padding: 100px 0;
        background: var(--white);
    }
    
    .story-filters {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 50px;
        flex-wrap: wrap;
    }
    
    .filter-btn {
        background: var(--light-pink);
        border: none;
        padding: 12px 25px;
        border-radius: 50px;
        font-weight: 600;
        color: var(--text-dark);
        cursor: pointer;
        transition: var(--transition);
    }
    
    .filter-btn:hover,
    .filter-btn.active {
        background: var(--gradient-pink);
        color: var(--white);
    }
    
    .story-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
        transition: var(--transition);
        margin-bottom: 30px;
        height: 100%;
    }
    
    .story-card:hover {
        transform: translateY(-15px);
        box-shadow: var(--shadow-hard);
    }
    
    .story-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }
    
    .story-content {
        padding: 30px;
    }
    
    .story-quote {
        font-size: 1rem;
        line-height: 1.6;
        color: var(--text-dark);
        font-style: italic;
        margin-bottom: 25px;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .story-couple {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }
    
    .couple-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--light-pink);
    }
    
    .couple-info h4 {
        margin: 0 0 5px;
        color: var(--text-dark);
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .couple-info p {
        margin: 0;
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    .story-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }
    
    .story-date {
        color: var(--text-light);
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .read-more {
        color: var(--dark-pink);
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: var(--transition);
    }
    
    .read-more:hover {
        color: var(--primary-pink);
        gap: 10px;
    }
    
    /* Video Stories Section */
    .video-stories-section {
        padding: 100px 0;
        background: linear-gradient(135deg, #fdeff6 0%, #f7f7f7 100%);
    }
    
    .video-story-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
        transition: var(--transition);
        margin-bottom: 30px;
    }
    
    .video-story-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--shadow-hard);
    }
    
    .video-container {
        position: relative;
        height: 250px;
        overflow: hidden;
    }
    
    .video-thumbnail {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .play-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 70px;
        height: 70px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--dark-pink);
        font-size: 2rem;
        cursor: pointer;
        transition: var(--transition);
    }
    
    .play-button:hover {
        background: var(--dark-pink);
        color: var(--white);
        transform: translate(-50%, -50%) scale(1.1);
    }
    
    .video-content {
        padding: 25px;
    }
    
    .video-content h4 {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 15px;
    }
    
    .video-couple {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-light);
        font-size: 0.95rem;
    }
    
    /* Statistics Section */
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
    
    /* Share Your Story Section */
    .share-story-section {
        padding: 100px 0;
        background: var(--gradient-blue);
        color: var(--white);
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .share-story-content {
        max-width: 700px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    
    .share-story-title {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    
    .share-story-subtitle {
        font-size: 1.2rem;
        margin-bottom: 40px;
        opacity: 0.9;
        line-height: 1.6;
    }
    
    .btn-share {
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
    
    .btn-share:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        color: var(--dark-pink);
    }
    
    /* Modal for Story Details */
    .story-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 1000;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    
    .story-modal-content {
        background: var(--white);
        border-radius: 25px;
        max-width: 800px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
    }
    
    .close-modal {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--dark-pink);
        color: var(--white);
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        z-index: 10;
        transition: var(--transition);
    }
    
    .close-modal:hover {
        background: var(--primary-pink);
        transform: rotate(90deg);
    }
    
    /* Load More Button */
    .load-more-container {
        text-align: center;
        margin-top: 50px;
    }
    
    .btn-load-more {
        background: var(--gradient-pink);
        color: var(--white);
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }
    
    .btn-load-more:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(231, 84, 128, 0.3);
    }
    
    /* Responsive Design */
    @media (max-width: 1199.98px) {
        .success-hero-title {
            font-size: 3.2rem;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
        }
        
        .featured-story-text {
            font-size: 1.2rem;
        }
    }
    
    @media (max-width: 991.98px) {
        .success-hero {
            padding: 100px 0 60px;
        }
        
        .success-hero-title {
            font-size: 2.5rem;
        }
        
        .success-hero-subtitle {
            font-size: 1.1rem;
        }
        
        .featured-story-section,
        .stories-grid-section,
        .video-stories-section {
            padding: 80px 0;
        }
        
        .featured-story-content {
            padding: 40px;
        }
        
        .featured-story-image {
            min-height: 400px;
        }
        
        .share-story-title {
            font-size: 2.5rem;
        }
    }
    
    @media (max-width: 767.98px) {
        .success-hero-title {
            font-size: 2rem;
        }
        
        .section-title h2 {
            font-size: 2rem;
        }
        
        .featured-story-content::before {
            font-size: 6rem;
            top: 20px;
            left: 20px;
        }
        
        .featured-couple-info {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
        
        .story-filters {
            gap: 10px;
        }
        
        .filter-btn {
            padding: 10px 20px;
            font-size: 0.9rem;
        }
        
        .share-story-title {
            font-size: 2rem;
        }
    }
    
    @media (max-width: 575.98px) {
        .success-hero-title {
            font-size: 1.8rem;
        }
        
        .featured-story-content {
            padding: 25px;
        }
        
        .featured-story-text {
            font-size: 1.1rem;
        }
        
        .story-stats {
            justify-content: center;
            gap: 15px;
        }
        
        .stat-item {
            padding: 8px 15px;
        }
        
        .btn-share {
            width: 100%;
            justify-content: center;
        }
        
        .story-modal-content {
            padding: 20px;
        }
    }
</style>
@endpush

@section('page-content')
<!-- Hero Section -->
<section class="success-hero">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="success-hero-content">
                    <h1 class="success-hero-title">Real Love Stories</h1>
                    <p class="success-hero-subtitle">
                        Discover inspiring stories of couples who found their perfect match through HappilyWeds. 
                        These real-life stories prove that true love knows no boundaries.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" data-count="1000+">0</div>
                <div class="stat-label">Success Stories</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="500+">0</div>
                <div class="stat-label">Video Stories</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="42+">0</div>
                <div class="stat-label">Countries</div>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="98%">0</div>
                <div class="stat-label">Happy Couples</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Story Section -->
<section class="featured-story-section">
    <div class="container">
        <div class="section-title">
            <h2>Featured Love Story of the Month</h2>
            <p>An inspiring journey of love that began with a simple connection</p>
        </div>
        
        <div class="row g-0">
            <div class="col-lg-7">
                <div class="featured-story-content">
                    <div class="featured-story-text">
                        "We were both skeptical about online matrimony, but HappilyWeds changed our lives. 
                        From our first chat, we knew there was something special. Despite being from different 
                        cities, the connection was instant. Today, we're happily married and expecting our first child!"
                    </div>
                    
                    <div class="featured-couple-info">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Featured Couple" class="featured-couple-avatar">
                        <div class="featured-couple-details">
                            <h3>Raj & Priya</h3>
                            <p>Software Engineer & Doctor</p>
                            <div class="wedding-date">
                                <i class="bi bi-calendar-heart"></i>
                                <span>Married on March 15, 2023</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="story-stats">
                        <div class="stat-item">
                            <i class="bi bi-chat-dots stat-icon"></i>
                            <span class="stat-text">3 months of chatting</span>
                        </div>
                        <div class="stat-item">
                            <i class="bi bi-geo-alt stat-icon"></i>
                            <span class="stat-text">Different cities</span>
                        </div>
                        <div class="stat-item">
                            <i class="bi bi-heart stat-icon"></i>
                            <span class="stat-text">Perfect match score: 98%</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="featured-story-image" 
                     style="background-image: url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stories Grid Section -->
<section class="stories-grid-section">
    <div class="container">
        <div class="section-title">
            <h2>Love Stories That Inspire</h2>
            <p>Browse through our collection of real success stories from happy couples</p>
        </div>
        
        <div class="story-filters">
            <button class="filter-btn active" data-filter="all">All Stories</button>
            <button class="filter-btn" data-filter="recent">Recent</button>
            <button class="filter-btn" data-filter="long-distance">Long Distance</button>
            <button class="filter-btn" data-filter="inter-caste">Inter-Caste</button>
            <button class="filter-btn" data-filter="second-marriage">Second Marriage</button>
            <button class="filter-btn" data-filter="love-marriage">Love Marriage</button>
        </div>
        
        <div class="row" id="stories-grid">
            @foreach($stories as $story)
            <div class="col-lg-4 col-md-6" data-category="{{ $story['category'] }}">
                <div class="story-card" onclick="openStoryModal({{ $loop->index }})">
                    <img src="{{ $story['image'] }}" alt="{{ $story['couple'] }}" class="story-image">
                    <div class="story-content">
                        <div class="story-quote">"{{ Str::limit($story['quote'], 150) }}"</div>
                        
                        <div class="story-couple">
                            <img src="{{ $story['avatar'] }}" alt="{{ $story['couple'] }}" class="couple-avatar">
                            <div class="couple-info">
                                <h4>{{ $story['couple'] }}</h4>
                                <p>{{ $story['profession'] }}</p>
                                <p><i class="bi bi-geo-alt"></i> {{ $story['location'] }}</p>
                            </div>
                        </div>
                        
                        <div class="story-meta">
                            <div class="story-date">
                                <i class="bi bi-calendar"></i>
                                {{ $story['date'] }}
                            </div>
                            <a href="#" class="read-more">
                                Read Full Story <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="load-more-container">
            <button class="btn-load-more" id="loadMoreBtn">
                <i class="bi bi-plus-circle"></i> Load More Stories
            </button>
        </div>
    </div>
</section>

<!-- Video Stories Section -->
<section class="video-stories-section">
    <div class="container">
        <div class="section-title">
            <h2>Watch Their Love Stories</h2>
            <p>Experience the joy through heartfelt video testimonials</p>
        </div>
        
        <div class="row">
            @foreach($videoStories as $video)
            <div class="col-lg-4 col-md-6">
                <div class="video-story-card" onclick="playVideo('{{ $video['id'] }}')">
                    <div class="video-container">
                        <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}" class="video-thumbnail">
                        <div class="play-button">
                            <i class="bi bi-play-fill"></i>
                        </div>
                    </div>
                    <div class="video-content">
                        <h4>{{ $video['title'] }}</h4>
                        <div class="video-couple">
                            <i class="bi bi-people"></i>
                            <span>{{ $video['couple'] }}</span>
                        </div>
                        <p class="mt-3">{{ Str::limit($video['description'], 100) }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Share Your Story Section -->
<section class="share-story-section">
    <div class="container">
        <div class="share-story-content">
            <h2 class="share-story-title">Share Your Success Story</h2>
            <p class="share-story-subtitle">
                Found your perfect match through HappilyWeds? Share your love story with us 
                and inspire others to find their happily ever after.
            </p>
            <a href="#" class="btn-share" onclick="openShareForm()">
                <i class="bi bi-pencil-square"></i> Share Your Story
            </a>
        </div>
    </div>
</section>

<!-- Story Detail Modal -->
<div class="story-modal" id="storyModal">
    <div class="story-modal-content">
        <button class="close-modal" onclick="closeStoryModal()">&times;</button>
        <div id="storyModalContent">
            <!-- Content will be loaded here via JavaScript -->
        </div>
    </div>
</div>

<!-- Video Modal -->
<div class="story-modal" id="videoModal">
    <div class="story-modal-content" style="max-width: 900px;">
        <button class="close-modal" onclick="closeVideoModal()">&times;</button>
        <div id="videoModalContent" class="p-4">
            <!-- Video will be loaded here -->
        </div>
    </div>
</div>

<!-- Share Story Form Modal -->
<div class="story-modal" id="shareFormModal">
    <div class="story-modal-content" style="max-width: 600px;">
        <button class="close-modal" onclick="closeShareForm()">&times;</button>
        <div class="p-4">
            <h3 class="mb-4 text-center" style="color: var(--dark-pink);">Share Your Love Story</h3>
            <form id="shareStoryForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="brideName">Bride's Name *</label>
                            <input type="text" class="form-control" id="brideName" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="groomName">Groom's Name *</label>
                            <input type="text" class="form-control" id="groomName" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="coupleEmail">Email Address *</label>
                            <input type="email" class="form-control" id="coupleEmail" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="weddingDate">Wedding Date *</label>
                            <input type="date" class="form-control" id="weddingDate" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="loveStory">Your Love Story *</label>
                            <textarea class="form-control" id="loveStory" rows="5" 
                                      placeholder="Tell us about your journey, how you met, and what makes your story special..." 
                                      required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="photoUpload">Upload Wedding Photo</label>
                            <input type="file" class="form-control" id="photoUpload" accept="image/*">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn-submit" style="width: 200px;">
                            <i class="bi bi-send"></i> Submit Story
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize statistics counters
        initCounters();
        
        // Initialize story filters
        initStoryFilters();
        
        // Initialize load more button
        initLoadMore();
        
        // Initialize video modals
        initVideoModals();
    });
    
    // Statistics Counter Animation
    function initCounters() {
        const statNumbers = document.querySelectorAll('.stat-number[data-count]');
        
        statNumbers.forEach(stat => {
            const rawValue = stat.getAttribute('data-count');
            let number = parseFloat(rawValue.replace(/[^0-9.]/g, ''));
            let suffix = rawValue.replace(/[0-9.]/g, '');
            
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
        
        function formatNumber(num) {
            if (num >= 1000000) return (num / 1000000).toFixed(1) + "M";
            if (num >= 1000) return (num / 1000).toFixed(0) + "K";
            return num;
        }
    }
    
    // Story Filtering
    function initStoryFilters() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const storyCards = document.querySelectorAll('#stories-grid .col-lg-4');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                const filter = this.getAttribute('data-filter');
                
                // Filter stories
                storyCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
    
    // Load More Stories
    function initLoadMore() {
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        let storiesLoaded = 6; // Initial number of stories loaded
        
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                // In a real app, this would be an AJAX call
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-hourglass-split"></i> Loading...';
                this.disabled = true;
                
                // Simulate loading delay
                setTimeout(() => {
                    // Add more stories (in real app, these would come from server)
                    storiesLoaded += 6;
                    this.innerHTML = `<i class="bi bi-plus-circle"></i> Load More Stories (${storiesLoaded} shown)`;
                    this.disabled = false;
                    
                    // If all stories are loaded, hide button
                    if (storiesLoaded >= 24) {
                        this.style.display = 'none';
                    }
                }, 1500);
            });
        }
    }
    
    // Video Modal
    function initVideoModals() {
        window.playVideo = function(videoId) {
            const videoModal = document.getElementById('videoModal');
            const videoModalContent = document.getElementById('videoModalContent');
            
            // Load video based on ID
            let videoHTML = '';
            switch(videoId) {
                case 'video1':
                    videoHTML = `
                        <div class="ratio ratio-16x9">
                            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
                                    title="Love Story Video" 
                                    allowfullscreen></iframe>
                        </div>
                        <div class="mt-4">
                            <h4>Raj & Priya's Love Story</h4>
                            <p>Watch their beautiful journey from first chat to wedding day.</p>
                        </div>
                    `;
                    break;
                // Add more video cases as needed
            }
            
            videoModalContent.innerHTML = videoHTML;
            videoModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        };
        
        window.closeVideoModal = function() {
            document.getElementById('videoModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        };
    }
    
    // Story Detail Modal
    window.openStoryModal = function(storyIndex) {
        const story = @json($stories)[storyIndex];
        const modal = document.getElementById('storyModal');
        const modalContent = document.getElementById('storyModalContent');
        
        const storyHTML = `
            <div class="featured-story-content">
                <div class="featured-story-text">
                    "${story.quote}"
                </div>
                
                <div class="featured-couple-info">
                    <img src="${story.avatar}" alt="${story.couple}" class="featured-couple-avatar">
                    <div class="featured-couple-details">
                        <h3>${story.couple}</h3>
                        <p>${story.profession}</p>
                        <div class="wedding-date">
                            <i class="bi bi-calendar-heart"></i>
                            <span>Married on ${story.date}</span>
                        </div>
                    </div>
                </div>
                
                <div class="story-stats">
                    <div class="stat-item">
                        <i class="bi bi-geo-alt stat-icon"></i>
                        <span class="stat-text">${story.location}</span>
                    </div>
                    <div class="stat-item">
                        <i class="bi bi-heart stat-icon"></i>
                        <span class="stat-text">${story.category} Love</span>
                    </div>
                </div>
                
                <div class="mt-4">
                    <h4>Their Journey</h4>
                    <p>${story.full_story || 'Their beautiful journey from first connection to marriage is an inspiration to all.'}</p>
                </div>
                
                <div class="text-center mt-4">
                    <a href="#" class="btn-connect" style="padding: 12px 30px; display: inline-flex;">
                        <i class="bi bi-share"></i> Share This Story
                    </a>
                </div>
            </div>
        `;
        
        modalContent.innerHTML = storyHTML;
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    };
    
    window.closeStoryModal = function() {
        document.getElementById('storyModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    };
    
    // Share Story Form
    window.openShareForm = function() {
        document.getElementById('shareFormModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    };
    
    window.closeShareForm = function() {
        document.getElementById('shareFormModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    };
    
    // Handle form submission
    document.getElementById('shareStoryForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Submitting...';
        submitBtn.disabled = true;
        
        // Simulate form submission
        setTimeout(() => {
            alert('Thank you for sharing your beautiful love story! We will review it and contact you soon.');
            this.reset();
            closeShareForm();
            
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }, 2000);
    });
    
    // Close modals when clicking outside
    window.onclick = function(event) {
        const storyModal = document.getElementById('storyModal');
        const videoModal = document.getElementById('videoModal');
        const shareModal = document.getElementById('shareFormModal');
        
        if (event.target === storyModal) {
            closeStoryModal();
        }
        if (event.target === videoModal) {
            closeVideoModal();
        }
        if (event.target === shareModal) {
            closeShareForm();
        }
    };
    
    // Close modals with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeStoryModal();
            closeVideoModal();
            closeShareForm();
        }
    });
</script>
@endpush
