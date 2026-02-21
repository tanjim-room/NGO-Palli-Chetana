@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">All Origin and Legal Affilation</h6>
            <a href="{{ route('origin.legal_affilation.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Add Affilation
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($file as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        {{ Str::limit($value->name, 30, '...') }}
                                    </td>
                                    <td>
                                        {{ $value->file }}
                                    </td>
                                    <td>
                                        <a href="{{ route('origin.legal_affilation.edit',$value->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a href="{{ route('origin.legal_affilation.delete',$value->id) }}" class="btn btn-sm btn-danger text-white text-center" data-confirm="Are you sure you want to delete this legal affiliation?">
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
