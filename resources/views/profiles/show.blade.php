@extends('layouts.app')

@section('title', trim($profile->first_name.' '.$profile->last_name))

@section('content')

<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .transition-all {
        transition: all 0.3s ease;
    }
    .card-img-top {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .match-score {
        font-size: 0.9rem;
    }
</style>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-light">
            <i class="bi bi-person-circle me-2"></i>Complete Profile Details
        </h3>
        <a href="{{ route('admin.profiles.index') }}" class="btn btn-light btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">

            {{-- ================= BASIC INFORMATION ================= --}}
            <h5 class="fw-bold text-primary mb-3">👤 Basic Information</h5>
            <div class="row">
                <div class="col-md-4"><strong>Profile ID:</strong> {{ $profile->profile_id ?? '—' }}</div>
                <div class="col-md-4"><strong>Title:</strong> {{ $profile->title ?? '—' }}</div>
                <div class="col-md-4"><strong>First Name:</strong> {{ $profile->first_name ?? '—' }}</div>
                <div class="col-md-4"><strong>Middle Name:</strong> {{ $profile->middle_name ?? '—' }}</div>
                <div class="col-md-4"><strong>Last Name:</strong> {{ $profile->last_name ?? '—' }}</div>
                <div class="col-md-4"><strong>Full Name:</strong> {{ $profile->full_name ?? '—' }}</div>
                <div class="col-md-4"><strong>Gender:</strong> {{ $profile->gender ?? '—' }}</div>
                <div class="col-md-4"><strong>Mobile:</strong> {{ $profile->country_code ?? '' }} {{ $profile->mobile ?? '—' }}</div>
                <div class="col-md-4"><strong>Alternate Mobile:</strong> {{ $profile->alternate_mobile ?? '—' }}</div>
                <div class="col-md-4"><strong>Email:</strong> {{ $profile->email ?? '—' }}</div>
                <div class="col-md-4"><strong>Highest Qualification:</strong> {{ $profile->highest_qualification ?? '—' }}</div>
                <div class="col-md-4"><strong>Other Qualification:</strong> {{ $profile->other_qualification ?? '—' }}</div>
                <div class="col-md-4"><strong>Institution Name:</strong> {{ $profile->institution_name ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= ADDRESS ================= --}}
            <h5 class="fw-bold text-success mb-3">🏠 Address Details</h5>
            <div class="row">
                <div class="col-md-4"><strong>House No:</strong> {{ $profile->house_no ?? '—' }}</div>
                <div class="col-md-4"><strong>Colony:</strong> {{ $profile->colony ?? '—' }}</div>
                <div class="col-md-4"><strong>Street:</strong> {{ $profile->street ?? '—' }}</div>
                <div class="col-md-4"><strong>Landmark:</strong> {{ $profile->landmark ?? '—' }}</div>
                <div class="col-md-4"><strong>Pincode:</strong> {{ $profile->pincode ?? '—' }}</div>
                <div class="col-md-4"><strong>City:</strong> {{ $profile->city ?? '—' }}</div>
                <div class="col-md-4"><strong>Taluka:</strong> {{ $profile->taluka ?? '—' }}</div>
                <div class="col-md-4"><strong>District:</strong> {{ $profile->district ?? '—' }}</div>
                <div class="col-md-4"><strong>State:</strong> {{ $profile->state ?? '—' }}</div>
                <div class="col-md-4"><strong>Country:</strong> {{ $profile->country ?? '—' }}</div>
                <div class="col-md-6"><strong>Current Address:</strong> {{ $profile->current_address ?? '—' }}</div>
                <div class="col-md-6"><strong>Permanent Address:</strong> {{ $profile->permanent_address ?? '—' }}</div>
                <div class="col-md-4"><strong>Native Place:</strong> {{ $profile->native_place ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= BIRTH & PHYSICAL ================= --}}
            <h5 class="fw-bold text-danger mb-3">🎂 Birth & Physical Details</h5>
            <div class="row">
                <div class="col-md-4"><strong>DOB:</strong> {{ $profile->dob ? $profile->dob->format('d-m-Y') : '—' }}</div>
                <div class="col-md-4"><strong>TOB:</strong> {{ $profile->tob ?? '—' }}</div>
                <div class="col-md-4"><strong>Birth Place:</strong> {{ $profile->birth_place ?? '—' }}</div>
                <div class="col-md-4"><strong>Age:</strong> {{ $profile->age_years ?? '—' }} years</div>
                <div class="col-md-4">
                    <strong>Height:</strong>
                    @if($profile->height_feet !== null)
                        {{ $profile->height_feet }}' {{ $profile->height_inch }}" ({{ $profile->height_cm }} cm)
                    @else
                        —
                    @endif
                </div>
                <div class="col-md-4"><strong>Weight:</strong> {{ $profile->weight_kg ?? '—' }} kg</div>
                <div class="col-md-4"><strong>Blood Group:</strong> {{ $profile->blood_group ?? '—' }}</div>
                <div class="col-md-4"><strong>Complexion:</strong> {{ $profile->complexion ?? '—' }}</div>
                <div class="col-md-4"><strong>Body Type:</strong> {{ $profile->body_type ?? '—' }}</div>
                <div class="col-md-4"><strong>Physical Status:</strong> {{ $profile->physical_status ?? '—' }}</div>
                <div class="col-md-4"><strong>Hobbies:</strong> {{ is_array($profile->hobbies) ? implode(', ', $profile->hobbies) : ($profile->hobbies ?? '—') }}</div>
                <div class="col-md-4"><strong>Interests:</strong> {{ is_array($profile->interests) ? implode(', ', $profile->interests) : ($profile->interests ?? '—') }}</div>
            </div>

            <hr>

            {{-- ================= MARITAL STATUS ================= --}}
            <h5 class="fw-bold text-warning mb-3">💍 Marital Status</h5>
            <div class="row">
                <div class="col-md-4"><strong>Marital Status:</strong> {{ $profile->marital_status ?? '—' }}</div>
                <div class="col-md-4"><strong>Children:</strong> {{ $profile->children ?? '0' }}</div>
                <div class="col-md-4"><strong>Children Living With:</strong> {{ $profile->children_living_with ?? '—' }}</div>
                <div class="col-md-6"><strong>Divorce Details:</strong> {{ $profile->divorce_details ?? '—' }}</div>
                <div class="col-md-6"><strong>Widow/Widower Details:</strong> {{ $profile->widow_widower_details ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= PERSONAL & HOROSCOPE ================= --}}
            <h5 class="fw-bold text-info mb-3">🌟 Personal & Horoscope</h5>
            <div class="row">
                <div class="col-md-4"><strong>Mangal Dosh:</strong> {{ $profile->mangal_dosh ?? '—' }}</div>
                <div class="col-md-4"><strong>Nakshatra:</strong> {{ $profile->nakshatra ?? '—' }}</div>
                <div class="col-md-4"><strong>Rashi:</strong> {{ $profile->rashi ?? '—' }}</div>
                <div class="col-md-4"><strong>Charan:</strong> {{ $profile->charan ?? '—' }}</div>
                <div class="col-md-4"><strong>Gan:</strong> {{ $profile->gan ?? '—' }}</div>
                <div class="col-md-4"><strong>Nadi:</strong> {{ $profile->nadi ?? '—' }}</div>
                <div class="col-md-4"><strong>Gotra:</strong> {{ $profile->gotra ?? '—' }}</div>
                <div class="col-md-4"><strong>Diet:</strong> {{ $profile->diet ?? '—' }}</div>
                <div class="col-md-4"><strong>Drinking Habits:</strong> {{ $profile->drinking_habits ?? '—' }}</div>
                <div class="col-md-4"><strong>Smoking Habits:</strong> {{ $profile->smoking_habits ?? '—' }}</div>
                <div class="col-md-6"><strong>About Myself:</strong> {{ $profile->about_myself ?? '—' }}</div>
                <div class="col-md-6"><strong>Family Values:</strong> {{ $profile->family_values ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= PROFESSIONAL ================= --}}
            <h5 class="fw-bold text-secondary mb-3">💼 Professional Details</h5>
            <div class="row">
                <div class="col-md-4"><strong>Occupation:</strong> {{ $profile->occupation ?? '—' }}</div>
                <div class="col-md-4"><strong>Designation:</strong> {{ $profile->designation ?? '—' }}</div>
                <div class="col-md-4"><strong>Company Name:</strong> {{ $profile->company_name ?? '—' }}</div>
                <div class="col-md-4"><strong>Industry:</strong> {{ $profile->industry ?? '—' }}</div>
                <div class="col-md-4"><strong>Job Type:</strong> {{ $profile->job_type ?? '—' }}</div>
                <div class="col-md-4"><strong>Business Type:</strong> {{ $profile->business_type ?? '—' }}</div>
                <div class="col-md-4"><strong>Annual Income:</strong> {{ $profile->income_formatted ?? '—' }}</div>
                <div class="col-md-4"><strong>Self Income:</strong> {{ $profile->income_formatted ? $profile->income_formatted : ($profile->self_income ? '₹ '.number_format($profile->self_income) : '—') }}</div>
                <div class="col-md-4"><strong>Family Income:</strong> {{ $profile->family_income ? '₹ '.number_format($profile->family_income) : '—' }}</div>
                <div class="col-md-4"><strong>Budget/Demand:</strong> {{ $profile->budget_demand ? '₹ '.number_format($profile->budget_demand) : '—' }}</div>
                <div class="col-md-6"><strong>Property Details:</strong> {{ $profile->property_details ?? '—' }}</div>
                <div class="col-md-6"><strong>Vehicle Details:</strong> {{ $profile->vehicle_details ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= RELIGION & COMMUNITY ================= --}}
            <h5 class="fw-bold text-dark mb-3">🕉️ Religion & Community</h5>
            <div class="row">
                <div class="col-md-4"><strong>Religion:</strong> {{ $profile->religion ?? '—' }}</div>
                <div class="col-md-4"><strong>Caste:</strong> {{ $profile->caste ?? '—' }}</div>
                <div class="col-md-4"><strong>Sub Caste:</strong> {{ $profile->sub_caste ?? '—' }}</div>
                <div class="col-md-4"><strong>Mother Tongue:</strong> {{ $profile->mother_tongue ?? '—' }}</div>
                <div class="col-md-4"><strong>Languages Known:</strong> {{ is_array($profile->languages_known) ? implode(', ', $profile->languages_known) : ($profile->languages_known ?? '—') }}</div>
                <div class="col-md-4"><strong>Ethnicity:</strong> {{ $profile->ethnicity ?? '—' }}</div>
                <div class="col-md-4"><strong>Community:</strong> {{ $profile->community ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= FAMILY BACKGROUND ================= --}}
            <h5 class="fw-bold text-primary mb-3">👨‍👩‍👧 Family Background</h5>
            <div class="row">
                <div class="col-md-4"><strong>Father's Name:</strong> {{ trim($profile->father_first.' '.$profile->father_middle.' '.$profile->father_last) ?: '—' }}</div>
                <div class="col-md-4"><strong>Father Occupation:</strong> {{ $profile->father_occupation ?? '—' }}</div>
                <div class="col-md-4"><strong>Father Alive:</strong> {{ $profile->father_alive ? 'Yes' : 'No' }}</div>
                <div class="col-md-4"><strong>Mother's Name:</strong> {{ trim($profile->mother_first.' '.$profile->mother_middle.' '.$profile->mother_last) ?: '—' }}</div>
                <div class="col-md-4"><strong>Mother Occupation:</strong> {{ $profile->mother_occupation ?? '—' }}</div>
                <div class="col-md-4"><strong>Mother Alive:</strong> {{ $profile->mother_alive ? 'Yes' : 'No' }}</div>
                <div class="col-md-4"><strong>Family Type:</strong> {{ $profile->family_type ?? '—' }}</div>
                <div class="col-md-4"><strong>Family Status:</strong> {{ $profile->family_status ?? '—' }}</div>
                <div class="col-md-4"><strong>No. of Brothers:</strong> {{ $profile->no_of_brothers ?? 0 }}</div>
                <div class="col-md-4"><strong>No. of Sisters:</strong> {{ $profile->no_of_sisters ?? 0 }}</div>
                <div class="col-md-4"><strong>Married Brothers:</strong> {{ $profile->married_brothers ?? 0 }}</div>
                <div class="col-md-4"><strong>Married Sisters:</strong> {{ $profile->married_sisters ?? 0 }}</div>
                <div class="col-md-4"><strong>Family Location:</strong> {{ $profile->family_location ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= PARTNER PREFERENCES ================= --}}
            <h5 class="fw-bold text-warning mb-3">💑 Partner Preferences</h5>
            <div class="row">
                <div class="col-md-4"><strong>Min Age:</strong> {{ $profile->partner_min_age ?? '—' }}</div>
                <div class="col-md-4"><strong>Max Age:</strong> {{ $profile->partner_max_age ?? '—' }}</div>
                <div class="col-md-4"><strong>Min Height:</strong> {{ $profile->partner_min_height ?? '—' }} cm</div>
                <div class="col-md-4"><strong>Max Height:</strong> {{ $profile->partner_max_height ?? '—' }} cm</div>
                <div class="col-md-4"><strong>Religion:</strong> {{ $profile->partner_religion ?? '—' }}</div>
                <div class="col-md-4"><strong>Caste:</strong> {{ $profile->partner_caste ?? '—' }}</div>
                <div class="col-md-4"><strong>Sub Caste:</strong> {{ $profile->partner_sub_caste ?? '—' }}</div>
                <div class="col-md-4"><strong>Qualification:</strong> {{ $profile->partner_qualification ?? '—' }}</div>
                <div class="col-md-4"><strong>Occupation:</strong> {{ $profile->partner_occupation ?? '—' }}</div>
                <div class="col-md-4"><strong>Income:</strong> {{ $profile->partner_income ? '₹ '.number_format($profile->partner_income) : '—' }}</div>
                <div class="col-md-4"><strong>Country:</strong> {{ $profile->partner_country ?? '—' }}</div>
                <div class="col-md-4"><strong>State:</strong> {{ $profile->partner_state ?? '—' }}</div>
                <div class="col-md-4"><strong>City:</strong> {{ $profile->partner_city ?? '—' }}</div>
                <div class="col-md-4"><strong>Location:</strong> {{ $profile->partner_location ?? '—' }}</div>
                <div class="col-md-4"><strong>Marital Status:</strong> {{ $profile->partner_marital_status ?? '—' }}</div>
                <div class="col-md-4"><strong>Mangal Dosh:</strong> {{ $profile->partner_mangal_dosh ?? '—' }}</div>
                <div class="col-md-4"><strong>Diet:</strong> {{ $profile->partner_diet ?? '—' }}</div>
                <div class="col-md-4"><strong>Complexion:</strong> {{ $profile->partner_complexion ?? '—' }}</div>
                <div class="col-md-4"><strong>Physical Status:</strong> {{ $profile->partner_physical_status ?? '—' }}</div>
                <div class="col-md-6"><strong>Family Background:</strong> {{ $profile->partner_family_background ?? '—' }}</div>
                <div class="col-md-6"><strong>Partner Description:</strong> {{ $profile->partner_description ?? '—' }}</div>
                <div class="col-md-4"><strong>Caste Barrier:</strong> {{ $profile->caste_barrier ? 'Yes' : 'No' }}</div>
                <div class="col-md-4"><strong>Budget Demand:</strong> {{ $profile->partner_budget_demand ? '₹ '.number_format($profile->partner_budget_demand) : '—' }}</div>
                <div class="col-md-4"><strong>Horoscope Required:</strong> {{ $profile->horoscope ? 'Yes' : 'No' }}</div>
                <div class="col-md-6"><strong>Area Preference:</strong> {{ is_array($profile->area_preference) ? implode(', ', $profile->area_preference) : ($profile->area_preference ?? '—') }}</div>
                <div class="col-md-6"><strong>Other Preferences:</strong> {{ $profile->other_preferences ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= ADDITIONAL DETAILS ================= --}}
            <h5 class="fw-bold text-info mb-3">📋 Additional Details</h5>
            <div class="row">
                <div class="col-md-6"><strong>Expectations from Partner:</strong> {{ $profile->expectations_from_partner ?? '—' }}</div>
                <div class="col-md-6"><strong>About Family:</strong> {{ $profile->about_family ?? '—' }}</div>
                <div class="col-md-6"><strong>Hobbies & Interests:</strong> {{ $profile->hobbies_interests ?? '—' }}</div>
                <div class="col-md-6"><strong>Career Ambitions:</strong> {{ $profile->career_ambitions ?? '—' }}</div>
                <div class="col-md-6"><strong>Religious Beliefs:</strong> {{ $profile->religious_beliefs ?? '—' }}</div>
                <div class="col-md-6"><strong>Lifestyle:</strong> {{ $profile->lifestyle ?? '—' }}</div>
                <div class="col-md-6"><strong>Personality Traits:</strong> {{ $profile->personality_traits ?? '—' }}</div>
                <div class="col-md-6"><strong>Health Information:</strong> {{ $profile->health_information ?? '—' }}</div>
                <div class="col-md-6"><strong>Education Details:</strong> {{ $profile->education_details ? json_encode($profile->education_details) : '—' }}</div>
                <div class="col-md-6"><strong>Work Experience:</strong> {{ $profile->work_experience ? json_encode($profile->work_experience) : '—' }}</div>
                <div class="col-md-6"><strong>Skills:</strong> {{ $profile->skills ? json_encode($profile->skills) : '—' }}</div>
                <div class="col-md-6"><strong>Achievements:</strong> {{ $profile->achievements ? json_encode($profile->achievements) : '—' }}</div>
                <div class="col-md-6"><strong>Travel History:</strong> {{ $profile->travel_history ? json_encode($profile->travel_history) : '—' }}</div>
                <div class="col-md-6"><strong>Settlement Plans:</strong> {{ $profile->settlement_plans ?? '—' }}</div>
            </div>

            <hr>

            {{-- ================= CONTACT PREFERENCES ================= --}}
            <h5 class="fw-bold text-secondary mb-3">📞 Contact Preferences</h5>
            <div class="row">
                <div class="col-md-4"><strong>Contact Preference:</strong> {{ is_array($profile->contact_preference) ? implode(', ', $profile->contact_preference) : ($profile->contact_preference ?? '—') }}</div>
                <div class="col-md-4"><strong>Contact Timings:</strong> {{ $profile->contact_timings ?? '—' }}</div>
                <div class="col-md-4"><strong>Contact Through:</strong> {{ $profile->contact_through ?? '—' }}</div>
                <div class="col-md-4"><strong>Allow Direct Contact:</strong> {{ $profile->allow_direct_contact ? 'Yes' : 'No' }}</div>
            </div>

            <hr>

            {{-- ================= MEDIA ================= --}}
            <h5 class="fw-bold text-primary mb-3">📸 Media</h5>
            <div class="row">
                @if($profile->profile_photo)
                <div class="col-md-3 col-6 mb-3">
                    <strong>Profile Photo:</strong><br>
                    <img src="{{ asset('public/storage/'.$profile->profile_photo) }}" class="img-fluid rounded shadow-sm" style="max-height:150px">
                </div>
                @endif
                @if($profile->horoscope_image)
                <div class="col-md-3 col-6 mb-3">
                    <strong>Horoscope Image:</strong><br>
                    <img src="{{ asset('public/storage/'.$profile->horoscope_image) }}" class="img-fluid rounded shadow-sm" style="max-height:150px">
                </div>
                @endif
                @if($profile->video_profile)
                <div class="col-md-3 col-6 mb-3">
                    <strong>Video Profile:</strong><br>
                    <video width="200" controls><source src="{{ asset('public/storage/'.$profile->video_profile) }}"></video>
                </div>
                @endif
            </div>

            @if(!empty($profile->family_images))
            <div class="mt-3">
                <strong>Family Images:</strong>
                <div class="row g-3 mt-2">
                    @foreach($profile->family_images as $img)
                    <div class="col-md-3 col-6">
                        <img src="{{ asset('public/storage/'.$img) }}" class="img-fluid rounded shadow-sm" style="height:120px; object-fit:cover">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if(!empty($profile->self_images))
            <div class="mt-3">
                <strong>Self Images:</strong>
                <div class="row g-3 mt-2">
                    @foreach($profile->self_images as $img)
                    <div class="col-md-3 col-6">
                        <img src="{{ asset('public/storage/'.$img) }}" class="img-fluid rounded shadow-sm preview-image" style="height:180px; object-fit:cover; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#imagePreviewModal" data-image="{{ asset('public/storage/'.$img) }}">
                    </div>
                    @endforeach
                </div>
            </div>
            @else
                <p class="text-muted">No images uploaded.</p>
            @endif

            <hr>

            {{-- ================= SYSTEM & STATUS ================= --}}
            <h5 class="fw-bold text-dark mb-3">⚙️ System & Status</h5>
            <div class="row">
                <div class="col-md-3"><strong>Profile ID:</strong> {{ $profile->profile_id ?? '—' }}</div>
                <div class="col-md-3"><strong>Profile Completion:</strong> {{ $profile->profile_completion ?? '—' }}%</div>
                <div class="col-md-3"><strong>Profile Views:</strong> {{ $profile->profile_views ?? 0 }}</div>
                <div class="col-md-3"><strong>Shortlisted Count:</strong> {{ $profile->shortlisted_count ?? 0 }}</div>
                <div class="col-md-3"><strong>Verified:</strong> {{ $profile->is_verified ? 'Yes' : 'No' }}</div>
                <div class="col-md-3"><strong>Verification Level:</strong> {{ $profile->verification_level ?? '—' }}</div>
                <div class="col-md-3"><strong>Verification Date:</strong> {{ $profile->verification_date ? $profile->verification_date->format('d-m-Y H:i') : '—' }}</div>
                <div class="col-md-3"><strong>Premium:</strong> {{ $profile->is_premium ? 'Yes' : 'No' }}</div>
                <div class="col-md-3"><strong>Premium Expiry:</strong> {{ $profile->premium_expiry ? $profile->premium_expiry->format('d-m-Y') : '—' }}</div>
                <div class="col-md-3"><strong>Active:</strong> {{ $profile->is_active ? 'Yes' : 'No' }}</div>
                <div class="col-md-3"><strong>Featured:</strong> {{ $profile->is_featured ? 'Yes' : 'No' }}</div>
                <div class="col-md-3"><strong>Online:</strong> {{ $profile->is_online ? 'Yes' : 'No' }}</div>
                <div class="col-md-3"><strong>Last Login:</strong> {{ $profile->last_login ? $profile->last_login->format('d-m-Y H:i') : '—' }}</div>
                <div class="col-md-3"><strong>Profile Created By:</strong> {{ $profile->profile_created_by ?? '—' }}</div>
                <div class="col-md-3"><strong>Match Score:</strong> {{ $profile->match_score ?? '—' }}</div>
                <div class="col-md-3"><strong>Privacy Settings:</strong> {{ $profile->privacy_settings ? json_encode($profile->privacy_settings) : '—' }}</div>
                <div class="col-md-3"><strong>Contact Visibility:</strong> {{ $profile->contact_visibility ?? '—' }}</div>
                <div class="col-md-3"><strong>Photo Visibility:</strong> {{ $profile->photo_visibility ?? '—' }}</div>
                <div class="col-md-3"><strong>Horoscope Visibility:</strong> {{ $profile->horoscope_visibility ?? '—' }}</div>
                <div class="col-md-3"><strong>Registered By:</strong> {{ $profile->registered_by ?? '—' }}</div>
                <div class="col-md-3"><strong>Registration Date:</strong> {{ $profile->registration_date ? $profile->registration_date->format('d-m-Y H:i') : '—' }}</div>
                <div class="col-md-3"><strong>Payment Status:</strong> {{ $profile->payment_status ? 'Paid' : 'Unpaid' }}</div>
                <div class="col-md-3"><strong>Membership Type:</strong> {{ $profile->membership_type ?? '—' }}</div>
                <div class="col-md-3"><strong>Membership Expiry:</strong> {{ $profile->membership_expiry ? $profile->membership_expiry->format('d-m-Y') : '—' }}</div>
            </div>

            <hr>

            {{-- ================= ADMIN FIELDS ================= --}}
            <h5 class="fw-bold text-danger mb-3">🔧 Admin Notes</h5>
            <div class="row">
                <div class="col-md-4"><strong>Admin Notes:</strong> {{ $profile->admin_notes ?? '—' }}</div>
                <div class="col-md-4"><strong>Admin Rating:</strong> {{ $profile->admin_rating ?? '—' }}</div>
                <div class="col-md-4"><strong>Profile Score:</strong> {{ $profile->profile_score ?? '—' }}</div>
                <div class="col-md-4"><strong>Reported Count:</strong> {{ $profile->reported_count ?? 0 }}</div>
                <div class="col-md-4"><strong>Blocked Count:</strong> {{ $profile->blocked_count ?? 0 }}</div>
                <div class="col-md-4"><strong>Rejection Reason:</strong> {{ $profile->rejection_reason ?? '—' }}</div>
                <div class="col-md-4"><strong>Approval Status:</strong> {{ $profile->approval_status ?? '—' }}</div>
                <div class="col-md-4"><strong>Approved By:</strong> {{ $profile->approvedBy->name ?? '—' }}</div>
                <div class="col-md-4"><strong>Approved Date:</strong> {{ $profile->approved_date ? $profile->approved_date->format('d-m-Y H:i') : '—' }}</div>
            </div>

        </div>
    </div>
</div>
<div class="container mt-4">
    {{-- ================= MATCHES SECTION ================= --}}
    @if(isset($matches) && $matches->count() > 0)
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient-primary text-white rounded-top-4">
            <h4 class="mb-0 fw-bold">
                <i class="bi bi-star-fill me-2"></i>Suggested Matches
                <span class="badge bg-light text-dark ms-2">{{ $matches->count() }} Profiles</span>
            </h4>
            <p class="mb-0 mt-2 text-white-50">Compatible profiles based on partner preferences</p>
        </div>
        <div class="card-body p-4">
            <div class="row">
                @foreach($matches as $match)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm hover-shadow transition-all border-0 rounded-3">
                        <div class="position-relative">
                            <img src="{{ $match->profile_photo_url }}" 
                                 class="card-img-top" 
                                 alt="{{ $match->full_name }}"
                                 style="height: 250px; object-fit: cover;">
                            @if($match->is_premium && $match->premium_expiry > now())
                                <span class="position-absolute top-0 end-0 m-2 badge bg-warning text-dark">
                                    <i class="bi bi-star-fill"></i> Premium
                                </span>
                            @endif
                            @if($match->is_verified)
                                <span class="position-absolute top-0 start-0 m-2 badge bg-success">
                                    <i class="bi bi-check-circle-fill"></i> Verified
                                </span>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-1">{{ $match->full_name }}</h5>
                            <p class="text-muted small mb-2">
                                <i class="bi bi-person-badge"></i> {{ $match->profile_id }}
                            </p>
                            
                            <div class="mb-2">
                                <span class="badge bg-info me-1">
                                    <i class="bi bi-calendar"></i> {{ $match->age_years }} yrs
                                </span>
                                <span class="badge bg-secondary me-1">
                                    <i class="bi bi-ruler"></i> {{ $match->height_feet ?? $match->height_cm.' cm' }}
                                </span>
                                @if($match->religion)
                                <span class="badge bg-primary">
                                    <i class="bi bi-building"></i> {{ $match->religion }}
                                </span>
                                @endif
                            </div>
                            
                            <div class="mb-2">
                                <i class="bi bi-briefcase text-secondary"></i> 
                                {{ $match->occupation ?? 'Not specified' }}
                                @if($match->annual_income)
                                <br><i class="bi bi-currency-rupee text-success"></i> 
                                {{ $match->income_formatted }}
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <i class="bi bi-geo-alt text-danger"></i> 
                                {{ $match->city ?? 'Not specified' }}, 
                                {{ $match->state ?? '' }}
                            </div>
                            
                            @if($match->about_myself)
                            <p class="card-text small text-muted">
                                {{ Str::limit($match->about_myself, 100) }}
                            </p>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="match-score">
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        <i class="bi bi-heart-fill"></i> 
                                        {{ $profile->getMatchScore($match) }}% Match
                                    </span>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('admin.profiles.show', $match->id) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-success"
                                            onclick="sendInterest({{ $match->user_id }})">
                                        <i class="bi bi-send"></i> Interest
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            {{-- Pagination --}}
            @if(method_exists($matches, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $matches->links() }}
            </div>
            @endif
        </div>
    </div>
    @elseif(isset($matches))
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body text-center py-5">
            <i class="bi bi-people fs-1 text-muted"></i>
            <h5 class="mt-3 text-muted">No matches found</h5>
            <p class="text-muted">Try updating your partner preferences to find more matches.</p>
        </div>
    </div>
    @endif
</div>

<!-- Image Preview Modal -->
<div class="modal fade" id="imagePreviewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 bg-transparent">
            <div class="modal-body text-center p-0">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
                <img id="previewModalImage" src="" class="img-fluid rounded shadow">
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