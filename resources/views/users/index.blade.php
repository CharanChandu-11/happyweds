@extends('layouts.app')
@section('title', 'User Management')
@section('content')
<div class="container-fluid">

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-light text-base d-flex justify-content-between align-items-center rounded-top">
            <h4 class="mb-0"><i class="bi bi-people-fill me-2"></i>User Management</h4>
            <a href="{{ route('admin.users.create') }}" class="btn btn-base btn-sm fw-bold">
                <i class="bi bi-person-plus-fill me-1"></i>Add User
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover table-borderless align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="py-3 px-4">User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $u)
                    <tr class="table-row-hover">
                        <td class="py-3 px-4">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-base text-white d-flex justify-content-center align-items-center me-3" 
                                     style="width: 40px; height: 40px; font-weight: bold;">
                                     {{ strtoupper(substr($u->name, 0, 1)) }}
                                </div>
                                <span class="fw-semibold">{{ $u->name }}</span>
                            </div>
                        </td>

                        <td>{{ $u->email }}</td>

                        <td>
                            @if ($u->roles->first())
                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    <i class="bi bi-shield-lock-fill me-1"></i>
                                    {{ $u->roles->pluck('name')->first() }}
                                </span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-3 py-2">No Role</span>
                            @endif
                        </td>

                        <td class="text-center">
                            <a href="{{ route('admin.users.edit', $u) }}" 
                               class="btn btn-warning btn-sm rounded-pill px-3 me-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('admin.users.destroy', $u) }}" 
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Delete this user?')" 
                                        class="btn btn-danger btn-sm rounded-pill px-3">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer bg-white py-3">
            {{ $users->links() }}
        </div>
    </div>

</div>

<style>
.table-row-hover:hover {
    background: #f1f7ff !important;
    transition: 0.2s;
}
</style>
@endsection
