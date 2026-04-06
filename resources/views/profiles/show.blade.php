@extends('layouts.admin')

@section('title', trim($profile->first_name.' '.$profile->last_name) . ' - Profile Details')

@push('page-styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap');

    /* Typography & Spacing */
    .font-sans { font-family: 'Plus Jakarta Sans', sans-serif; }
    .font-serif { font-family: 'Playfair Display', serif; }
    
    .page-spacing {
        padding-left: clamp(1rem, 3vw, 3rem) !important;
        padding-right: clamp(1rem, 3vw, 3rem) !important;
    }

    .text-gradient {
        background: linear-gradient(90deg, #111111 0%, #e75480 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .bg-gradient-signature {
        background: linear-gradient(135deg, #0a0a0a 0%, #e75480 100%);
    }

    /* --- ADVANCED BACKGROUND STYLING --- */
    body { 
        background-color: #f8fafc; 
        position: relative; 
        z-index: 1;
        overflow-x: hidden;
    }

    /* Ambient Pulsing Glow Orbs */
    .bg-glow-orb {
        position: fixed;
        border-radius: 50%;
        filter: blur(120px);
        z-index: -2;
        animation: pulseGlow 10s infinite alternate ease-in-out;
        pointer-events: none;
    }
    
    .orb-1 { top: -15%; left: -10%; width: 50vw; height: 50vw; background: rgba(231, 84, 128, 0.12); }
    .orb-2 { bottom: -20%; right: -10%; width: 60vw; height: 60vw; background: rgba(10, 10, 10, 0.08); animation-delay: -5s; }

    @keyframes pulseGlow {
        0% { transform: scale(1) translate(0, 0); opacity: 0.5; }
        100% { transform: scale(1.1) translate(20px, -20px); opacity: 0.8; }
    }

    /* Animated Floating SVGs */
    .bg-floating-element {
        position: fixed;
        z-index: -1;
        opacity: 0.05;
        pointer-events: none;
        animation: floatAnim var(--duration, 8s) ease-in-out infinite;
    }

    @keyframes floatAnim {
        0% { transform: translateY(0) rotate(var(--rot-start, 0deg)); }
        50% { transform: translateY(-30px) rotate(var(--rot-mid, 15deg)); }
        100% { transform: translateY(0) rotate(var(--rot-start, 0deg)); }
    }

    /* Page Load Animations */
    @keyframes fadeSlideUp {
        0% { opacity: 0; transform: translateY(25px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-card { animation: fadeSlideUp 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) forwards; opacity: 0; }
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }

    /* Premium Cards & Layout */
    .premium-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        border: 1px solid rgba(255,255,255,0.4);
        box-shadow: 0 15px 35px rgba(0,0,0,0.03);
    }

    .icon-wrapper {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: linear-gradient(135deg, #0a0a0a 0%, #e75480 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(231, 84, 128, 0.25);
    }

    /* Data Display Styles */
    .info-label {
        font-size: 0.7rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #94a3b8;
        margin-bottom: 0.3rem;
        display: block;
    }

    .info-value {
        font-size: 1rem;
        font-weight: 600;
        color: #1e293b;
        display: block;
        word-wrap: break-word;
    }

    /* Buttons */
    .btn-glow {
        background: linear-gradient(90deg, #111111 0%, #e75480 100%);
        color: #ffffff;
        box-shadow: 0 8px 20px rgba(231, 84, 128, 0.3);
        border-radius: 14px;
        padding: 0.6rem 1.5rem;
        font-weight: 700;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-glow:hover {
        color: #ffffff;
        transform: translateY(-3px);
        box-shadow: 0 12px 25px rgba(231, 84, 128, 0.45);
    }

    .btn-premium-outline {
        background: #ffffff;
        border: 2px solid #e2e8f0;
        color: #475569;
        border-radius: 14px;
        padding: 0.5rem 1.2rem;
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .btn-premium-outline:hover {
        border-color: #111111;
        color: #111111;
        background: #f8fafc;
        transform: translateY(-2px);
    }

    /* Media Gallery Hover */
    .gallery-img {
        transition: all 0.3s ease;
        cursor: pointer;
        border-radius: 12px;
    }
    .gallery-img:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(231, 84, 128, 0.2) !important;
    }

    /* Match Card Styles */
    .match-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.03);
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    
    .match-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(231, 84, 128, 0.15);
    }

    .match-img-wrapper {
        position: relative;
        height: 280px;
        overflow: hidden;
    }

    .match-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .match-card:hover .match-img-wrapper img {
        transform: scale(1.05);
    }

    .match-badge {
        position: absolute;
        backdrop-filter: blur(5px);
        font-weight: 700;
        letter-spacing: 0.5px;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
    }

</style>
@endpush

@section('content')

<div class="bg-glow-orb orb-1"></div>
<div class="bg-glow-orb orb-2"></div>

<svg width="0" height="0" class="position-absolute">
    <defs>
        <linearGradient id="signatureGradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#0a0a0a" />
            <stop offset="100%" stop-color="#e75480" />
        </linearGradient>
    </defs>
</svg>

<svg class="bg-floating-element" style="top: 12%; right: 8%; width: 220px; --rot-start: 15deg; --rot-mid: 25deg; --duration: 8s;" viewBox="0 0 16 16" fill="url(#signatureGradient)">
    <path d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg>

<svg class="bg-floating-element" style="bottom: 15%; left: 6%; width: 160px; --rot-start: -20deg; --rot-mid: -5deg; --duration: 10s;" viewBox="0 0 16 16" fill="url(#signatureGradient)">
    <path d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
</svg>

<div class="container-fluid py-5 page-spacing font-sans">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-5 gap-3 animate-card">
        <div class="d-flex align-items-center">
            @if($profile->profile_photo)
                <img src="{{ asset('public/storage/'.$profile->profile_photo) }}" class="rounded-circle shadow-sm me-4" style="width: 80px; height: 80px; object-fit: cover; border: 3px solid white;">
            @else
                <div class="rounded-circle bg-gradient-signature text-white d-flex align-items-center justify-content-center shadow-sm me-4" style="width: 80px; height: 80px; font-size: 2rem; font-weight: bold; border: 3px solid white;">
                    {{ strtoupper(substr($profile->first_name ?? 'U', 0, 1)) }}
                </div>
            @endif
            <div>
                <h2 class="font-serif fw-bold m-0 text-gradient" style="font-size: 2.2rem;">{{ trim($profile->first_name.' '.$profile->last_name) }}</h2>
                <p class="text-muted mt-1 mb-0 fw-semibold d-flex align-items-center">
                    <span class="badge bg-light text-dark border me-2 py-1 px-2">ID: {{ $profile->profile_id ?? 'N/A' }}</span>
                    @if($profile->is_verified)
                        <span class="text-success"><i class="bi bi-patch-check-fill me-1"></i>Verified</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="btn-glow text-decoration-none">
                <i class="bi bi-pencil-square me-1"></i> Edit
            </a>
            <a href="{{ route('admin.profiles.index') }}" class="btn-premium-outline text-decoration-none">
                <i class="bi bi-arrow-left me-1"></i> Back
            </a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            
            {{-- ================= BASIC INFORMATION ================= --}}
            <div class="premium-card p-4 p-lg-5 mb-4 animate-card delay-1">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-wrapper me-3">
                        <i class="bi bi-person-vcard fs-5 text-white"></i>
                    </div>
                    <h4 class="font-serif fw-bold mb-0 text-dark">Basic Information</h4>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-md-4"><span class="info-label">Title</span><span class="info-value">{{ $profile->title ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">First Name</span><span class="info-value">{{ $profile->first_name ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Middle Name</span><span class="info-value">{{ $profile->middle_name ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Last Name</span><span class="info-value">{{ $profile->last_name ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Gender</span><span class="info-value">{{ $profile->gender ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Mobile</span><span class="info-value">{{ $profile->country_code ?? '' }} {{ $profile->mobile ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Email</span><span class="info-value text-primary">{{ $profile->email ?? '—' }}</span></div>
                </div>
            </div>

            {{-- ================= BIRTH & PHYSICAL ================= --}}
            <div class="premium-card p-4 p-lg-5 mb-4 animate-card delay-1">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-wrapper me-3">
                        <i class="bi bi-calendar2-heart fs-5 text-white"></i>
                    </div>
                    <h4 class="font-serif fw-bold mb-0 text-dark">Birth & Physical Traits</h4>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-md-4"><span class="info-label">Date of Birth</span><span class="info-value">{{ $profile->dob ? $profile->dob->format('d-m-Y') : '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Time of Birth</span><span class="info-value">{{ $profile->tob ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Age</span><span class="info-value">{{ $profile->age_years ?? '—' }} years</span></div>
                    <div class="col-sm-6 col-md-4">
                        <span class="info-label">Height</span>
                        <span class="info-value">
                            @if($profile->height_feet !== null)
                                {{ $profile->height_feet }}' {{ $profile->height_inch }}" ({{ $profile->height_cm }} cm)
                            @else — @endif
                        </span>
                    </div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Weight</span><span class="info-value">{{ $profile->weight_kg ?? '—' }} kg</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Blood Group</span><span class="info-value"><span class="badge bg-danger bg-opacity-10 text-danger border border-danger-subtle">{{ $profile->blood_group ?? '—' }}</span></span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Complexion</span><span class="info-value">{{ $profile->complexion ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Body Type</span><span class="info-value">{{ $profile->body_type ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Physical Status</span><span class="info-value">{{ $profile->physical_status ?? '—' }}</span></div>
                </div>
            </div>

            {{-- ================= RELIGION & HOROSCOPE ================= --}}
            <div class="premium-card p-4 p-lg-5 mb-4 animate-card delay-2">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-wrapper me-3">
                        <i class="bi bi-moon-stars fs-5 text-white"></i>
                    </div>
                    <h4 class="font-serif fw-bold mb-0 text-dark">Religion & Horoscope</h4>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-md-4"><span class="info-label">Religion</span><span class="info-value">{{ $profile->religion ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Caste / Sub Caste</span><span class="info-value">{{ $profile->caste ?? '—' }} {{ $profile->sub_caste ? '('.$profile->sub_caste.')' : '' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Gotra</span><span class="info-value">{{ $profile->gotra ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Mangal Dosh</span><span class="info-value">
                        @if($profile->mangal_dosh == 'yes') <span class="text-danger fw-bold"><i class="bi bi-exclamation-circle-fill"></i> Yes</span>
                        @elseif($profile->mangal_dosh == 'no') <span class="text-success fw-bold"><i class="bi bi-check-circle-fill"></i> No</span>
                        @else {{ $profile->mangal_dosh ?? '—' }} @endif
                    </span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Nakshatra</span><span class="info-value">{{ $profile->nakshatra ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Rashi</span><span class="info-value">{{ $profile->rashi ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Gan / Nadi / Charan</span><span class="info-value">{{ $profile->gan ?? '-' }} / {{ $profile->nadi ?? '-' }} / {{ $profile->charan ?? '-' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Mother Tongue</span><span class="info-value">{{ $profile->mother_tongue ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Languages Known</span><span class="info-value">{{ is_array($profile->languages_known) ? implode(', ', $profile->languages_known) : ($profile->languages_known ?? '—') }}</span></div>
                </div>
            </div>

            {{-- ================= PROFESSIONAL & EDUCATION ================= --}}
            <div class="premium-card p-4 p-lg-5 mb-4 animate-card delay-2">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-wrapper me-3">
                        <i class="bi bi-briefcase fs-5 text-white"></i>
                    </div>
                    <h4 class="font-serif fw-bold mb-0 text-dark">Education & Profession</h4>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-md-4"><span class="info-label">Highest Qualification</span><span class="info-value">{{ $profile->highest_qualification ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-8"><span class="info-label">Institution Name</span><span class="info-value">{{ $profile->institution_name ?? '—' }}</span></div>
                    
                    <div class="col-sm-6 col-md-4"><span class="info-label">Occupation</span><span class="info-value">{{ $profile->occupation ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Designation</span><span class="info-value">{{ $profile->designation ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Company Name</span><span class="info-value">{{ $profile->company_name ?? '—' }}</span></div>
                    
                    <div class="col-sm-6 col-md-4"><span class="info-label">Industry</span><span class="info-value">{{ $profile->industry ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Job Type</span><span class="info-value">{{ $profile->job_type ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-4"><span class="info-label">Annual Income</span><span class="info-value text-success">{{ $profile->income_formatted ?? '—' }}</span></div>
                </div>
            </div>

            {{-- ================= FAMILY BACKGROUND ================= --}}
            <div class="premium-card p-4 p-lg-5 mb-4 animate-card delay-3">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-wrapper me-3">
                        <i class="bi bi-people fs-5 text-white"></i>
                    </div>
                    <h4 class="font-serif fw-bold mb-0 text-dark">Family Background</h4>
                </div>
                <div class="row g-4">
                    <div class="col-sm-6 col-md-6"><span class="info-label">Father's Name</span><span class="info-value">{{ trim($profile->father_first.' '.$profile->father_middle.' '.$profile->father_last) ?: '—' }} {!! $profile->father_alive === 0 ? '<span class="badge bg-secondary ms-1">Late</span>' : '' !!}</span></div>
                    <div class="col-sm-6 col-md-6"><span class="info-label">Father Occupation</span><span class="info-value">{{ $profile->father_occupation ?? '—' }}</span></div>
                    
                    <div class="col-sm-6 col-md-6"><span class="info-label">Mother's Name</span><span class="info-value">{{ trim($profile->mother_first.' '.$profile->mother_middle.' '.$profile->mother_last) ?: '—' }} {!! $profile->mother_alive === 0 ? '<span class="badge bg-secondary ms-1">Late</span>' : '' !!}</span></div>
                    <div class="col-sm-6 col-md-6"><span class="info-label">Mother Occupation</span><span class="info-value">{{ $profile->mother_occupation ?? '—' }}</span></div>
                    
                    <div class="col-sm-6 col-md-3"><span class="info-label">Brothers</span><span class="info-value">{{ $profile->no_of_brothers ?? 0 }} ({{ $profile->married_brothers ?? 0 }} Married)</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Sisters</span><span class="info-value">{{ $profile->no_of_sisters ?? 0 }} ({{ $profile->married_sisters ?? 0 }} Married)</span></div>
                    
                    <div class="col-sm-6 col-md-3"><span class="info-label">Family Type</span><span class="info-value">{{ $profile->family_type ?? '—' }}</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Family Status</span><span class="info-value">{{ $profile->family_status ?? '—' }}</span></div>
                </div>
            </div>

            {{-- ================= PARTNER PREFERENCES ================= --}}
            <div class="premium-card p-4 p-lg-5 mb-4 animate-card delay-3">
                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                    <div class="icon-wrapper me-3">
                        <i class="bi bi-heart-arrow fs-5 text-white"></i>
                    </div>
                    <h4 class="font-serif fw-bold mb-0 text-dark">Partner Preferences</h4>
                </div>
                <div class="row g-4 bg-light rounded-4 p-3 border">
                    <div class="col-sm-6 col-md-3"><span class="info-label">Age Preference</span><span class="info-value">{{ $profile->partner_min_age ?? '?' }} to {{ $profile->partner_max_age ?? '?' }} yrs</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Height Preference</span><span class="info-value">{{ $profile->partner_min_height ?? '?' }} - {{ $profile->partner_max_height ?? '?' }} cm</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Marital Status</span><span class="info-value">{{ $profile->partner_marital_status ?? 'Any' }}</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Caste Barrier</span><span class="info-value">{{ $profile->caste_barrier ? 'Strict' : 'Flexible' }}</span></div>
                    
                    <div class="col-sm-6 col-md-3"><span class="info-label">Religion</span><span class="info-value">{{ $profile->partner_religion ?? 'Any' }}</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Caste</span><span class="info-value">{{ $profile->partner_caste ?? 'Any' }}</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Occupation</span><span class="info-value">{{ $profile->partner_occupation ?? 'Any' }}</span></div>
                    <div class="col-sm-6 col-md-3"><span class="info-label">Income Demand</span><span class="info-value">{{ $profile->partner_income ? '₹ '.number_format($profile->partner_income) : 'Any' }}</span></div>
                    
                    <div class="col-12"><span class="info-label">Area Preferences</span><span class="info-value">{{ is_array($profile->area_preference) ? implode(', ', $profile->area_preference) : ($profile->area_preference ?? 'No specific preference') }}</span></div>
                </div>
            </div>

        </div>

        <div class="col-xl-4">
            
            {{-- ================= SYSTEM & STATUS ================= --}}
            <div class="premium-card p-4 mb-4 animate-card delay-1">
                <h5 class="font-serif fw-bold text-dark mb-4 border-bottom pb-2">Status & Admin</h5>
                
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <span class="info-label mb-0">Profile Health</span>
                    <span class="badge bg-success rounded-pill px-3">{{ $profile->profile_completion ?? '0' }}% Complete</span>
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <span class="info-label mb-0">Account Status</span>
                    @if($profile->is_active) <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle">Active</span>
                    @else <span class="badge bg-danger bg-opacity-10 text-danger border border-danger-subtle">Inactive</span> @endif
                </div>

                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <span class="info-label mb-0">Membership</span>
                    @if($profile->is_premium) <span class="badge bg-warning bg-opacity-10 text-warning border border-warning-subtle text-dark"><i class="bi bi-star-fill"></i> Premium</span>
                    @else <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary-subtle">Free Plan</span> @endif
                </div>

                <hr class="my-4 text-muted">

                <div class="mb-3"><span class="info-label">Profile Created</span><span class="info-value fs-6">{{ $profile->registration_date ? $profile->registration_date->format('d-m-Y H:i') : '—' }}</span></div>
                <div class="mb-3"><span class="info-label">Last Login</span><span class="info-value fs-6">{{ $profile->last_login ? $profile->last_login->format('d-m-Y H:i') : '—' }}</span></div>
                <div class="mb-3"><span class="info-label">Created By</span><span class="info-value fs-6">{{ $profile->profile_created_by ?? 'Self' }}</span></div>
            </div>

            {{-- ================= ADDRESS SUMMARY ================= --}}
            <div class="premium-card p-4 mb-4 animate-card delay-2">
                <h5 class="font-serif fw-bold text-dark mb-4 border-bottom pb-2">Location</h5>
                
                <div class="mb-4">
                    <span class="info-label"><i class="bi bi-house me-1"></i> Current Address</span>
                    <span class="info-value fs-6">
                        {{ $profile->house_no ? $profile->house_no.', ' : '' }}
                        {{ $profile->street ? $profile->street.', ' : '' }}
                        {{ $profile->city ? $profile->city.', ' : '' }}
                        {{ $profile->state ? $profile->state.' ' : '' }}
                        {{ $profile->pincode ?? '' }}
                    </span>
                </div>
                
                <div>
                    <span class="info-label"><i class="bi bi-geo me-1"></i> Native Place</span>
                    <span class="info-value fs-6">{{ $profile->native_place ?? '—' }}</span>
                </div>
            </div>

            {{-- ================= MEDIA GALLERY ================= --}}
            <div class="premium-card p-4 mb-4 animate-card delay-3">
                <h5 class="font-serif fw-bold text-dark mb-4 border-bottom pb-2">Media Gallery</h5>
                
                @if(!empty($profile->self_images))
                    <div class="row g-2">
                        @foreach($profile->self_images as $img)
                        <div class="col-4">
                            <img src="{{ asset('public/storage/'.$img) }}" class="img-fluid gallery-img shadow-sm w-100" style="height:80px; object-fit:cover;" data-bs-toggle="modal" data-bs-target="#imagePreviewModal" data-image="{{ asset('public/storage/'.$img) }}">
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-4 bg-light rounded-3 border">
                        <i class="bi bi-images fs-3 text-muted"></i>
                        <p class="text-muted small mt-2 mb-0">No gallery images uploaded.</p>
                    </div>
                @endif
                
                @if($profile->horoscope_image)
                    <div class="mt-4">
                        <span class="info-label">Horoscope Document</span>
                        <img src="{{ asset('public/storage/'.$profile->horoscope_image) }}" class="img-fluid gallery-img shadow-sm w-100 mt-2" style="height:120px; object-fit:cover;" data-bs-toggle="modal" data-bs-target="#imagePreviewModal" data-image="{{ asset('public/storage/'.$profile->horoscope_image) }}">
                    </div>
                @endif
            </div>

        </div>
    </div>


    {{-- ================= SUGGESTED MATCHES ================= --}}
    @if(isset($matches) && $matches->count() > 0)
    <div class="mt-5 pt-4 animate-card delay-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="font-serif fw-bold m-0 text-dark d-flex align-items-center">
                    <i class="bi bi-stars text-pink me-2" style="color: #e75480;"></i> Suggested Matches
                </h3>
                <p class="text-muted mt-1 mb-0 fw-medium">Highly compatible profiles based on partner preferences.</p>
            </div>
            <span class="badge bg-white text-dark shadow-sm border px-3 py-2 fw-bold fs-6 rounded-pill">Total: {{ $matches->count() }}</span>
        </div>

        <div class="row g-4">
            @foreach($matches as $match)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="match-card position-relative h-100 d-flex flex-column">
                    <div class="match-img-wrapper">
                        <img src="{{ $match->profile_photo_url }}" alt="{{ $match->full_name }}">
                        
                        @if($match->is_premium && $match->premium_expiry > now())
                            <span class="match-badge bg-warning text-dark border border-warning" style="top: 15px; right: 15px;">
                                <i class="bi bi-star-fill"></i> Premium
                            </span>
                        @endif
                        
                        @if($match->is_verified)
                            <span class="match-badge" style="top: 15px; left: 15px; background: rgba(255,255,255,0.9); color: #10b981;">
                                <i class="bi bi-patch-check-fill"></i> Verified
                            </span>
                        @endif

                        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                            <h5 class="text-white fw-bold mb-0">{{ $match->full_name }} <span class="fw-normal fs-6 text-white-50 ms-1">{{ $match->age_years }}</span></h5>
                            <p class="text-white-50 small mb-0">{{ $match->occupation ?? 'Not specified' }}</p>
                        </div>
                    </div>
                    
                    <div class="card-body bg-white p-3 d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                            <span class="text-muted small fw-semibold"><i class="bi bi-geo-alt-fill me-1"></i>{{ $match->city ?? 'Unknown' }}</span>
                            <span class="badge bg-success bg-opacity-10 text-success border border-success-subtle rounded-pill">
                                <i class="bi bi-heart-fill me-1"></i> {{ $profile->getMatchScore($match) }}% Match
                            </span>
                        </div>
                        
                        <div class="d-flex gap-2 mt-auto">
                            <a href="{{ route('admin.profiles.show', $match->id) }}" class="btn btn-light border flex-grow-1 fw-bold text-secondary rounded-3">View</a>
                            <button type="button" class="btn btn-glow flex-grow-1 py-2 px-0 rounded-3" onclick="sendInterest({{ $match->user_id }})">
                                <i class="bi bi-send-fill me-1"></i> Connect
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(method_exists($matches, 'links') && $matches->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $matches->links('pagination::bootstrap-5') }}
        </div>
        @endif
    </div>
    
    @elseif(isset($matches))
    <div class="premium-card p-5 mt-5 text-center animate-card delay-4 border-0">
        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px;">
            <i class="bi bi-search-heart fs-1 text-muted"></i>
        </div>
        <h4 class="font-serif fw-bold text-dark">No Matches Found</h4>
        <p class="text-muted fw-medium">Try updating the partner preferences to broaden the search criteria.</p>
    </div>
    @endif

</div>

<div class="modal fade" id="imagePreviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body text-center position-relative p-0">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3 fs-4" data-bs-dismiss="modal" style="z-index: 10;"></button>
                <img id="previewModalImage" src="" class="img-fluid rounded-4 shadow-lg" style="max-height: 90vh; border: 4px solid rgba(255,255,255,0.2);">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('imagePreviewModal');
        modal.addEventListener('show.bs.modal', function (event) {
            const img = event.relatedTarget;
            const imageSrc = img.getAttribute('data-image');
            document.getElementById('previewModalImage').src = imageSrc;
        });
    });
</script>
@endsection