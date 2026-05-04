@extends('admin.layout.app')

@section('page_title', 'Edit Assessment')

@section('content')
<div class="container-fluid py-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white py-3">
            {{-- Updated to show the assessment name --}}
            <h5 class="mb-0 fw-bold text-dark">Edit Assessment: {{ $assessment->name }}</h5>
        </div>
        
        <form action="{{ route('admin.assessment.update', $assessment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label class="form-label fw-bold">Assessment Name</label>
                        {{-- Changed name from 'title' to 'name' --}}
                        <input type="text" name="name" value="{{ old('name', $assessment->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Status (Is_Enabled)</label>
                        <select name="is_enabled" class="form-select">
                            <option value="1" {{ old('is_enabled', $assessment->is_enabled) == 1 ? 'selected' : '' }}>Enabled</option>
                            <option value="0" {{ old('is_enabled', $assessment->is_enabled) == 0 ? 'selected' : '' }}>Disabled</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Assessment Title (Content)</label>
                    {{-- Changed name from 'description' to 'title' --}}
                    <textarea name="title" class="form-control @error('title') is-invalid @enderror" rows="8" required>{{ old('title', $assessment->title) }}</textarea>
                    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.assessment.index') }}" class="btn btn-light px-4">Cancel</a>
                    <button type="submit" class="btn btn-warning px-4 text-white fw-bold">Update Assessment</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection