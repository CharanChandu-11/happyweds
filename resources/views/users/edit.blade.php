@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<div class="container" style="max-width: 650px;">

    <div class="card shadow-lg border-0 rounded-4">

        <div class="card-header bg-light text-base rounded-top d-flex align-items-center">
            <i class="bi bi-pencil-square me-2 fs-4"></i>
            <h4 class="mb-0">Edit User</h4>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-base text-white">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input class="form-control form-control-lg rounded-end"
                               name="name"
                               value="{{ $user->name }}"
                               placeholder="Enter name" required>
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
                               type="email"
                               name="email"
                               value="{{ $user->email }}"
                               placeholder="Enter email" required>
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
                            @foreach($roles as $id => $r)
                                <option value="{{ $id }}"
                                    {{ $user->hasRole($r) ? 'selected' : '' }}>
                                    {{ $r }}
                                </option>
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
                        <i class="bi bi-check2-circle me-1"></i> Update User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection
