@extends('layouts.app')
@section('title', 'Profiles List')

@section('content')
<div class="container mt-4">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-light">
            <i class="bi bi-people-fill me-2"></i>Profiles List
        </h3>

        <a href="{{ route('admin.profiles.create') }}" class="btn btn-light shadow-sm px-4 py-2">
            <i class="bi bi-plus-circle me-1"></i> Add New Profile
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        </div>
    @endif
    
    <div class="card shadow-sm border-0 mb-4">
    
        <div class="card-body">
    
            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
    
            {{-- ERROR MESSAGE --}}
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Please fix the errors below.
                </div>
            @endif
    
            <div class="row g-4">
    
                {{-- IMPORT SECTION --}}
                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100 bg-base-soft">
    
                        <h6 class="fw-bold text-base mb-3">
                            <i class="bi bi-upload me-1"></i> Import Profiles
                        </h6>
    
                        <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Choose File</label>
                                <input type="file" name="file" class="form-control" required>
                                <small class="text-muted">
                                    Allowed: <b>.xlsx</b>, <b>.csv</b>
                                </small>
                            </div>
    
                            <button type="submit" class="btn btn-base w-100 shadow-sm">
                                <i class="bi bi-file-earmark-arrow-up me-1"></i>
                                Import Now
                            </button>
                        </form>
    
                    </div>
                </div>
    
                {{-- EXPORT SECTION --}}
                <div class="col-md-6">
                    <div class="border rounded-3 p-4 h-100">
    
                        <h6 class="fw-bold text-base mb-3">
                            <i class="bi bi-download me-1"></i> Export Profiles
                        </h6>
    
                        <p class="text-muted small mb-3">
                            Download all profiles in Excel format for offline use or backup.
                        </p>
    
                        <a href="{{ route('admin.export') }}"
                           class="btn btn-outline-success w-100 shadow-sm">
                            <i class="bi bi-file-earmark-excel me-1"></i>
                            Export to Excel
                        </a>
    
                    </div>
                </div>
    
            </div>
    
        </div>
    </div>

    <!-- FILTER SECTION -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            
            <form method="GET" action="{{ route('admin.profiles.index') }}">
                <div class="row g-3">

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="First / Last name"
                               value="{{ request('name') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Mobile</label>
                        <input type="text" name="mobile" class="form-control"
                               placeholder="Mobile number"
                               value="{{ request('mobile') }}">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">All</option>
                            <option value="Male" {{ request('gender')=='Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ request('gender')=='Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Marital Status</label>
                        <select name="marital_status" class="form-select">
                            <option value="">All</option>
                            <option value="Single" {{ request('marital_status')=='Single' ? 'selected' : '' }}>Single</option>
                            <option value="Married" {{ request('marital_status')=='Married' ? 'selected' : '' }}>Married</option>
                            <option value="Divorced" {{ request('marital_status')=='Divorced' ? 'selected' : '' }}>Divorced</option>
                            <option value="Widowed" {{ request('marital_status')=='Widowed' ? 'selected' : '' }}>Widowed</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Caste</label>
                        <input type="text" name="caste" class="form-control"
                               placeholder="Caste"
                               value="{{ request('caste') }}">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label fw-semibold">Birth Place</label>
                        <input type="text" name="birth_place" class="form-control"
                               value="{{ request('birth_place') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">DOB From</label>
                        <input type="date" name="dob_from" class="form-control"
                               value="{{ request('dob_from') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">DOB To</label>
                        <input type="date" name="dob_to" class="form-control"
                               value="{{ request('dob_to') }}">
                    </div>

                    <div class="col-md-12 text-end mt-2">
                        <button class="btn btn-base shadow-sm px-4">
                            <i class="bi bi-search me-1"></i> Search
                        </button>

                        <a href="{{ route('admin.profiles.index') }}"
                           class="btn btn-secondary px-4 ms-2">
                            Reset
                        </a>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- LIST TABLE -->
    <div class="card shadow border-0 rounded-3">
        <div class="card-header bg-light text-base fw-semibold">
            <i class="bi bi-list-ul me-2"></i>All Profiles
        </div>

        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Marital Status</th>
                        <th class="text-center" width="20%">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($profiles as $profile)
                        <tr>
                            <td class="fw-bold text-base">{{ $profile->id }}</td>

                            <td>
                                <div class="fw-semibold text-dark">
                                    {{ trim($profile->first_name.' '.$profile->middle_name.' '.$profile->last_name) }}
                                </div>
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i>
                                    {{ $profile->birth_place ?? '—' }}
                                </small>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $profile->country_code }} {{ $profile->mobile }}
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-base-soft text-base px-3 py-2">
                                    {{ $profile->gender ?? '—' }}
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-secondary px-3 py-2 text-white">
                                    {{ $profile->marital_status ?? '—' }}
                                </span>
                            </td>

                            <td class="text-center">

                                <a href="{{ route('admin.profiles.show', $profile->id) }}"
                                   class="btn btn-outline-success btn-sm me-1">
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <a href="{{ route('admin.profiles.edit', $profile->id) }}"
                                   class="btn btn-outline-primary btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('admin.profiles.destroy', $profile->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this profile?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-3"></i>
                                <p class="mb-0">No profiles found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $profiles->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
