@extends('admin.layout.app')

@section('page_title', 'New Assessment')

@section('content')
<div class="container-fluid py-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-dark">Create New Assessment</h5>
        </div>
        <form action="{{ route('admin.assessment.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Assessment Name</label>
                        {{-- Changed name from 'title' to 'name' --}}
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="CA 1" required>
                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Assessment Title (Content)</label>
                    {{-- Changed name from 'description' to 'title' --}}
                    <textarea name="title" class="form-control @error('title') is-invalid @enderror" rows="5" placeholder="Enter the assessment title e.g, Continuous Assessment 1" required>{{ old('title') }}</textarea>
                    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="text-end">
                    <a href="{{ route('admin.assessment.index') }}" class="btn btn-light px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4 fw-bold">Create Assessment</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection