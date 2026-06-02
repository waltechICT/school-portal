@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Edit Sermon Details')
@section('content')

    <div class="container-fluid py-2">
        <div class="mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Edit Sermon Details" }}</h2>
            <p class="text-muted small mb-0"></p>

        </div>

        <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">Sermon Details</h5>
                <a href="{{ route('admin.sermons.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="card-body p-3 p-md-4">
                <form action="{{ route('admin.sermons.update', $sermon->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="mb-3 row g-3">
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $sermon->title) }}">
                            @error('title')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="speaker" class="form-label">Speaker</label>
                            <input type="text" class="form-control @error('speaker') is-invalid @enderror" id="speaker" name="speaker" value="{{ old('speaker', $sermon->speaker) }}">
                            @error('speaker')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $sermon->date) }}">
                            @error('date')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="scripture" class="form-label">Scripture</label>
                            <input type="text" class="form-control @error('scripture') is-invalid @enderror" id="scripture" name="scripture" value="{{ old('scripture', $sermon->scripture) }}">
                            @error('scripture')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="video_url" class="form-label">Video URL</label>
                            <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $sermon->video_url) }}">
                            @error('video_url')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="audio_url" class="form-label">Audio URL</label>
                            <input type="text" class="form-control @error('audio_url') is-invalid @enderror" id="audio_url" name="audio_url" value="{{ old('audio_url', $sermon->audio_url) }}">
                            @error('audio_url')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            @error('image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                            @if($sermon->image)
                                <small class="text-muted d-block mt-1">Current: <a href="{{ asset($sermon->image) }}" target="_blank">View</a></small>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $sermon->description) }}</textarea>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="is_enabled" class="form-label">Is Enabled</label>
                            <select class="form-select @error('is_enabled') is-invalid @enderror" id="is_enabled" name="is_enabled">
                                <option value="1" {{ old('is_enabled', $sermon->is_enabled) == '1' ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_enabled', $sermon->is_enabled) == '0' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('is_enabled')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid d-md-block mt-3">
                        <button type="submit" class="btn btn-primary">Update Sermon</button>
                    </div>
                </form>
            </div>

        </div>

@endsection