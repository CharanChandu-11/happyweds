@extends('layouts.app')
@section('title', 'Roles Management')
@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-light mb-0">
            <i class="bi bi-shield-lock me-2"></i> Roles Management
        </h3>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Add Role
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="py-3">Role Name</th>
                        <th class="py-3">Permissions</th>
                        <th class="py-3 text-center" width="150">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role)
                    <tr class="align-middle">
                        <td class="fw-semibold">{{ $role->name }}</td>

                        <td>
                            @forelse($role->permissions as $perm)
                                <span class="badge rounded-pill bg-info text-dark me-1 mb-1 shadow-sm">
                                    <i class="bi bi-check2-circle me-1"></i> {{ $perm->name }}
                                </span>
                            @empty
                                <span class="badge bg-secondary">No Permissions</span>
                            @endforelse
                        </td>

                        <td class="text-center">

                            <a href="{{ route('admin.roles.edit', $role->id) }}"
                               class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('admin.roles.destroy',$role->id) }}" 
                                  method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3"
                                        onclick="return confirm('Delete this role?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-muted">
                            <i class="bi bi-info-circle"></i> No roles found
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $roles->links() }}
    </div>

</div>
@endsection
