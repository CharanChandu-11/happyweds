<div class="row">
    {{-- ================= PERSONAL INFORMATION ================= --}}
    <div class="col-12 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-primary shadow-sm">
            <h5 class="fw-bold text-primary mb-0">👤 Personal Information</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Title</label>
        <select name="title" class="form-control shadow-sm">
            <option value="">Select</option>
            <option value="Mr" {{ old('title', $profile->title ?? '') == 'Mr' ? 'selected' : '' }}>Mr</option>
            <option value="Ms" {{ old('title', $profile->title ?? '') == 'Ms' ? 'selected' : '' }}>Ms</option>
            <option value="Mrs" {{ old('title', $profile->title ?? '') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
            <option value="Dr" {{ old('title', $profile->title ?? '') == 'Dr' ? 'selected' : '' }}>Dr</option>
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">First Name *</label>
        <input type="text" name="first_name" class="form-control shadow-sm" value="{{ old('first_name', $profile->first_name ?? '') }}">
    </div>

    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Middle Name</label>
        <input type="text" name="middle_name" class="form-control shadow-sm" value="{{ old('middle_name', $profile->middle_name ?? '') }}">
    </div> -->

    <div class="col-md-3 mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control shadow-sm" value="{{ old('last_name', $profile->last_name ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Country Code *</label>
        <select name="country_code" class="form-control shadow-sm" required>
            <option value="">Select</option>
            @foreach($CountryCode->unique('dial_code')->sortBy('dial_code') as $code)
                <option value="{{ $code['dial_code'] }}" {{ old('country_code', $profile->country_code ?? '+91') == $code['dial_code'] ? 'selected' : '' }}>
                    {{ $code['dial_code'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Mobile *</label>
        <input type="text" name="mobile" class="form-control shadow-sm" value="{{ old('mobile', $profile->mobile ?? '') }}" required="">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Alternate Mobile</label>
        <input type="text" name="alternate_mobile" class="form-control shadow-sm" value="{{ old('alternate_mobile', $profile->alternate_mobile ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control shadow-sm" value="{{ old('email', $profile->email ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Gender *</label>
        <select name="gender" class="form-control shadow-sm" required>
            <option value="">Select</option>
            @foreach(['male','female','other'] as $g)
                <option value="{{ $g }}" {{ old('gender', $profile->gender ?? '') == $g ? 'selected' : '' }}>{{ mb_convert_case($g, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    {{-- ================= BIRTH & PHYSICAL ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-warning shadow-sm">
            <h5 class="fw-bold text-warning mb-0">🎂 Birth & Physical Details</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control shadow-sm" value="{{ old('dob', isset($profile) && $profile->dob ? \Carbon\Carbon::parse($profile->dob)->format('Y-m-d') : '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Time of Birth</label>
        <input type="time" name="tob" class="form-control shadow-sm" value="{{ old('tob', isset($profile) && $profile->tob ? \Carbon\Carbon::parse($profile->tob)->format('H:i') : '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Place of Birth</label>
        <select name="birth_place" id="birth_place" class="form-control shadow-sm">
            <option value="">Select District</option>
            @foreach($Area->unique('area')->sortBy('area') as $code)
                <option value="{{ $code['area'] }}" data-state="{{ $code['state'] }}" {{ old('birth_place', $profile->birth_place ?? '') == $code['area'] ? 'selected' : '' }}>
                    {{ $code['area'] }}
                </option>
            @endforeach
        </select>
    </div>

    @php
        if (!empty($profile->height_cm)) {
            $totalInches = round($profile->height_cm / 2.54);
            $profile->height_feet = intdiv($totalInches, 12);
            $profile->height_inch = $totalInches % 12;
        }
    @endphp
    <div class="col-md-3 mb-3">
        <label class="form-label">Height</label>
        <div class="input-group">
            <select name="height_feet" class="form-control shadow-sm">
                <option value="">Feet</option>
                @for($i=1; $i<=7; $i++)
                    <option value="{{ $i }}" {{ old('height_feet', $profile->height_feet ?? '') == $i ? 'selected' : '' }}>{{ $i }} Feet</option>
                @endfor
            </select>
            <select name="height_inch" class="form-control shadow-sm">
                <option value="">Inch</option>
                @for($i=0; $i<=11; $i++)
                    <option value="{{ $i }}" {{ old('height_inch', $profile->height_inch ?? '') == $i ? 'selected' : '' }}>{{ $i }} Inch</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Weight (kg)</label>
        <input type="number" step="0.1" name="weight_kg" class="form-control shadow-sm" value="{{ old('weight_kg', $profile->weight_kg ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Blood Group</label>
        <select name="blood_group" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg)
                <option value="{{ $bg }}" {{ old('blood_group', $profile->blood_group ?? '') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Complexion</label>
        <select name="complexion" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['very_fair','fair','wheatish','dark'] as $complexion)
                <option value="{{ $complexion }}" {{ old('complexion', $profile->complexion ?? '') == $complexion ? 'selected' : '' }}>{{ mb_convert_case($complexion, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Body Type</label>
        <select name="body_type" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['slim','average','athletic','heavy'] as $body_type)
                <option value="{{ $body_type }}" {{ old('body_type', $profile->body_type ?? '') == $body_type ? 'selected' : '' }}>{{ mb_convert_case($body_type, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Physical Status</label>
        <select name="physical_status" class="form-control shadow-sm">
            @foreach(['normal','physically_challenged'] as $physical_status)
                <option value="{{ $physical_status }}" {{ old('physical_status', $profile->physical_status ?? '') == $physical_status ? 'selected' : '' }}>{{ mb_convert_case($physical_status, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    {{-- ================= MARITAL STATUS ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-danger shadow-sm">
            <h5 class="fw-bold text-danger mb-0">💍 Marital Status</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Marital Status *</label>
        <select name="marital_status" class="form-control shadow-sm" required>
            <option value="">Select</option>
            @foreach(['single','separated','divorced','widowed', 'awaiting_divorce'] as $status)
                <option value="{{ $status }}" {{ old('marital_status', $profile->marital_status ?? '') == $status ? 'selected' : '' }}>{{ mb_convert_case($status, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Children (if any)</label>
        <input type="number" name="children" min="0" class="form-control shadow-sm" value="{{ old('children', $profile->children ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Children Living With</label>
        <select name="children_living_with" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['self','partner','joint'] as $children_living_with)
                <option value="{{ $children_living_with }}" {{ old('children_living_with', $profile->children_living_with ?? '') == $children_living_with ? 'selected' : '' }}>{{ mb_convert_case($children_living_with, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Divorce Details</label>
        <textarea name="divorce_details" class="form-control shadow-sm" rows="1">{{ old('divorce_details', $profile->divorce_details ?? '') }}</textarea>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Widow/Widower Details</label>
        <textarea name="widow_widower_details" class="form-control shadow-sm" rows="1">{{ old('widow_widower_details', $profile->widow_widower_details ?? '') }}</textarea>
    </div>

    {{-- ================= PERSONAL & HOROSCOPE ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-info shadow-sm">
            <h5 class="fw-bold text-info mb-0">🌟 Personal & Horoscope</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Mangal Dosh</label>
        <select name="mangal_dosh" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['yes','no','anshik'] as $dosh)
                <option value="{{ $dosh }}" {{ old('mangal_dosh', $profile->mangal_dosh ?? '') == $dosh ? 'selected' : '' }}>{{ mb_convert_case($dosh, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Nakshatra</label>
        <input type="text" name="nakshatra" class="form-control shadow-sm" value="{{ old('nakshatra', $profile->nakshatra ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Rashi</label>
        <input type="text" name="rashi" class="form-control shadow-sm" value="{{ old('rashi', $profile->rashi ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Charan</label>
        <input type="text" name="charan" class="form-control shadow-sm" value="{{ old('charan', $profile->charan ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Gan</label>
        <input type="text" name="gan" class="form-control shadow-sm" value="{{ old('gan', $profile->gan ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Nadi</label>
        <input type="text" name="nadi" class="form-control shadow-sm" value="{{ old('nadi', $profile->nadi ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Gotra</label>
        <select name="gotra" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach($Gotra->sortBy('gotra') as $gotra)
                <option value="{{ $gotra->gotra }}" {{ old('gotra', $profile->gotra ?? '') == $gotra->gotra ? 'selected' : '' }}>{{ $gotra->gotra }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Diet</label>
        <select name="diet" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['vegetarian','non_vegetarian','eggetarian','vegan','jain'] as $diet)
                <option value="{{ $diet }}" {{ old('diet', $profile->diet ?? '') == $diet ? 'selected' : '' }}>{{ mb_convert_case($diet, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Drinking Habits</label>
        <select name="drinking_habits" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['never','occasionally','regularly'] as $val)
                <option value="{{ $val }}" {{ old('drinking_habits', $profile->drinking_habits ?? '') == $val ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Smoking Habits</label>
        <select name="smoking_habits" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['never','occasionally','regularly'] as $val)
                <option value="{{ $val }}" {{ old('smoking_habits', $profile->smoking_habits ?? '') == $val ? 'selected' : '' }}>{{ $val }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3 d-none">
        <label class="form-label">About Myself</label>
        <textarea name="about_myself" class="form-control shadow-sm" rows="3">{{ old('about_myself', $profile->about_myself ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3 d-none">
        <label class="form-label">Family Values</label>
        <textarea name="family_values" class="form-control shadow-sm" rows="3">{{ old('family_values', $profile->family_values ?? '') }}</textarea>
    </div>

    {{-- ================= EDUCATION & PROFESSION ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-secondary shadow-sm">
            <h5 class="fw-bold text-secondary mb-0">🎓 Education & Profession</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Highest Qualification</label>
        <select name="highest_qualification" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach($Education->sortBy('education') as $code)
                <option value="{{ $code['education'] }}" {{ old('highest_qualification', $profile->highest_qualification ?? '') == $code['education'] ? 'selected' : '' }}>
                    {{ $code['education'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Other Qualification</label>
        <input type="text" name="other_qualification" class="form-control shadow-sm" value="{{ old('other_qualification', $profile->other_qualification ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Institution Name</label>
        <input type="text" name="institution_name" class="form-control shadow-sm" value="{{ old('institution_name', $profile->institution_name ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Occupation</label>
        <select name="occupation" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach($Occupation->sortBy('occupation') as $code)
                <option value="{{ $code['occupation'] }}" {{ old('occupation', $profile->occupation ?? '') == $code['occupation'] ? 'selected' : '' }}>
                    {{ $code['occupation'] }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Designation</label>
        <input type="text" name="designation" class="form-control shadow-sm" value="{{ old('designation', $profile->designation ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Company Name</label>
        <input type="text" name="company_name" class="form-control shadow-sm" value="{{ old('company_name', $profile->company_name ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Industry</label>
        <input type="text" name="industry" class="form-control shadow-sm" value="{{ old('industry', $profile->industry ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Job Type</label>
        <select name="job_type" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['government','private','business','not_working','student'] as $jt)
                <option value="{{ $jt }}" {{ old('job_type', $profile->job_type ?? '') == $jt ? 'selected' : '' }}>{{ mb_convert_case($jt, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Business Type</label>
        <input type="text" name="business_type" class="form-control shadow-sm" value="{{ old('business_type', $profile->business_type ?? '') }}">
    </div> -->

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Annual Income (₹ in lakhs)</label>
        <input type="number" step="0.01" name="annual_income" class="form-control shadow-sm" value="{{ old('annual_income', $profile->annual_income ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Self Income (₹ in lakhs)</label>
        <input type="number" step="0.01" name="self_income" class="form-control shadow-sm" value="{{ old('self_income', $profile->self_income ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Family Income (₹ in lakhs)</label>
        <input type="number" step="0.01" name="family_income" class="form-control shadow-sm" value="{{ old('family_income', $profile->family_income ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Budget (₹ in lakhs)</label>
        <input type="number" step="0.01" name="budget_demand" class="form-control shadow-sm" value="{{ old('budget_demand', $profile->budget_demand ?? '') }}">
    </div>

    <div class="col-md-6 mb-3 d-none">
        <label class="form-label">Property Details</label>
        <textarea name="property_details" class="form-control shadow-sm" rows="2">{{ old('property_details', $profile->property_details ?? '') }}</textarea>
    </div>

    <div class="col-md-6 mb-3 d-none">
        <label class="form-label">Vehicle Details</label>
        <textarea name="vehicle_details" class="form-control shadow-sm" rows="2">{{ old('vehicle_details', $profile->vehicle_details ?? '') }}</textarea>
    </div>

    {{-- ================= RELIGION & COMMUNITY ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-dark shadow-sm">
            <h5 class="fw-bold text-dark mb-0">🕉️ Religion & Community</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Religion</label>
        <select name="religion" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['Hinduism','Islam','Christianity','Sikhism','Buddhism','Jainism','Others'] as $religion)
                <option value="{{ $religion }}" {{ old('religion', $profile->religion ?? '') == $religion ? 'selected' : '' }}>{{ $religion }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Caste</label>
        <select name="caste" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach($Caste->sortBy('caste') as $code)
                <option value="{{ $code['caste'] }}" {{ old('caste', $profile->caste ?? '') == $code['caste'] ? 'selected' : '' }}>{{ $code['caste'] }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Sub Caste</label>
        <input type="text" name="sub_caste" class="form-control shadow-sm" value="{{ old('sub_caste', $profile->sub_caste ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Mother Tongue</label>
        <input type="text" name="mother_tongue" class="form-control shadow-sm" value="{{ old('mother_tongue', $profile->mother_tongue ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Languages Known</label>
        <select name="languages_known[]" class="form-control shadow-sm select2" multiple>
            @php
                $selectedLangs = old('languages_known', $profile->languages_known ?? []);
            @endphp
            @foreach(['Hindi','English','Gujarati','Marathi','Tamil','Telugu','Kannada','Malayalam','Bengali','Punjabi','Urdu','Others'] as $lang)
                <option value="{{ $lang }}" {{ in_array($lang, $selectedLangs) ? 'selected' : '' }}>{{ $lang }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Ethnicity</label>
        <input type="text" name="ethnicity" class="form-control shadow-sm" value="{{ old('ethnicity', $profile->ethnicity ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Community</label>
        <input type="text" name="community" class="form-control shadow-sm" value="{{ old('community', $profile->community ?? '') }}">
    </div>

    {{-- ================= FAMILY BACKGROUND ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-primary shadow-sm">
            <h5 class="fw-bold text-primary mb-0">👨‍👩‍👧 Family Background</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Father First Name</label>
        <input type="text" name="father_first" class="form-control shadow-sm" value="{{ old('father_first', $profile->father_first ?? '') }}">
    </div>
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Father Middle Name</label>
        <input type="text" name="father_middle" class="form-control shadow-sm" value="{{ old('father_middle', $profile->father_middle ?? '') }}">
    </div> -->
    <div class="col-md-3 mb-3">
        <label class="form-label">Father Last Name</label>
        <input type="text" name="father_last" class="form-control shadow-sm" value="{{ old('father_last', $profile->father_last ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Father Occupation</label>
        <select name="father_occupation" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach($Occupation->sortBy('occupation') as $code)
                <option value="{{ $code['occupation'] }}" {{ old('father_occupation', $profile->father_occupation ?? '') == $code['occupation'] ? 'selected' : '' }}>{{ $code['occupation'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Father Alive?</label>
        <select name="father_alive" class="form-control shadow-sm">
            <option value="1" {{ old('father_alive', $profile->father_alive ?? '') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('father_alive', $profile->father_alive ?? '') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Mother First Name</label>
        <input type="text" name="mother_first" class="form-control shadow-sm" value="{{ old('mother_first', $profile->mother_first ?? '') }}">
    </div>
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Mother Middle Name</label>
        <input type="text" name="mother_middle" class="form-control shadow-sm" value="{{ old('mother_middle', $profile->mother_middle ?? '') }}">
    </div> -->
    <div class="col-md-3 mb-3">
        <label class="form-label">Mother Last Name</label>
        <input type="text" name="mother_last" class="form-control shadow-sm" value="{{ old('mother_last', $profile->mother_last ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Mother Occupation</label>
        <select name="mother_occupation" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach($Occupation->sortBy('occupation') as $code)
                <option value="{{ $code['occupation'] }}" {{ old('mother_occupation', $profile->mother_occupation ?? '') == $code['occupation'] ? 'selected' : '' }}>{{ $code['occupation'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Mother Alive?</label>
        <select name="mother_alive" class="form-control shadow-sm">
            <option value="1" {{ old('mother_alive', $profile->mother_alive ?? '') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('mother_alive', $profile->mother_alive ?? '') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Family Type</label>
        <select name="family_type" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['joint','nuclear','extended'] as $ft)
                <option value="{{ $ft }}" {{ old('family_type', $profile->family_type ?? '') == $ft ? 'selected' : '' }}>{{ mb_convert_case($ft, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Family Status</label>
        <select name="family_status" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['lower_middle','middle','upper_middle','rich', 'affluent'] as $fs)
                <option value="{{ $fs }}" {{ old('family_status', $profile->family_status ?? '') == $fs ? 'selected' : '' }}>{{ mb_convert_case($fs, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">No. of Brothers</label>
        <input type="number" name="no_of_brothers" min="0" class="form-control shadow-sm" value="{{ old('no_of_brothers', $profile->no_of_brothers ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">No. of Sisters</label>
        <input type="number" name="no_of_sisters" min="0" class="form-control shadow-sm" value="{{ old('no_of_sisters', $profile->no_of_sisters ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Married Brothers</label>
        <input type="number" name="married_brothers" min="0" class="form-control shadow-sm" value="{{ old('married_brothers', $profile->married_brothers ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Married Sisters</label>
        <input type="number" name="married_sisters" min="0" class="form-control shadow-sm" value="{{ old('married_sisters', $profile->married_sisters ?? '') }}">
    </div>

    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Family Location</label>
        <input type="text" name="family_location" class="form-control shadow-sm" value="{{ old('family_location', $profile->family_location ?? '') }}">
    </div>

    {{-- ================= ADDRESS ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-success shadow-sm">
            <h5 class="fw-bold text-success mb-0">🏠 Address</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">House No</label>
        <input type="text" name="house_no" class="form-control shadow-sm" value="{{ old('house_no', $profile->house_no ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Colony/Road</label>
        <input type="text" name="colony" class="form-control shadow-sm" value="{{ old('colony', $profile->colony ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Street</label>
        <input type="text" name="street" class="form-control shadow-sm" value="{{ old('street', $profile->street ?? '') }}">
    </div>
    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Landmark</label>
        <input type="text" name="landmark" class="form-control shadow-sm" value="{{ old('landmark', $profile->landmark ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Pincode</label>
        <input type="text" name="pincode" class="form-control shadow-sm" value="{{ old('pincode', $profile->pincode ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">City</label>
        <input type="text" name="city" class="form-control shadow-sm" value="{{ old('city', $profile->city ?? '') }}">
    </div>
    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Taluka</label>
        <input type="text" name="taluka" class="form-control shadow-sm" value="{{ old('taluka', $profile->taluka ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">District</label>
        <select name="district" id="district" class="form-control shadow-sm">
            <option value="">Select District</option>
            @foreach($Area->unique('area')->sortBy('area') as $code)
                <option value="{{ $code['area'] }}" data-state="{{ $code['state'] }}" {{ old('district', $profile->district ?? '') == $code['area'] ? 'selected' : '' }}>{{ $code['area'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">State</label>
        <select name="state" id="state" class="form-control shadow-sm">
            <option value="">Select State</option>
            @foreach($Area->unique('state')->sortBy('state') as $code)
                <option value="{{ $code['state'] }}" {{ old('state', $profile->state ?? '') == $code['state'] ? 'selected' : '' }}>{{ $code['state'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Country *</label>
        <select name="country" class="form-control shadow-sm" required>
            <option value="">Select</option>
            @foreach($CountryCode->sortBy('country_name') as $code)
                <option value="{{ $code['country_name'] }}" {{ old('country', $profile->country ?? 'India') == $code['country_name'] ? 'selected' : '' }}>{{ $code['country_name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Current Address</label>
        <textarea name="current_address" class="form-control shadow-sm" rows="2">{{ old('current_address', $profile->current_address ?? '') }}</textarea>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Permanent Address</label>
        <textarea name="permanent_address" class="form-control shadow-sm" rows="2">{{ old('permanent_address', $profile->permanent_address ?? '') }}</textarea>
    </div>
    <div class="col-md-3 mb-3 d-none">
        <label class="form-label">Native Place</label>
        <input type="text" name="native_place" class="form-control shadow-sm" value="{{ old('native_place', $profile->native_place ?? '') }}">
    </div>

    {{-- ================= PARTNER PREFERENCES ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-warning shadow-sm">
            <h5 class="fw-bold text-warning mb-0">💑 Partner Preferences</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Caste Barrier</label>
        <select name="caste_barrier" class="form-control shadow-sm">
            <option value="1" {{ old('caste_barrier', $profile->caste_barrier ?? '') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('caste_barrier', $profile->caste_barrier ?? '') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Min Age</label>
        <input type="number" name="partner_min_age" class="form-control shadow-sm" value="{{ old('partner_min_age', $profile->partner_min_age ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Max Age</label>
        <input type="number" name="partner_max_age" class="form-control shadow-sm" value="{{ old('partner_max_age', $profile->partner_max_age ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Min Height (cm)</label>
        <input type="number" step="0.1" name="partner_min_height" class="form-control shadow-sm" value="{{ old('partner_min_height', $profile->partner_min_height ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Max Height (cm)</label>
        <input type="number" step="0.1" name="partner_max_height" class="form-control shadow-sm" value="{{ old('partner_max_height', $profile->partner_max_height ?? '') }}">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Religion</label>
        <input type="text" name="partner_religion" class="form-control shadow-sm" value="{{ old('partner_religion', $profile->partner_religion ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Caste</label>
        <input type="text" name="partner_caste" class="form-control shadow-sm" value="{{ old('partner_caste', $profile->partner_caste ?? '') }}">
    </div>
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Sub Caste</label>
        <input type="text" name="partner_sub_caste" class="form-control shadow-sm" value="{{ old('partner_sub_caste', $profile->partner_sub_caste ?? '') }}">
    </div> -->
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Qualification</label>
        <input type="text" name="partner_qualification" class="form-control shadow-sm" value="{{ old('partner_qualification', $profile->partner_qualification ?? '') }}">
    </div> -->
    <div class="col-md-3 mb-3">
        <label class="form-label">Occupation</label>
        <select name="partner_occupation" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach($Occupation->sortBy('occupation') as $code)
                <option value="{{ $code['occupation'] }}" {{ old('occupation', $profile->occupation ?? '') == $code['occupation'] ? 'selected' : '' }}>
                    {{ $code['occupation'] }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Income (₹ in lakhs)</label>
        <input type="number" step="0.01" name="partner_income" class="form-control shadow-sm" value="{{ old('partner_income', $profile->partner_income ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Budget/Demand (₹ in lakhs)</label>
        <input type="number" step="0.01" name="partner_budget_demand" class="form-control shadow-sm" value="{{ old('partner_budget_demand', $profile->partner_budget_demand ?? '') }}">
    </div>
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Country</label>
        <input type="text" name="partner_country" class="form-control shadow-sm" value="{{ old('partner_country', $profile->partner_country ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">State</label>
        <input type="text" name="partner_state" class="form-control shadow-sm" value="{{ old('partner_state', $profile->partner_state ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">City</label>
        <input type="text" name="partner_city" class="form-control shadow-sm" value="{{ old('partner_city', $profile->partner_city ?? '') }}">
    </div> -->
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Location</label>
        <input type="text" name="partner_location" class="form-control shadow-sm" value="{{ old('partner_location', $profile->partner_location ?? '') }}">
    </div> -->
    <div class="col-md-3 mb-3">
        <label class="form-label">Marital Status</label>
        <select name="partner_marital_status" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['single','separated','divorced','widowed', 'awaiting_divorce'] as $status)
                <option value="{{ $status }}" {{ old('partner_marital_status', $profile->partner_marital_status ?? '') == $status ? 'selected' : '' }}>{{ mb_convert_case(str_replace('_', ' ', $status), MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Mangal Dosh</label>
        <select name="partner_mangal_dosh" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['yes','no','anshik'] as $dosh)
                <option value="{{ $dosh }}" {{ old('partner_mangal_dosh', $profile->partner_mangal_dosh ?? '') == $dosh ? 'selected' : '' }}>{{ $dosh }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Diet</label>
        <select name="partner_diet" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['vegetarian','non_vegetarian','eggetarian','vegan','jain'] as $diet)
                <option value="{{ $diet }}" {{ old('partner_diet', $profile->partner_diet ?? '') == $diet ? 'selected' : '' }}>{{ mb_convert_case($diet, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Complexion</label>
        <select name="partner_complexion" class="form-control shadow-sm">
            <option value="">Select</option>
            @foreach(['very_fair','fair','wheatish','dark'] as $complexion)
                <option value="{{ $complexion }}" {{ old('partner_complexion', $profile->partner_complexion ?? '') == $complexion ? 'selected' : '' }}>{{ mb_convert_case($complexion, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div> -->
    <div class="col-md-3 mb-3">
        <label class="form-label">Physical Status</label>
        <select name="partner_physical_status" class="form-control shadow-sm">
            @foreach(['normal','physically_challenged'] as $physical_status)
                <option value="{{ $physical_status }}" {{ old('partner_physical_status', $profile->partner_physical_status ?? '') == $physical_status ? 'selected' : '' }}>{{ mb_convert_case($physical_status, MB_CASE_TITLE, 'UTF-8') }}</option>
            @endforeach
        </select>
    </div>
    <!-- <div class="col-md-3 mb-3">
        <label class="form-label">Family Background</label>
        <input type="text" name="partner_family_background" class="form-control shadow-sm" value="{{ old('partner_family_background', $profile->partner_family_background ?? '') }}">
    </div> -->
    <!-- <div class="col-md-6 mb-3">
        <label class="form-label">Partner Description</label>
        <textarea name="partner_description" class="form-control shadow-sm" rows="3">{{ old('partner_description', $profile->partner_description ?? '') }}</textarea>
    </div> -->

    <div class="col-md-3 mb-3">
        <label class="form-label">Horoscope Required?</label>
        <select name="horoscope" class="form-control shadow-sm">
            <option value="1" {{ old('horoscope', $profile->horoscope ?? '') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('horoscope', $profile->horoscope ?? '') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Area Preference</label>
        <select name="area_preference[]" id="area_preference" class="form-control shadow-sm select2" multiple>
            @php
                $selectedAreas = old('area_preference', $profile->area_preference ?? []);
            @endphp
            @foreach($Area->unique('state')->sortBy('state') as $code)
                <option value="{{ $code['state'] }}" {{ in_array($code['state'], $selectedAreas) ? 'selected' : '' }}>{{ $code['state'] }}</option>
            @endforeach
        </select>
    </div>

    <!-- <div class="col-md-6 mb-3">
        <label class="form-label">Other Preferences</label>
        <textarea name="other_preferences" class="form-control shadow-sm" rows="3">{{ old('other_preferences', $profile->other_preferences ?? '') }}</textarea>
    </div> -->

    {{-- ================= ADDITIONAL DETAILS ================= --}}
    <!-- <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-info shadow-sm">
            <h5 class="fw-bold text-info mb-0">📋 Additional Details</h5>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Expectations from Partner</label>
        <textarea name="expectations_from_partner" class="form-control shadow-sm" rows="3">{{ old('expectations_from_partner', $profile->expectations_from_partner ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">About Family</label>
        <textarea name="about_family" class="form-control shadow-sm" rows="3">{{ old('about_family', $profile->about_family ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Hobbies & Interests</label>
        <textarea name="hobbies_interests" class="form-control shadow-sm" rows="3">{{ old('hobbies_interests', $profile->hobbies_interests ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Career Ambitions</label>
        <textarea name="career_ambitions" class="form-control shadow-sm" rows="3">{{ old('career_ambitions', $profile->career_ambitions ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Religious Beliefs</label>
        <textarea name="religious_beliefs" class="form-control shadow-sm" rows="3">{{ old('religious_beliefs', $profile->religious_beliefs ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Lifestyle</label>
        <textarea name="lifestyle" class="form-control shadow-sm" rows="3">{{ old('lifestyle', $profile->lifestyle ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Personality Traits</label>
        <textarea name="personality_traits" class="form-control shadow-sm" rows="3">{{ old('personality_traits', $profile->personality_traits ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Health Information</label>
        <textarea name="health_information" class="form-control shadow-sm" rows="3">{{ old('health_information', $profile->health_information ?? '') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Education Details (JSON)</label>
        <textarea name="education_details" class="form-control shadow-sm" rows="3" placeholder='[{"degree":"B.Tech","year":2020}]'>{{ old('education_details', is_array($profile->education_details ?? null) ? json_encode($profile->education_details) : ($profile->education_details ?? '')) }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Work Experience (JSON)</label>
        <textarea name="work_experience" class="form-control shadow-sm" rows="3" placeholder='[{"company":"ABC","years":2}]'>{{ old('work_experience', is_array($profile->work_experience ?? null) ? json_encode($profile->work_experience) : ($profile->work_experience ?? '')) }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Skills (JSON array)</label>
        <textarea name="skills" class="form-control shadow-sm" rows="3" placeholder='["PHP","Laravel"]'>{{ old('skills', is_array($profile->skills ?? null) ? json_encode($profile->skills) : ($profile->skills ?? '')) }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Achievements (JSON array)</label>
        <textarea name="achievements" class="form-control shadow-sm" rows="3" placeholder='["Award1","Award2"]'>{{ old('achievements', is_array($profile->achievements ?? null) ? json_encode($profile->achievements) : ($profile->achievements ?? '')) }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Travel History (JSON array)</label>
        <textarea name="travel_history" class="form-control shadow-sm" rows="3" placeholder='["USA","UK"]'>{{ old('travel_history', is_array($profile->travel_history ?? null) ? json_encode($profile->travel_history) : ($profile->travel_history ?? '')) }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Settlement Plans</label>
        <textarea name="settlement_plans" class="form-control shadow-sm" rows="3">{{ old('settlement_plans', $profile->settlement_plans ?? '') }}</textarea>
    </div> -->

    {{-- ================= CONTACT PREFERENCES ================= --}}
    <!-- <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-secondary shadow-sm">
            <h5 class="fw-bold text-secondary mb-0">📞 Contact Preferences</h5>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Contact Preference</label>
        <select name="contact_preference[]" class="form-control shadow-sm select2" multiple>
            @php
                $selectedContactPref = old('contact_preference', $profile->contact_preference ?? []);
            @endphp
            @foreach(['Phone','Email','Chat','In Person'] as $pref)
                <option value="{{ $pref }}" {{ in_array($pref, $selectedContactPref) ? 'selected' : '' }}>{{ $pref }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Contact Timings</label>
        <input type="text" name="contact_timings" class="form-control shadow-sm" value="{{ old('contact_timings', $profile->contact_timings ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Contact Through</label>
        <input type="text" name="contact_through" class="form-control shadow-sm" value="{{ old('contact_through', $profile->contact_through ?? '') }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Allow Direct Contact?</label>
        <select name="allow_direct_contact" class="form-control shadow-sm">
            <option value="1" {{ old('allow_direct_contact', $profile->allow_direct_contact ?? '') == '1' ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('allow_direct_contact', $profile->allow_direct_contact ?? '') == '0' ? 'selected' : '' }}>No</option>
        </select>
    </div> -->

    {{-- ================= MEDIA ================= --}}
    <div class="col-12 mt-4 mb-3">
        <div class="p-3 rounded-3 bg-light border-start border-4 border-primary shadow-sm">
            <h5 class="fw-bold text-primary mb-0">📸 Media Uploads</h5>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Profile Photo</label>
        <input type="file" name="profile_photo" class="form-control shadow-sm" accept="image/*">
        @if(isset($profile) && $profile->profile_photo)
            <div class="mt-2">
                <img src="{{ asset('storage/profiles/'.$profile->profile_photo) }}" width="100" class="rounded">
            </div>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Horoscope Image</label>
        <input type="file" name="horoscope_image" class="form-control shadow-sm" accept="image/*">
        @if(isset($profile) && $profile->horoscope_image)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$profile->horoscope_image) }}" width="100" class="rounded">
            </div>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Family Images (multiple)</label>
        <input type="file" name="family_images[]" class="form-control shadow-sm" accept="image/*" multiple>
        @if(isset($profile) && $profile->family_images)
            <div class="mt-2 d-flex flex-wrap gap-2">
                @foreach($profile->family_images as $img)
                    <img src="{{ asset('storage/'.$img) }}" width="100" class="rounded">
                @endforeach
            </div>
        @endif
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Video Profile</label>
        <input type="file" name="video_profile" class="form-control shadow-sm" accept="video/*">
        @if(isset($profile) && $profile->video_profile)
            <div class="mt-2">
                <video width="150" controls><source src="{{ asset('storage/'.$profile->video_profile) }}"></video>
            </div>
        @endif
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Self Images (Max 10)</label>
        <div id="myDropzone" class="dropzone border rounded p-3 bg-white shadow-sm"></div>
        <div id="uploadedImages"></div>
        @if(isset($profile) && $profile->self_images)
            <div class="mt-3 d-flex flex-wrap gap-2">
                @foreach($profile->self_images as $img)
                    <img src="{{ asset('storage/'.$img) }}" class="rounded" width="100" height="100" style="object-fit:cover;">
                @endforeach
            </div>
        @endif
    </div>

    {{-- Hidden fields for system use if needed --}}
    <input type="hidden" name="user_id" value="{{ old('user_id', $profile->user_id ?? '') }}">
    <input type="hidden" name="profile_id" value="{{ old('profile_id', $profile->profile_id ?? '') }}">
    <input type="hidden" name="profile_completion" value="{{ old('profile_completion', $profile->profile_completion ?? '') }}">
    <input type="hidden" name="is_verified" value="{{ old('is_verified', $profile->is_verified ?? '') }}">
    <input type="hidden" name="is_premium" value="{{ old('is_premium', $profile->is_premium ?? '') }}">
    <input type="hidden" name="is_active" value="{{ old('is_active', $profile->is_active ?? '1') }}">
    {{-- etc. --}}

    <div class="col-12 mt-4">
        <button type="submit" class="btn btn-primary">Save Profile</button>
    </div>
</div>

<style>
    .form-label { font-weight: 600; }
    .border-start { border-radius: 0.5rem !important; }
</style>

<script>
$(document).ready(function () {
    // Initialize Select2
    $('.select2').select2({ width: '100%' });

    function filterDistricts() {
        let state = $('#state').val();
        $('#district option').each(function () {
            let optionState = $(this).data('state');
            if (!state || !optionState || optionState === state) {
                $(this).prop('disabled', false);
            } else {
                $(this).prop('disabled', true);
            }
        });
        $('#district').val(null).trigger('change');
    }

    $('#state').on('change', function () {
        filterDistricts();
    });

    filterDistricts();
});

Dropzone.autoDiscover = false;

var uploadedImages = 0;
var dz = new Dropzone("#myDropzone", {
    url: "{{ route('admin.profiles.upload-image') }}",
    maxFilesize: 5, // 5 MB
    maxFiles: 10,
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    success: function (file, response) {
        uploadedImages++;
        let input = `<input type="hidden" name="self_images[]" value="${response.file}">`;
        document.getElementById('uploadedImages').insertAdjacentHTML('beforeend', input);
        file.serverFilename = response.file;
    },
    removedfile: function (file) {
        uploadedImages--;
        if (file.serverFilename) {
            document.querySelector(`input[value="${file.serverFilename}"]`)?.remove();
        }
        file.previewElement.remove();
    }
});
</script>