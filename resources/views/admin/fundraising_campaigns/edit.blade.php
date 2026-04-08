@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Fundraising Campaign</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('fundraising_campaigns.update', $campaign->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Campaign Title<span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $campaign->title) }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control js-richtext @error('description') is-invalid @enderror" placeholder="Enter Description (optional)">{{ old('description', $campaign->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="goal_amount" class="form-label">Goal Amount (৳)<span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="goal_amount" id="goal_amount" class="form-control @error('goal_amount') is-invalid @enderror" value="{{ old('goal_amount', $campaign->goal_amount) }}">
                            @error('goal_amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="raised_amount" class="form-label">Raised Amount (৳)</label>
                            <input type="number" step="0.01" name="raised_amount" id="raised_amount" class="form-control @error('raised_amount') is-invalid @enderror" value="{{ old('raised_amount', $campaign->raised_amount) }}">
                            @error('raised_amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Campaign Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @if (!empty($campaign->image))
                                <div class="mt-2">
                                    <img src="{{ asset('images/fundraising_campaigns/'.$campaign->image) }}" alt="Campaign Image" width="120" class="rounded border">
                                </div>
                            @else
                                <span class="text-muted">No image uploaded yet</span>
                            @endif
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $campaign->start_date) }}">
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $campaign->end_date) }}">
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', $campaign->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="paused" {{ old('status', $campaign->status) == 'paused' ? 'selected' : '' }}>Paused</option>
                                <option value="completed" {{ old('status', $campaign->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('fundraising_campaigns.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
