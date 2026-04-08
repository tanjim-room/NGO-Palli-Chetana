@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Impact Metric</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('update') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('impact.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="col-md-8">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" value="{{ old('title', $data->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="metric_value" class="form-label">Metric Value <span class="text-danger">*</span></label>
                                    <input type="text" name="metric_value" class="form-control @error('metric_value') is-invalid @enderror" 
                                           id="metric_value" value="{{ old('metric_value', $data->metric_value) }}" required>
                                    @error('metric_value')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="metric_unit" class="form-label">Metric Unit <span class="text-danger">*</span></label>
                                    <input type="text" name="metric_unit" class="form-control @error('metric_unit') is-invalid @enderror" 
                                           id="metric_unit" value="{{ old('metric_unit', $data->metric_unit) }}" required>
                                    @error('metric_unit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" class="form-control js-richtext" rows="4">{{ old('description', $data->description) }}</textarea>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" name="year" class="form-control" id="year" 
                                           value="{{ old('year', $data->year) }}" min="2000" max="2100">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="order" class="form-label">Display Order</label>
                                    <input type="number" name="order" class="form-control" id="order" 
                                           value="{{ old('order', $data->order) }}" min="0">
                                    <small class="text-muted">Lower numbers appear first</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border">
                                <div class="card-header bg-light">
                                    <h6 class="mb-0">Icon Selection</h6>
                                </div>
                                <div class="card-body">
                                    <label for="icon" class="form-label">Upload Icon</label>
                                    <input type="file" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" accept="image/*">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">PNG, JPG, SVG (max 2MB). Leave empty to keep current icon.</small>
                                    
                                    <div class="text-center p-4 mt-3 bg-light border rounded" id="iconPreview">
                                        @if($data->icon && file_exists(public_path('images/impact/' . $data->icon)))
                                            <img src="{{ asset('images/impact/' . $data->icon) }}" style="max-width:80px;max-height:80px;" class="rounded">
                                            <p class="mt-2 mb-0 text-muted small">Current icon</p>
                                        @else
                                            <i class="bi bi-image" style="font-size: 48px; color: #ccc;"></i>
                                            <p class="mt-2 mb-0 text-muted small">No icon uploaded</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary px-4" type="submit">
                                <i class="bi bi-save"></i> Update Impact
                            </button>
                            <a href="{{ route('impact.index') }}" class="btn btn-secondary px-4">
                                <i class="bi bi-x-lg"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('iconPreview');
    
    iconInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                iconPreview.innerHTML = 
                    '<img src="' + e.target.result + '" style="max-width:80px;max-height:80px;" class="rounded">' +
                    '<p class="mt-2 mb-0 text-muted small">' + file.name + '</p>';
            };
            reader.readAsDataURL(file);
        }
    });
});
</script>
@endsection
