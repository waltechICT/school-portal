@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Student Details')
@section('content')

<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">Student Details</h2>
            <p class="text-muted small mb-0">Viewing record for {{ $student->surname }} {{ $student->other_names }}.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
                Back to List
            </a>
            <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning rounded-3 shadow-sm fw-bold">
                <i class="fa-solid fa-pencil"></i> Edit Student
            </a>
        </div>
    </div>

    <div class="row g-4">
        {{-- Left Column: Personal & Academic Info --}}
        <div class="col-12 col-lg-8 order-2 order-lg-1">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 fw-bold">Personal Information</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Student ID</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->student_id }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Admission/Reg No.</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->admission_no }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Surname</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->surname }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Other Names</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->other_names }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Role</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->role->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Status</label>
                            <p class="form-control-plaintext mb-0 ps-1">
                                @if ($student->is_enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label class="form-label fw-medium text-muted small">Sex</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->sex }}</p>
                        </div>
                        <div class="col-12 col-sm-8">
                            <label class="form-label fw-medium text-muted small">Date of Birth</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('F j, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 fw-bold">Academic & Guardian Details</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Class</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->schoolClass->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Arm/stream</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->arm->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-12"><hr class="text-muted opacity-25 my-1"></div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Guardian Name</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->guardian_name }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Guardian Phone</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->guardian_phone }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Guardian Occupation</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->guardian_occupation }}</p>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-medium text-muted small">Guardian Address</label>
                            <p class="form-control-plaintext bg-light rounded-3 py-2 px-3 mb-0">{{ $student->guardian_address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column: Passport & Meta --}}
        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 fw-bold">Passport Photo</h5>
                </div>
                <div class="card-body text-center pb-4">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="rounded-circle shadow-sm border bg-light" style="width: 120px; height: 120px; overflow: hidden;">
                            <img src="{{ asset($student->student_passport) }}" alt="Passport" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                    </div>
                    <h6 class="fw-bold mb-0">{{ $student->surname }} {{ $student->other_names }}</h6>
                    <p class="text-muted small">{{ $student->student_id }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3 text-muted small text-uppercase">Record Info</h6>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted small">Created</span>
                        <span class="small fw-medium">{{ $student->created_at->format('M j, Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Last Updated</span>
                        <span class="small fw-medium">{{ $student->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection