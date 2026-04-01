@extends('layouts.app')
@section('title','Gotra Master')

@section('content')
<div class="container-fluid">

<div class="card shadow rounded-4">
    <div class="card-header bg-light fw-bold">
        🧬 Gotra Master
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.gotras.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-9">
                    <input type="text" name="gotra" class="form-control" placeholder="Gotra Name" required>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100">Add</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Gotra</th>
                    <th>Status</th>
                    <th width="140">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->gotra }}</td>
                    <td>
                        <span class="badge {{ $row->status ? 'bg-success':'bg-danger' }}">
                            {{ $row->status ? 'Active':'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.gotras.destroy',$row->id) }}">
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