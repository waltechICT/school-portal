{{-- show --}}
@extends('admin.layout.app')
@section('page_title', 'Assignment Details')
@section('content')

<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Assignment Details</h2>
            <p class="text-muted small mb-0">View the details of the assignment below.</p>
        </div>
        <a href="{{ route('admin.assignment.management') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white py-3 border-bottom-0">
            <h5 class="card-title mb-0 fw-bold">Assignment Information</h5>
        </div>
        <div class="card-body pt-0">
            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <label class="form-label fw-medium">Class</label>
                    <p class="form-control-plaintext">{{ $assignment->schoolClass?->name ?? 'N/A' }}</p>
                </div>

                <div class="col-12 col-sm-6">
                    <label class="form-label fw-medium">Subject</label>
                    <p class="form-control-plaintext">{{ $assignment->subject?->name ?? 'N/A' }}</p>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label fw-medium"> Staff</label>
                    <p class="form-control-plaintext">{{ $assignment->staff?->name ?? 'N/A' }}</p>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label fw-medium"> Submission Date</label>
                    <p class="form-control-plaintext">{{ $assignment->submittion_date ? \Carbon\Carbon::parse($assignment->submittion_date)->format('F d, Y h:i A') : 'N/A' }}</p>
                </div>
                <div class="col-12">
                    <label class="form-label fw-medium"> Description</label>
                    <div class="form-control-plaintext">{!! $assignment->note ?? 'N/A' !!}</div>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label fw-medium"> Created At</label>
                    <p class="form-control-plaintext">{{ $assignment->created_at->format('F d, Y h:i A') }}</p>
                </div>
                <div class="col-12 col-sm-6">
                    <label class="form-label fw-medium"> Updated At</label>
                    <p class="form-control-plaintext">{{ $assignment->updated_at->format('F d, Y h:i A') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
