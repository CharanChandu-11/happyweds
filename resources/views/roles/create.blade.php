@extends('layouts.app')
@section('title', 'Create New Role')
@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-light mb-0">
            <i class="bi bi-shield-plus me-2"></i> Create New Role
        </h3>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-light shadow-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf

                {{-- Role Name --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="bi bi-fonts me-1"></i> Role Name
                    </label>
                    <input type="text" name="name" class="form-control form-control-lg shadow-sm"
                           placeholder="Enter role name">
                </div>

                {{-- Permissions --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold d-block mb-2">
                        <i class="bi bi-toggle-on me-1"></i> Assign Permissions
                    </label>
                
                    <div class="row g-3">
                        @foreach($permissions as $perm)
                            <div class="col-md-3">
                                <div class="border rounded p-2 shadow-sm d-flex justify-content-between align-items-center bg-light">
                
                                    <span class="fw-semibold">{{ $perm->name }}</span>
                
                                    <div class="form-check form-switch">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               name="permissions[]"
                                               value="{{ $perm->name }}"
                                               id="perm_{{ $perm->id }}">
                                    </div>
                
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>


                {{-- Buttons --}}
                <div class="mt-4">
                    <button class="btn btn-primary px-4 py-2 shadow-sm">
                        <i class="bi bi-save me-1"></i> Save Role
                    </button>

                    <a href="{{ route('admin.roles.index') }}"
                       class="btn btn-light border px-4 py-2 shadow-sm">
                        <i class="bi bi-x-circle me-1"></i> Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
