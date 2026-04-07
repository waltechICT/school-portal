@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Subject Details')
@section('content')

    <div class="container-fluid py-2">
        <div class="mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Subject Details" }}</h2>
            <p class="text-muted small mb-0"></p>

        </div>

        <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">Subject Details</h5>
                <a href="{{ route('admin.subjects.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
            </div>
            
            <div class="card-body p-3 p-md-4">
                <h5 class="mb-3">Subject Name: {{ $subject->name }}</h5>
                <p><strong>School Classes:</strong> 
                    @foreach($subject->school_classes as $school_class)
                        <span class="badge bg-success">{{ $school_class->name }}</span>
                    @endforeach
                </p>
                <p><strong>Status:</strong> 
                    @if ($subject->is_enabled)
                        <span class="badge bg-success">Enabled</span>
                    @else
                        <span class="badge bg-secondary">Disabled</span>
                    @endif
                </p>
                <p><strong>Created At:</strong> {{ $subject->created_at->format('F j, Y, g:i a') }}</p>
                <p><strong>Updated At:</strong> {{ $subject->updated_at->format('F j, Y, g:i a') }}</p>

                {{-- edit button --}}
                <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning mt-3">
                    <i class="fa-solid fa-pencil"></i> Edit Subject
                </a>
            </div>
        </div>

@endsection