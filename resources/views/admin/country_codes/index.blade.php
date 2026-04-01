@extends('layouts.app')
@section('title','Country Code Master')

@section('content')
<div class="container-fluid">

<div class="card shadow rounded-4">
    <div class="card-header bg-light fw-bold">
        🌍 Country Code Master
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.country-codes.store') }}">
            @csrf
            <div class="row mb-3">
                <div class="col-md-3">
                    <input type="text" name="country_name" class="form-control" placeholder="Country Name" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="country_code" class="form-control" placeholder="ISO Code" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="dial_code" class="form-control" placeholder="Dial Code" required>
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
                    <th>Country</th>
                    <th>ISO</th>
                    <th>Dial</th>
                    <th>Status</th>
                    <th width="140">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->country_name }}</td>
                    <td>{{ $row->country_code }}</td>
                    <td>{{ $row->dial_code }}</td>
                    <td>
                        <span class="badge {{ $row->status ? 'bg-success':'bg-danger' }}">
                            {{ $row->status ? 'Active':'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.country-codes.destroy',$row->id) }}">
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