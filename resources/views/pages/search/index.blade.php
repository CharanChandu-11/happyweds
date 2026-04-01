@extends('layouts.master')

@section('title', 'Search Matches | Find Your Perfect Partner')

@push('page-styles')
<style>
    /* Search Page Styles */
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
        --shadow-soft: 0 10px 30px rgba(0, 0, 0, 0.08);
        --shadow-hard: 0 20px 40px rgba(231, 84, 128, 0.15);
        --transition: all 0.3s ease;
    }
    
    /* Search Hero */
    .search-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), 
                    url('https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        color: var(--white);
        padding: 80px 0 40px;
        position: relative;
    }
    
    .search-hero-content {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .search-hero h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .search-hero p {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }
    
    /* Main Layout */
    .search-page {
        padding: 40px 0;
        background: #f8f9fa;
        min-height: 100vh;
    }
    
    .search-container {
        display: grid;
        grid-template-columns: 350px 1fr;
        gap: 30px;
        align-items: start;
    }
    
    /* Filters Sidebar */
    .filters-sidebar {
        background: var(--white);
        border-radius: 20px;
        padding: 30px;
        box-shadow: var(--shadow-soft);
        position: sticky;
        top: 100px;
        height: fit-content;
    }
    
    .filters-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--light-pink);
    }
    
    .filters-header h3 {
        margin: 0;
        color: var(--text-dark);
        font-size: 1.3rem;
        font-weight: 600;
    }
    
    .btn-clear-filters {
        background: transparent;
        border: none;
        color: var(--dark-pink);
        font-size: 0.9rem;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 5px;
        transition: var(--transition);
    }
    
    .btn-clear-filters:hover {
        background: var(--light-pink);
    }
    
    .filter-group {
        margin-bottom: 25px;
    }
    
    .filter-group:last-child {
        margin-bottom: 0;
    }
    
    .filter-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        cursor: pointer;
    }
    
    .filter-title h4 {
        margin: 0;
        color: var(--text-dark);
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .filter-toggle {
        color: var(--text-light);
        font-size: 0.9rem;
        transition: var(--transition);
    }
    
    .filter-content {
        max-height: 300px;
        overflow-y: auto;
        padding-right: 10px;
    }
    
    .filter-content.collapsed {
        max-height: 0;
        overflow: hidden;
    }
    
    /* Filter Elements */
    .filter-option {
        margin-bottom: 12px;
        display: flex;
        align-items: center;
    }
    
    .filter-option:last-child {
        margin-bottom: 0;
    }
    
    .filter-checkbox {
        position: relative;
        cursor: pointer;
    }
    
    .filter-checkbox input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }
    
    .checkmark {
        position: relative;
        height: 20px;
        width: 20px;
        background-color: var(--white);
        border: 2px solid #ddd;
        border-radius: 4px;
        transition: var(--transition);
    }
    
    .filter-checkbox input:checked ~ .checkmark {
        background-color: var(--dark-pink);
        border-color: var(--dark-pink);
    }
    
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }
    
    .filter-checkbox input:checked ~ .checkmark:after {
        display: block;
        left: 6px;
        top: 2px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }
    
    .filter-label {
        margin-left: 10px;
        color: var(--text-dark);
        font-size: 0.95rem;
        cursor: pointer;
        flex: 1;
    }
    
    .filter-count {
        color: var(--text-light);
        font-size: 0.85rem;
        background: #f0f0f0;
        padding: 2px 8px;
        border-radius: 10px;
        margin-left: 5px;
    }
    
    /* Range Slider */
    .range-slider {
        padding: 20px 0;
    }
    
    .range-values {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    
    .range-value {
        background: var(--light-pink);
        color: var(--dark-pink);
        padding: 5px 15px;
        border-radius: 15px;
        font-weight: 600;
        font-size: 0.9rem;
    }
    
    .slider-container {
        position: relative;
        height: 20px;
        margin: 0 10px;
    }
    
    .slider-track {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 4px;
        background: #e0e0e0;
        border-radius: 2px;
        transform: translateY(-50%);
    }
    
    .slider-range {
        position: absolute;
        top: 50%;
        height: 4px;
        background: var(--gradient-pink);
        border-radius: 2px;
        transform: translateY(-50%);
    }
    
    .slider-thumb {
        position: absolute;
        top: 50%;
        width: 20px;
        height: 20px;
        background: var(--white);
        border: 2px solid var(--dark-pink);
        border-radius: 50%;
        cursor: pointer;
        transform: translateY(-50%);
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: var(--transition);
    }
    
    .slider-thumb:hover {
        transform: translateY(-50%) scale(1.1);
        box-shadow: 0 3px 8px rgba(0,0,0,0.3);
    }
    
    /* Search Results */
    .search-results {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
    }
    
    .results-header {
        padding: 25px 30px;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .results-count {
        color: var(--text-dark);
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .results-count span {
        color: var(--dark-pink);
    }
    
    .results-sort {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .sort-label {
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    .sort-select {
        padding: 8px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        background: var(--white);
        color: var(--text-dark);
        font-size: 0.9rem;
        cursor: pointer;
        transition: var(--transition);
    }
    
    .sort-select:focus {
        border-color: var(--primary-pink);
        outline: none;
    }
    
    .view-toggle {
        display: flex;
        gap: 5px;
        margin-left: 15px;
    }
    
    .view-btn {
        width: 36px;
        height: 36px;
        border: 2px solid #e0e0e0;
        background: var(--white);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: var(--transition);
        color: var(--text-light);
    }
    
    .view-btn.active {
        background: var(--light-pink);
        border-color: var(--primary-pink);
        color: var(--dark-pink);
    }
    
    .view-btn:hover {
        border-color: var(--primary-pink);
        color: var(--dark-pink);
    }
    
    /* Profile Grid/List */
    .profiles-grid {
        padding: 30px;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 25px;
    }
    
    .profiles-list {
        padding: 0;
    }
    
    .profile-card-grid {
        background: var(--white);
        border-radius: 15px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
        transition: var(--transition);
        border: 1px solid rgba(248, 165, 194, 0.1);
    }
    
    .profile-card-grid:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-hard);
        border-color: var(--primary-pink);
    }
    
    .profile-image-container {
        position: relative;
        height: 200px;
        overflow: hidden;
    }
    
    .profile-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .profile-card-grid:hover .profile-image {
        transform: scale(1.05);
    }
    
    .profile-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--success);
        color: var(--white);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .profile-premium {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--gold);
        color: var(--white);
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .profile-content-grid {
        padding: 20px;
    }
    
    .profile-header-grid {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }
    
    .profile-name-grid {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 5px;
    }
    
    .profile-age-grid {
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    .profile-online {
        width: 10px;
        height: 10px;
        background: var(--success);
        border-radius: 50%;
        border: 2px solid var(--white);
        box-shadow: 0 0 0 2px var(--success);
    }
    
    .profile-details-grid {
        margin-bottom: 20px;
    }
    
    .profile-detail-grid {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        color: var(--text-light);
        font-size: 0.9rem;
    }
    
    .profile-detail-grid i {
        color: var(--primary-pink);
        width: 16px;
    }
    
    .profile-actions-grid {
        display: flex;
        gap: 10px;
    }
    
    .btn-action {
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
        font-size: 0.9rem;
    }
    
    .btn-view-grid {
        background: var(--light-pink);
        color: var(--dark-pink);
    }
    
    .btn-view-grid:hover {
        background: var(--dark-pink);
        color: var(--white);
    }
    
    .btn-shortlist-grid {
        background: transparent;
        color: var(--text-light);
        border: 2px solid #e0e0e0;
    }
    
    .btn-shortlist-grid:hover,
    .btn-shortlist-grid.active {
        background: var(--gold);
        color: var(--white);
        border-color: var(--gold);
    }
    
    /* List View */
    .profile-card-list {
        display: flex;
        background: var(--white);
        border-radius: 15px;
        margin: 0 30px 20px;
        box-shadow: var(--shadow-soft);
        transition: var(--transition);
        overflow: hidden;
        border: 1px solid rgba(248, 165, 194, 0.1);
    }
    
    .profile-card-list:last-child {
        margin-bottom: 30px;
    }
    
    .profile-card-list:hover {
        transform: translateX(5px);
        box-shadow: var(--shadow-hard);
        border-color: var(--primary-pink);
    }
    
    .profile-image-list {
        width: 200px;
        height: 200px;
        object-fit: cover;
        flex-shrink: 0;
    }
    
    .profile-content-list {
        flex: 1;
        padding: 25px;
        display: flex;
        flex-direction: column;
    }
    
    .profile-header-list {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 15px;
    }
    
    .profile-name-list {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 5px;
    }
    
    .profile-age-list {
        color: var(--text-light);
        font-size: 0.95rem;
    }
    
    .profile-badges-list {
        display: flex;
        gap: 10px;
    }
    
    .badge-list {
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .badge-verified {
        background: var(--success);
        color: var(--white);
    }
    
    .badge-premium {
        background: var(--gold);
        color: var(--white);
    }
    
    .profile-details-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
        margin-bottom: 20px;
        flex: 1;
    }
    
    .profile-detail-list {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-light);
        font-size: 0.95rem;
    }
    
    .profile-detail-list i {
        color: var(--primary-pink);
        width: 20px;
    }
    
    .profile-about {
        color: var(--text-light);
        line-height: 1.6;
        margin-bottom: 20px;
        font-size: 0.95rem;
    }
    
    .profile-actions-list {
        display: flex;
        gap: 15px;
    }
    
    .btn-view-list {
        background: var(--light-pink);
        color: var(--dark-pink);
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-view-list:hover {
        background: var(--dark-pink);
        color: var(--white);
    }
    
    .btn-shortlist-list {
        background: transparent;
        color: var(--text-light);
        padding: 10px 25px;
        border-radius: 8px;
        border: 2px solid #e0e0e0;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-shortlist-list:hover,
    .btn-shortlist-list.active {
        background: var(--gold);
        color: var(--white);
        border-color: var(--gold);
    }
    
    /* Pagination */
    .pagination-container {
        padding: 30px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: center;
    }
    
    .pagination {
        display: flex;
        gap: 5px;
    }
    
    .page-item {
        list-style: none;
    }
    
    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border: 2px solid #e0e0e0;
        background: var(--white);
        color: var(--text-dark);
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: var(--transition);
    }
    
    .page-link:hover {
        border-color: var(--primary-pink);
        color: var(--dark-pink);
    }
    
    .page-link.active {
        background: var(--gradient-pink);
        border-color: var(--dark-pink);
        color: var(--white);
    }
    
    .page-link.disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
    
    /* No Results */
    .no-results {
        padding: 60px 30px;
        text-align: center;
    }
    
    .no-results-icon {
        font-size: 4rem;
        color: var(--light-pink);
        margin-bottom: 20px;
    }
    
    .no-results h3 {
        color: var(--text-dark);
        margin-bottom: 10px;
        font-size: 1.5rem;
    }
    
    .no-results p {
        color: var(--text-light);
        margin-bottom: 30px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .btn-modify-search {
        background: var(--gradient-pink);
        color: var(--white);
        padding: 12px 30px;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    
    .btn-modify-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(231, 84, 128, 0.2);
    }
    
    /* Responsive Design */
    @media (max-width: 1199.98px) {
        .search-container {
            grid-template-columns: 300px 1fr;
            gap: 20px;
        }
        
        .profile-details-list {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 991.98px) {
        .search-container {
            grid-template-columns: 1fr;
        }
        
        .filters-sidebar {
            position: static;
            margin-bottom: 30px;
        }
        
        .profiles-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .profile-card-list {
            flex-direction: column;
        }
        
        .profile-image-list {
            width: 100%;
            height: 250px;
        }
    }
    
    @media (max-width: 767.98px) {
        .search-hero {
            padding: 60px 0 30px;
        }
        
        .search-hero h1 {
            font-size: 2.2rem;
        }
        
        .results-header {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }
        
        .results-sort {
            justify-content: space-between;
        }
        
        .profiles-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }
        
        .profile-card-grid {
            max-width: 400px;
            margin: 0 auto;
        }
        
        .profile-card-list {
            margin: 0 20px 20px;
        }
        
        .profile-actions-list {
            flex-direction: column;
        }
        
        .btn-view-list,
        .btn-shortlist-list {
            width: 100%;
            justify-content: center;
        }
    }
    
    @media (max-width: 575.98px) {
        .search-hero h1 {
            font-size: 1.8rem;
        }
        
        .search-hero p {
            font-size: 1rem;
        }
        
        .filters-sidebar {
            padding: 20px;
        }
        
        .results-header {
            padding: 20px;
        }
        
        .profiles-grid {
            padding: 20px;
        }
        
        .profile-content-list {
            padding: 20px;
        }
        
        .profile-badges-list {
            flex-direction: column;
            gap: 5px;
        }
        
        .pagination {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
    
    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .profile-card-grid,
    .profile-card-list {
        animation: fadeIn 0.5s ease-out;
    }
</style>
@endpush

@section('page-content')
<!-- Search Hero -->
<section class="search-hero">
    <div class="container">
        <div class="search-hero-content">
            <h1>Find Your Perfect Match</h1>
            <p>Use our advanced search filters to find compatible partners based on your preferences</p>
        </div>
    </div>
</section>

<!-- Search Page Content -->
<section class="search-page">
    <div class="container">
        <div class="search-container">
            <!-- Filters Sidebar -->
            <aside class="filters-sidebar">
                <div class="filters-header">
                    <h3>Filter Profiles</h3>
                    <button class="btn-clear-filters" onclick="clearAllFilters()">
                        <i class="bi bi-x-circle"></i> Clear All
                    </button>
                </div>
                
                <!-- Basic Filters -->
                <div class="filter-group">
                    <div class="filter-title" onclick="toggleFilter(this)">
                        <h4>Basic</h4>
                        <span class="filter-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="filter-content">
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="verified" checked onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Verified Profiles Only</span>
                            </label>
                        </div>
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="premium" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Premium Members</span>
                            </label>
                        </div>
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="online" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Online Now</span>
                                <span class="filter-count">42</span>
                            </label>
                        </div>
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="photos" checked onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">With Photos</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <!-- Age Range -->
                <div class="filter-group">
                    <div class="filter-title" onclick="toggleFilter(this)">
                        <h4>Age Range</h4>
                        <span class="filter-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="filter-content">
                        <div class="range-slider">
                            <div class="range-values">
                                <span class="range-value" id="minAge">22</span>
                                <span class="range-value" id="maxAge">35</span>
                            </div>
                            <div class="slider-container" id="ageSlider">
                                <div class="slider-track"></div>
                                <div class="slider-range" id="ageRange"></div>
                                <div class="slider-thumb" id="ageMinThumb"></div>
                                <div class="slider-thumb" id="ageMaxThumb"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Height Range -->
                <div class="filter-group">
                    <div class="filter-title" onclick="toggleFilter(this)">
                        <h4>Height</h4>
                        <span class="filter-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="filter-content">
                        <div class="range-slider">
                            <div class="range-values">
                                <span class="range-value" id="minHeight">4'8"</span>
                                <span class="range-value" id="maxHeight">6'2"</span>
                            </div>
                            <div class="slider-container" id="heightSlider">
                                <div class="slider-track"></div>
                                <div class="slider-range" id="heightRange"></div>
                                <div class="slider-thumb" id="heightMinThumb"></div>
                                <div class="slider-thumb" id="heightMaxThumb"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Religion & Caste -->
                <div class="filter-group">
                    <div class="filter-title" onclick="toggleFilter(this)">
                        <h4>Religion & Caste</h4>
                        <span class="filter-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="filter-content">
                        <select class="form-select mb-3" name="religion" onchange="updateCasteOptions()">
                            <option value="">All Religions</option>
                            <option value="hindu">Hindu</option>
                            <option value="muslim">Muslim</option>
                            <option value="christian">Christian</option>
                            <option value="sikh">Sikh</option>
                            <option value="jain">Jain</option>
                            <option value="buddhist">Buddhist</option>
                            <option value="other">Other</option>
                        </select>
                        
                        <select class="form-select" name="caste" id="casteSelect" disabled>
                            <option value="">Select Caste</option>
                        </select>
                    </div>
                </div>
                
                <!-- Education -->
                <div class="filter-group">
                    <div class="filter-title" onclick="toggleFilter(this)">
                        <h4>Education</h4>
                        <span class="filter-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="filter-content">
                        @foreach(['B.Tech/B.E.', 'MBA/PGDM', 'MBBS', 'CA', 'B.Sc', 'M.Sc', 'B.Com', 'M.Com', 'B.A', 'M.A', 'PhD', 'Other'] as $edu)
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="education[]" value="{{ $edu }}" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">{{ $edu }}</span>
                                <span class="filter-count">{{ rand(100, 500) }}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Profession -->
                <div class="filter-group">
                    <div class="filter-title" onclick="toggleFilter(this)">
                        <h4>Profession</h4>
                        <span class="filter-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="filter-content">
                        @foreach(['Software Engineer', 'Doctor', 'Business', 'Teacher', 'Government Job', 'Banking', 'Lawyer', 'Architect', 'Civil Engineer', 'Marketing', 'Other'] as $profession)
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="profession[]" value="{{ $profession }}" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">{{ $profession }}</span>
                                <span class="filter-count">{{ rand(50, 300) }}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Location -->
                <div class="filter-group">
                    <div class="filter-title" onclick="toggleFilter(this)">
                        <h4>Location</h4>
                        <span class="filter-toggle"><i class="bi bi-chevron-down"></i></span>
                    </div>
                    <div class="filter-content">
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="location[]" value="delhi" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Delhi/NCR</span>
                                <span class="filter-count">1250</span>
                            </label>
                        </div>
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="location[]" value="mumbai" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Mumbai</span>
                                <span class="filter-count">980</span>
                            </label>
                        </div>
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="location[]" value="bangalore" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Bangalore</span>
                                <span class="filter-count">850</span>
                            </label>
                        </div>
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="location[]" value="chennai" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Chennai</span>
                                <span class="filter-count">650</span>
                            </label>
                        </div>
                        <div class="filter-option">
                            <label class="filter-checkbox">
                                <input type="checkbox" name="location[]" value="hyderabad" onchange="updateResults()">
                                <span class="checkmark"></span>
                                <span class="filter-label">Hyderabad</span>
                                <span class="filter-count">520</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <button class="btn-search" onclick="applyFilters()" style="width: 100%; margin-top: 20px;">
                    <i class="bi bi-filter"></i> Apply Filters
                </button>
            </aside>
            
            <!-- Search Results -->
            <main class="search-results">
                <div class="results-header">
                    <div class="results-count">
                        Showing <span id="resultsCount">24</span> of <span id="totalResults">1,245</span> matches
                    </div>
                    
                    <div class="results-sort">
                        <span class="sort-label">Sort by:</span>
                        <select class="sort-select" onchange="sortResults(this.value)">
                            <option value="relevance">Relevance</option>
                            <option value="newest">Newest First</option>
                            <option value="popular">Most Popular</option>
                            <option value="premium">Premium First</option>
                        </select>
                        
                        <div class="view-toggle">
                            <button class="view-btn active" data-view="grid" onclick="setView('grid')">
                                <i class="bi bi-grid-3x3"></i>
                            </button>
                            <button class="view-btn" data-view="list" onclick="setView('list')">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Grid View -->
                <div class="profiles-grid" id="gridView">
                    @foreach($profiles as $profile)
                    <div class="profile-card-grid">
                        <div class="profile-image-container">
                            <img src="{{ $profile['image'] }}" alt="{{ $profile['name'] }}" class="profile-image">
                            @if($profile['verified'])
                            <div class="profile-badge">
                                <i class="bi bi-check-lg"></i> Verified
                            </div>
                            @endif
                            @if($profile['premium'])
                            <div class="profile-premium">
                                <i class="bi bi-star-fill"></i> Premium
                            </div>
                            @endif
                        </div>
                        
                        <div class="profile-content-grid">
                            <div class="profile-header-grid">
                                <div>
                                    <div class="profile-name-grid">{{ $profile['name'] }}</div>
                                    <div class="profile-age-grid">{{ $profile['age'] }} years, {{ $profile['height'] }}</div>
                                </div>
                                @if($profile['online'])
                                <div class="profile-online" title="Online Now"></div>
                                @endif
                            </div>
                            
                            <div class="profile-details-grid">
                                <div class="profile-detail-grid">
                                    <i class="bi bi-briefcase"></i>
                                    <span>{{ $profile['profession'] }}</span>
                                </div>
                                <div class="profile-detail-grid">
                                    <i class="bi bi-mortarboard"></i>
                                    <span>{{ $profile['education'] }}</span>
                                </div>
                                <div class="profile-detail-grid">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>{{ $profile['location'] }}</span>
                                </div>
                            </div>
                            
                            <div class="profile-actions-grid">
                                <button class="btn-action btn-view-grid" onclick="viewProfile({{ $profile['id'] }})">
                                    <i class="bi bi-eye"></i> View
                                </button>
                                <button class="btn-action btn-shortlist-grid" onclick="toggleShortlist(this, {{ $profile['id'] }})">
                                    <i class="bi bi-star"></i> Shortlist
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- List View (Hidden by default) -->
                <div class="profiles-list" id="listView" style="display: none;">
                    @foreach($profiles as $profile)
                    <div class="profile-card-list">
                        <img src="{{ $profile['image'] }}" alt="{{ $profile['name'] }}" class="profile-image-list">
                        
                        <div class="profile-content-list">
                            <div class="profile-header-list">
                                <div>
                                    <div class="profile-name-list">{{ $profile['name'] }}</div>
                                    <div class="profile-age-list">{{ $profile['age'] }} years, {{ $profile['height'] }}, {{ $profile['religion'] }}</div>
                                </div>
                                
                                <div class="profile-badges-list">
                                    @if($profile['verified'])
                                    <span class="badge-list badge-verified">
                                        <i class="bi bi-check-lg"></i> Verified
                                    </span>
                                    @endif
                                    @if($profile['premium'])
                                    <span class="badge-list badge-premium">
                                        <i class="bi bi-star-fill"></i> Premium
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="profile-details-list">
                                <div class="profile-detail-list">
                                    <i class="bi bi-briefcase"></i>
                                    <span>{{ $profile['profession'] }}</span>
                                </div>
                                <div class="profile-detail-list">
                                    <i class="bi bi-mortarboard"></i>
                                    <span>{{ $profile['education'] }}</span>
                                </div>
                                <div class="profile-detail-list">
                                    <i class="bi bi-geo-alt"></i>
                                    <span>{{ $profile['location'] }}</span>
                                </div>
                                <div class="profile-detail-list">
                                    <i class="bi bi-cash-stack"></i>
                                    <span>{{ $profile['income'] }}</span>
                                </div>
                            </div>
                            
                            <div class="profile-about">
                                {{ $profile['about'] }}
                            </div>
                            
                            <div class="profile-actions-list">
                                <button class="btn-view-list" onclick="viewProfile({{ $profile['id'] }})">
                                    <i class="bi bi-eye"></i> View Profile
                                </button>
                                <button class="btn-shortlist-list" onclick="toggleShortlist(this, {{ $profile['id'] }})">
                                    <i class="bi bi-star"></i> Shortlist
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- No Results State -->
                <div class="no-results" id="noResults" style="display: none;">
                    <div class="no-results-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3>No Profiles Found</h3>
                    <p>Try modifying your search criteria or browse all profiles to find your perfect match.</p>
                    <button class="btn-modify-search" onclick="clearAllFilters()">
                        <i class="bi bi-sliders"></i> Modify Search
                    </button>
                </div>
                
                <!-- Pagination -->
                <div class="pagination-container">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link disabled" href="#">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link active" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">5</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </main>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize sliders
        initAgeSlider();
        initHeightSlider();
        
        // Initialize filter toggles
        initFilterToggles();
        
        // Initialize view
        setView('grid');
    });
    
    // View toggle
    function setView(view) {
        const gridView = document.getElementById('gridView');
        const listView = document.getElementById('listView');
        const gridBtn = document.querySelector('[data-view="grid"]');
        const listBtn = document.querySelector('[data-view="list"]');
        
        if (view === 'grid') {
            gridView.style.display = 'grid';
            listView.style.display = 'none';
            gridBtn.classList.add('active');
            listBtn.classList.remove('active');
        } else {
            gridView.style.display = 'none';
            listView.style.display = 'block';
            gridBtn.classList.remove('active');
            listBtn.classList.add('active');
        }
        
        // Save preference
        localStorage.setItem('searchView', view);
    }
    
    // Filter toggles
    function initFilterToggles() {
        document.querySelectorAll('.filter-title').forEach(title => {
            const content = title.nextElementSibling;
            content.classList.remove('collapsed');
            
            title.addEventListener('click', function() {
                content.classList.toggle('collapsed');
                const icon = this.querySelector('.filter-toggle i');
                icon.classList.toggle('bi-chevron-down');
                icon.classList.toggle('bi-chevron-up');
            });
        });
    }
    
    function toggleFilter(element) {
        const content = element.nextElementSibling;
        content.classList.toggle('collapsed');
        const icon = element.querySelector('.filter-toggle i');
        icon.classList.toggle('bi-chevron-down');
        icon.classList.toggle('bi-chevron-up');
    }
    
    // Age Slider
    function initAgeSlider() {
        const slider = document.getElementById('ageSlider');
        const range = document.getElementById('ageRange');
        const minThumb = document.getElementById('ageMinThumb');
        const maxThumb = document.getElementById('ageMaxThumb');
        const minValue = document.getElementById('minAge');
        const maxValue = document.getElementById('maxAge');
        
        let minAge = 22;
        let maxAge = 35;
        const minLimit = 18;
        const maxLimit = 60;
        
        function updateAgeSlider() {
            const sliderWidth = slider.offsetWidth;
            const minPercent = ((minAge - minLimit) / (maxLimit - minLimit)) * 100;
            const maxPercent = ((maxAge - minLimit) / (maxLimit - minLimit)) * 100;
            
            range.style.left = minPercent + '%';
            range.style.width = (maxPercent - minPercent) + '%';
            
            minThumb.style.left = `calc(${minPercent}% - 10px)`;
            maxThumb.style.left = `calc(${maxPercent}% - 10px)`;
            
            minValue.textContent = minAge;
            maxValue.textContent = maxAge;
            
            // Update results if needed
            // updateResults();
        }
        
        function setMinAge(value) {
            minAge = Math.min(Math.max(value, minLimit), maxAge - 1);
            updateAgeSlider();
        }
        
        function setMaxAge(value) {
            maxAge = Math.max(Math.min(value, maxLimit), minAge + 1);
            updateAgeSlider();
        }
        
        // Thumb drag functionality
        function setupDrag(thumb, setFunction) {
            thumb.addEventListener('mousedown', function(e) {
                e.preventDefault();
                const startX = e.clientX;
                const startLeft = parseInt(window.getComputedStyle(thumb).left);
                const sliderRect = slider.getBoundingClientRect();
                
                function onMouseMove(e) {
                    const deltaX = e.clientX - startX;
                    const newLeft = startLeft + deltaX;
                    const percent = Math.min(Math.max(newLeft / sliderRect.width, 0), 1);
                    const value = Math.round(minLimit + percent * (maxLimit - minLimit));
                    setFunction(value);
                }
                
                function onMouseUp() {
                    document.removeEventListener('mousemove', onMouseMove);
                    document.removeEventListener('mouseup', onMouseUp);
                }
                
                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });
            
            // Touch support
            thumb.addEventListener('touchstart', function(e) {
                const touch = e.touches[0];
                const startX = touch.clientX;
                const startLeft = parseInt(window.getComputedStyle(thumb).left);
                const sliderRect = slider.getBoundingClientRect();
                
                function onTouchMove(e) {
                    const touch = e.touches[0];
                    const deltaX = touch.clientX - startX;
                    const newLeft = startLeft + deltaX;
                    const percent = Math.min(Math.max(newLeft / sliderRect.width, 0), 1);
                    const value = Math.round(minLimit + percent * (maxLimit - minLimit));
                    setFunction(value);
                    e.preventDefault();
                }
                
                function onTouchEnd() {
                    document.removeEventListener('touchmove', onTouchMove);
                    document.removeEventListener('touchend', onTouchEnd);
                }
                
                document.addEventListener('touchmove', onTouchMove, { passive: false });
                document.addEventListener('touchend', onTouchEnd);
            });
        }
        
        setupDrag(minThumb, setMinAge);
        setupDrag(maxThumb, setMaxAge);
        
        updateAgeSlider();
    }
    
    // Height Slider
    function initHeightSlider() {
        const slider = document.getElementById('heightSlider');
        const range = document.getElementById('heightRange');
        const minThumb = document.getElementById('heightMinThumb');
        const maxThumb = document.getElementById('heightMaxThumb');
        const minValue = document.getElementById('minHeight');
        const maxValue = document.getElementById('maxHeight');
        
        // Convert feet to inches for calculations
        let minHeightInches = 56; // 4'8"
        let maxHeightInches = 74; // 6'2"
        const minLimit = 48; // 4'0"
        const maxLimit = 84; // 7'0"
        
        function inchesToFeet(inches) {
            const feet = Math.floor(inches / 12);
            const remainingInches = inches % 12;
            return `${feet}'${remainingInches}"`;
        }
        
        function updateHeightSlider() {
            const sliderWidth = slider.offsetWidth;
            const minPercent = ((minHeightInches - minLimit) / (maxLimit - minLimit)) * 100;
            const maxPercent = ((maxHeightInches - minLimit) / (maxLimit - minLimit)) * 100;
            
            range.style.left = minPercent + '%';
            range.style.width = (maxPercent - minPercent) + '%';
            
            minThumb.style.left = `calc(${minPercent}% - 10px)`;
            maxThumb.style.left = `calc(${maxPercent}% - 10px)`;
            
            minValue.textContent = inchesToFeet(minHeightInches);
            maxValue.textContent = inchesToFeet(maxHeightInches);
        }
        
        function setMinHeight(value) {
            minHeightInches = Math.min(Math.max(value, minLimit), maxHeightInches - 1);
            updateHeightSlider();
        }
        
        function setMaxHeight(value) {
            maxHeightInches = Math.max(Math.min(value, maxLimit), minHeightInches + 1);
            updateHeightSlider();
        }
        
        // Thumb drag functionality
        function setupDrag(thumb, setFunction) {
            thumb.addEventListener('mousedown', function(e) {
                e.preventDefault();
                const startX = e.clientX;
                const startLeft = parseInt(window.getComputedStyle(thumb).left);
                const sliderRect = slider.getBoundingClientRect();
                
                function onMouseMove(e) {
                    const deltaX = e.clientX - startX;
                    const newLeft = startLeft + deltaX;
                    const percent = Math.min(Math.max(newLeft / sliderRect.width, 0), 1);
                    const value = Math.round(minLimit + percent * (maxLimit - minLimit));
                    setFunction(value);
                }
                
                function onMouseUp() {
                    document.removeEventListener('mousemove', onMouseMove);
                    document.removeEventListener('mouseup', onMouseUp);
                }
                
                document.addEventListener('mousemove', onMouseMove);
                document.addEventListener('mouseup', onMouseUp);
            });
            
            // Touch support
            thumb.addEventListener('touchstart', function(e) {
                const touch = e.touches[0];
                const startX = touch.clientX;
                const startLeft = parseInt(window.getComputedStyle(thumb).left);
                const sliderRect = slider.getBoundingClientRect();
                
                function onTouchMove(e) {
                    const touch = e.touches[0];
                    const deltaX = touch.clientX - startX;
                    const newLeft = startLeft + deltaX;
                    const percent = Math.min(Math.max(newLeft / sliderRect.width, 0), 1);
                    const value = Math.round(minLimit + percent * (maxLimit - minLimit));
                    setFunction(value);
                    e.preventDefault();
                }
                
                function onTouchEnd() {
                    document.removeEventListener('touchmove', onTouchMove);
                    document.removeEventListener('touchend', onTouchEnd);
                }
                
                document.addEventListener('touchmove', onTouchMove, { passive: false });
                document.addEventListener('touchend', onTouchEnd);
            });
        }
        
        setupDrag(minThumb, setMinHeight);
        setupDrag(maxThumb, setMaxHeight);
        
        updateHeightSlider();
    }
    
    // Update caste options based on religion
    function updateCasteOptions() {
        const religion = document.querySelector('select[name="religion"]').value;
        const casteSelect = document.getElementById('casteSelect');
        const casteOptions = {
            hindu: ['Brahmin', 'Kshatriya', 'Vaishya', 'Shudra', 'Other'],
            muslim: ['Sunni', 'Shia', 'Other'],
            christian: ['Catholic', 'Protestant', 'Orthodox', 'Other'],
            sikh: ['Jat', 'Khatri', 'Arora', 'Other'],
            jain: ['Digambar', 'Shwetambar', 'Other'],
            buddhist: ['Theravada', 'Mahayana', 'Vajrayana', 'Other'],
            other: ['Other']
        };
        
        casteSelect.innerHTML = '<option value="">Select Caste</option>';
        
        if (religion && casteOptions[religion]) {
            casteSelect.disabled = false;
            casteOptions[religion].forEach(caste => {
                const option = document.createElement('option');
                option.value = caste.toLowerCase();
                option.textContent = caste;
                casteSelect.appendChild(option);
            });
        } else {
            casteSelect.disabled = true;
        }
    }
    
    // Clear all filters
    function clearAllFilters() {
        // Clear checkboxes
        document.querySelectorAll('input[type="checkbox"]').forEach(cb => {
            cb.checked = false;
        });
        
        // Reset sliders
        initAgeSlider();
        initHeightSlider();
        
        // Reset selects
        document.querySelectorAll('select').forEach(select => {
            select.selectedIndex = 0;
        });
        
        // Update caste options
        updateCasteOptions();
        
        // Show all results
        updateResults();
        
        showNotification('Filters cleared successfully!', 'success');
    }
    
    // Apply filters
    function applyFilters() {
        updateResults();
        showNotification('Filters applied successfully!', 'success');
    }
    
    // Update search results
    function updateResults() {
        // Simulate filtering
        const filters = collectFilters();
        console.log('Applied filters:', filters);
        
        // In real app, make AJAX request here
        // For demo, just update count
        const randomCount = Math.floor(Math.random() * 100) + 50;
        document.getElementById('resultsCount').textContent = randomCount;
        
        // Show/hide no results
        if (randomCount === 0) {
            document.getElementById('noResults').style.display = 'block';
            document.getElementById('gridView').style.display = 'none';
            document.getElementById('listView').style.display = 'none';
        } else {
            document.getElementById('noResults').style.display = 'none';
        }
    }
    
    // Collect all filter values
    function collectFilters() {
        const filters = {};
        
        // Collect checkboxes
        document.querySelectorAll('input[type="checkbox"]:checked').forEach(cb => {
            const name = cb.name;
            if (cb.name.includes('[]')) {
                const baseName = cb.name.replace('[]', '');
                if (!filters[baseName]) filters[baseName] = [];
                filters[baseName].push(cb.value);
            } else {
                filters[name] = cb.value || true;
            }
        });
        
        // Collect selects
        document.querySelectorAll('select').forEach(select => {
            if (select.value) {
                filters[select.name] = select.value;
            }
        });
        
        // Get slider values
        const minAge = parseInt(document.getElementById('minAge').textContent);
        const maxAge = parseInt(document.getElementById('maxAge').textContent);
        filters.ageRange = { min: minAge, max: maxAge };
        
        return filters;
    }
    
    // Sort results
    function sortResults(criteria) {
        console.log('Sorting by:', criteria);
        // In real app, make AJAX request or sort client-side
        showNotification(`Sorted by: ${criteria}`, 'info');
    }
    
    // Shortlist profile
    function toggleShortlist(button, profileId) {
        button.classList.toggle('active');
        const isShortlisted = button.classList.contains('active');
        const icon = button.querySelector('i');
        
        if (isShortlisted) {
            icon.classList.remove('bi-star');
            icon.classList.add('bi-star-fill');
            showNotification('Profile added to shortlist!', 'success');
        } else {
            icon.classList.remove('bi-star-fill');
            icon.classList.add('bi-star');
            showNotification('Profile removed from shortlist!', 'info');
        }
        
        // In real app, make AJAX call to update shortlist
        // updateShortlist(profileId, isShortlisted);
    }
    
    // View profile
    function viewProfile(profileId) {
        window.location.href = `/profiles/${profileId}`;
    }
    
    // Notification
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        document.querySelectorAll('.custom-notification').forEach(n => n.remove());
        
        const notification = document.createElement('div');
        notification.className = `custom-notification alert alert-${type}`;
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            animation: slideIn 0.3s ease-out;
            max-width: 300px;
        `;
        
        notification.innerHTML = `
            <div style="display: flex; align-items: center; gap: 10px;">
                <i class="bi bi-check-circle" style="font-size: 1.2rem;"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(notification);
        
        // Auto-remove after 3 seconds
        setTimeout(() => {
            if (notification.parentElement) {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }
        }, 3000);
    }
    
    // Add CSS for notification animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
</script>
@endpush