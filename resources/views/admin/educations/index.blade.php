@extends('layouts.app')
@section('title','Education Master')

@section('content')
<div class="container-fluid">

<div class="card shadow rounded-4">
    <div class="card-header fw-bold bg-light">
        🎓 Education Master
    </div>

    <div class="card-body">

        {{-- ADD --}}
        <form method="POST" action="{{ route('admin.educations.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-9">
                    <input type="text" name="education" class="form-control" placeholder="Education Name" required>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">Add</button>
                </div>
            </div>
        </form>

        {{-- LIST --}}
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Education</th>
                    <th>Status</th>
                    <th width="140">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->education }}</td>
                    <td>
                        <span class="badge {{ $row->status ? 'bg-success':'bg-danger' }}">
                            {{ $row->status ? 'Active':'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.educations.destroy',$row->id) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

</div>
@endsection