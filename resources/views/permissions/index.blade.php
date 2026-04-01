@extends('layouts.app')
@section('title', 'Permissions')
@section('content')
<div class="container">

    {{-- Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-light mb-0">
            <i class="bi bi-shield-lock-fill me-2"></i> Permissions
        </h3>

        <a href="{{ route('admin.permissions.create') }}" class="btn btn-light shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Add Permission
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Table Card --}}
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">

            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="fw-semibold ps-3">Permission</th>
                        <th width="120" class="text-center fw-semibold">Actions</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($permissions as $type => $group)

                    {{-- Type Group Header --}}
                    <tr class="table-secondary">
                        <td colspan="2" class="fw-bold text-uppercase ps-3">
                            <i class="bi bi-tag-fill me-1"></i>
                            {{ $type ?? 'NO TYPE' }}
                        </td>
                    </tr>

                    {{-- Permission Rows --}}
                    @foreach($group as $perm)
                        <tr>
                            <td class="ps-4">
                                <i class="bi bi-key-fill text-primary me-1"></i>
                                <span class="fw-semibold">{{ $perm->name }}</span>
                            </td>

                            <td class="text-center">
                                <form action="{{ route('admin.permissions.destroy', $perm->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm shadow-sm"
                                            onclick="return confirm('Delete this permission?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                @endforeach

                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
