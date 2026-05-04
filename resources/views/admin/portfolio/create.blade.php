@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'New Portfolio')

@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Create New Portfolio" }}</h2>
        <p class="text-muted small mb-0">Fill in the details below to add a new project to your portfolio.</p>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <form action="{{ route('admin.portfolio.store') }}" method="POST">
            @csrf
            <div class="card-body p-4">
                
                {{-- Title Input --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" 
                           class="form-control @error('title') is-invalid @enderror" required>
                    @error('title') {{-- Fixed: changed from 'name' to 'title' to match input name --}}
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description Input --}}
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" id="description" 
                              class="form-control @error('description') is-invalid @enderror" 
                              rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div> 

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary px-4">Create Portfolio</button>
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection