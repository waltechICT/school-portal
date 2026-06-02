@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'New Sermon')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Create New Sermon" }}</h2>
        <p class="text-muted small mb-0"></p>

    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">

        <form action="{{ route('admin.sermons.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            

            <div class="card-body p-3 p-md-4">
                {{-- title, speaker, date, scripture,video url, audio url,image , description, is_enabled --}}
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="speaker" class="form-label">Speaker</label>
                        <input type="text" class="form-control @error('speaker') is-invalid @enderror" id="speaker" name="speaker" value="{{ old('speaker') }}">
                        @error('speaker')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
                        @error('date')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="scripture" class="form-label">Scripture</label>
                        <input type="text" class="form-control @error('scripture') is-invalid @enderror" id="scripture" name="scripture" value="{{ old('scripture') }}">
                        @error('scripture')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="video_url" class="form-label">Video URL</label>
                        <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url') }}">
                        @error('video_url')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="audio_url" class="form-label">Audio URL</label>
                        <input type="text" class="form-control @error('audio_url') is-invalid @enderror" id="audio_url" name="audio_url" value="{{ old('audio_url') }}">
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
                    </div>
                    <div class="col-md-6">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
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
                    <button type="submit" class="btn btn-primary">Create Sermon</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection