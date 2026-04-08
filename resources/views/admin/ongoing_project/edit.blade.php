@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Ongoing Project</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('project.update',$project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $project->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="img">
                            <span class="text-info">Image Dimension Must be (725 X 375) and maximum size 300 kb.</span>
                        </div>
                        <div class="col-md-12">
                            <label for="images" class="form-label">Additional Images</label>
                            <input type="file" name="images[]" multiple class="form-control @error('images.*') is-invalid @enderror" id="images">
                            <span class="text-info">Selecting new files will replace the previous additional images.</span>
                            @error('images.*')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Old Image: </label>
                            <img src="{{ asset('images/project/'.$project->image) }}" alt="" width="100">
                        </div>
                        @if(!empty($project->additional_images))
                        <div class="col-md-12">
                            <label class="form-label">Current Additional Images:</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach(json_decode($project->additional_images, true) as $galleryImage)
                                    <img src="{{ asset('images/project/'.$galleryImage) }}" alt="" width="100">
                                @endforeach
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control js-richtext @error('description') is-invalid @enderror" rows="3">
                                {{ $project->description }}
                            </textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

