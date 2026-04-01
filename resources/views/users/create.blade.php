@extends('layouts.app')
@section('title', 'Create New User')
@section('content')
<div class="container" style="max-width: 650px;">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-light text-base rounded-top d-flex align-items-center">
            <i class="bi bi-person-plus-fill me-2 fs-4"></i>
            <h4 class="mb-0">Create New User</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-base text-white">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input class="form-control form-control-lg rounded-end"
                               name="name" placeholder="Enter full name" required>
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-base text-white">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input class="form-control form-control-lg rounded-end"
                               name="email" type="email" placeholder="Enter email" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-base text-white">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input class="form-control form-control-lg rounded-end"
                               name="password" type="password" placeholder="Enter password" required>
                    </div>
                </div>

                <!-- Role -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Select Role</label>
                    <div class="input-group">
                        <span class="input-group-text bg-base text-white">
                            <i class="bi bi-shield-lock-fill"></i>
                        </span>

                        <select name="role_id"
                                class="form-control form-control-lg rounded-end" required>
                            @foreach($roles as $id=>$r)
                                <option value="{{ $id }}">{{ $r }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">

                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-base btn-lg px-4">
                        <i class="bi bi-arrow-left-circle"></i> Back
                    </a>

                    <button type="submit" class="btn btn-base btn-lg px-5">
                        <i class="bi bi-check-circle-fill me-1"></i> Save User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection
