@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'New Gallery ')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Create New Gallery" }}</h2>
        <p class="text-muted small mb-0"></p>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body p-3 p-md-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="images" class="form-label">Images (You can select multiple)</label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror" id="images" name="images[]" multiple>
                        @error('images')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                        @error('images.*')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="is_enabled" class="form-label">Is Enabled</label>
                        <select class="form-select @error('is_enabled') is-invalid @enderror" id="is_enabled" name="is_enabled">
                            <option value="1" {{ old('is_enabled') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_enabled') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('is_enabled')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-grid d-md-block mt-3">
                    <button type="submit" class="btn btn-primary">Create Gallery </button>
                    <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
