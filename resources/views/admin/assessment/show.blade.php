@extends('admin.layout.app')

@section('page_title', 'View Assessment')

@section('content')
<div class="container-fluid py-4">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">Assessment Details</h2>
            <p class="text-muted small mb-0">Reviewing assessment configuration and content.</p>
        </div>
        <a href="{{ route('admin.assessment.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="row g-4">
                {{-- ID Section --}}
                <div class="col-md-2">
                    <span class="text-muted d-block small text-uppercase fw-bold mb-1">id</span>
                    <p class="fw-bold text-dark mb-0">#{{ $assessment->id }}</p>
                </div>

                {{-- Name Section (Corrected to use $assessment->name) --}}
                <div class="col-md-7">
                    <span class="text-muted d-block small text-uppercase fw-bold mb-1">Assessment Name</span>
                    <p class="fw-bold text-dark mb-0 fs-5">{{ $assessment->name }}</p>
                </div>

                {{-- Status Section --}}
                <div class="col-md-3">
                    <span class="text-muted d-block small text-uppercase fw-bold mb-1">Status</span>
                    <div>
                        <span class="badge {{ $assessment->is_enabled ? 'bg-success' : 'bg-secondary' }} px-3 py-2">
                            {{ $assessment->is_enabled ? 'Enabled' : 'Disabled' }}
                        </span>
                    </div>
                </div>
            </div>

            <hr class="my-4 opacity-25">

            {{-- Title/Content Section (Corrected to use $assessment->title) --}}
            <div class="mt-4">
                <span class="text-muted d-block small text-uppercase fw-bold mb-2">Assessment Title (Content)</span>
                <div class="p-4 border border-light rounded-3 bg-light text-dark shadow-sm" style="white-space: pre-wrap; min-height: 150px;">
                    {{ $assessment->title }}
                </div>
            </div>

            <div class="text-end mt-5">
                <a href="{{ route('admin.assessment.edit', $assessment->id) }}" class="btn btn-warning text-white px-4 py-2 rounded-3 fw-bold">
                    <i class="fa-solid fa-pencil me-1"></i> Edit This Assessment
                </a>
            </div>
        </div>
    </div>
</div>
@endsection