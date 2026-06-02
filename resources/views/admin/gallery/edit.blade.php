@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Edit Gallery Item')
@section('content')

    <div class="container-fluid py-2">
        <div class="mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Edit Gallery Details" }}</h2>
            <p class="text-muted small mb-0"></p>
        </div>

        <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">Gallery Details</h5>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="card-body p-3 p-md-4">
                <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row g-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $gallery->title) }}">
                            @error('title')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="images" class="form-label">Add Images (You can select multiple)</label>
                            <input type="file" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" id="images" name="images[]" multiple>
                            @error('images')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            @error('images.*')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mt-3">
                            <label class="form-label d-block fw-semibold text-dark">Current Images (Check to remove on update)</label>
                            <div class="row g-3">
                                @if($gallery->images && count($gallery->images) > 0)
                                    @foreach($gallery->images as $img)
                                        <div class="col-6 col-sm-4 col-md-3">
                                            <div class="card h-100 border p-1 position-relative shadow-sm">
                                                <img src="{{ asset($img) }}" class="card-img-top rounded img-fluid" style="height: 120px; object-fit: cover;">
                                                <div class="card-body p-2 text-center">
                                                    <div class="form-check d-flex align-items-center justify-content-center">
                                                        <input class="form-check-input me-2 border-danger" type="checkbox" name="remove_images[]" value="{{ $img }}" id="remove_{{ md5($img) }}">
                                                        <label class="form-check-label text-danger small fw-medium" for="remove_{{ md5($img) }}">
                                                            Remove
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-12">
                                        <p class="text-muted small mb-0">No images uploaded yet.</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $gallery->description) }}</textarea>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="is_enabled" class="form-label">Is Enabled</label>
                            <select class="form-select @error('is_enabled') is-invalid @enderror" id="is_enabled" name="is_enabled">
                                <option value="1" {{ old('is_enabled', $gallery->is_enabled) == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_enabled', $gallery->is_enabled) == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_enabled')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid d-md-block mt-3">
                        <button type="submit" class="btn btn-primary">Update Gallery</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
