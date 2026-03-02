@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Executive Committee Member</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('executive.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $data->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{ $data->designation }}">
                            @error('designation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $data->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $data->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ $data->gender == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="profession" class="form-label">Profession</label>
                            <input type="text" name="profession" class="form-control" id="profession" value="{{ $data->profession }}">
                        </div>
                        <div class="col-md-4">
                            <label for="duration_of_involvement" class="form-label">Duration of Involvement</label>
                            <input type="text" name="duration_of_involvement" class="form-control" id="duration_of_involvement" value="{{ $data->duration_of_involvement }}">
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Photo (Optional)</label>
                            <input type="file" name="photo" class="form-control" id="img">
                            <small class="text-muted">If no photo is uploaded, a default avatar will be shown.</small>
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Current Photo:</label><br>
                            @if($data->photo)
                                <img src="{{ asset('images/executive_committee/'.$data->photo) }}" alt="" width="100">
                            @else
                                <span class="text-muted">No photo (default avatar will be used)</span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="bio" class="form-label">Bio (Optional)</label>
                            <textarea id="bio" name="bio" class="form-control" rows="3">{{ $data->bio }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="facebook" class="form-label">Facebook URL (Optional)</label>
                            <input type="url" name="facebook" class="form-control" id="facebook" value="{{ $data->facebook }}" placeholder="https://facebook.com/username">
                        </div>
                        <div class="col-md-6">
                            <label for="twitter" class="form-label">Twitter URL (Optional)</label>
                            <input type="url" name="twitter" class="form-control" id="twitter" value="{{ $data->twitter }}" placeholder="https://twitter.com/username">
                        </div>
                        <div class="col-md-6">
                            <label for="instagram" class="form-label">Instagram URL (Optional)</label>
                            <input type="url" name="instagram" class="form-control" id="instagram" value="{{ $data->instagram }}" placeholder="https://instagram.com/username">
                        </div>
                        <div class="col-md-6">
                            <label for="youtube" class="form-label">YouTube URL (Optional)</label>
                            <input type="url" name="youtube" class="form-control" id="youtube" value="{{ $data->youtube }}" placeholder="https://youtube.com/channel/...">
                        </div>
                        <div class="col-md-12">
                            <label for="order" class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="{{ $data->order }}">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
