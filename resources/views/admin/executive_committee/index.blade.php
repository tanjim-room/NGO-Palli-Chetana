@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">All Executive Committee Members</h6>
            <a href="{{ route('executive.add') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Add Member
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-danger">
                        {{ session()->get('update') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Photo</th>
                                <th>Order</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">{{ $item->designation }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/executive_committee/'.$item->photo) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">{{ $item->order }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('executive.edit',$item->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="{{ route('executive.delete',$item->id) }}" class="btn btn-sm btn-danger text-white text-center" data-confirm="Are you sure you want to delete this committee member?">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
