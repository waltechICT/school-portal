@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'Staff Details')

@section('content')

<div class="container-fluid py-3 py-md-4">
    {{-- Header Section --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Staff Member Details</h2>
            <p class="text-muted small mb-0">Viewing profile for <strong>{{ $staff->name ?? 'Staff Member' }}</strong>.</p>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.staff.index') }}" class="btn btn-outline-secondary rounded-3 shadow-sm px-3">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
            <a href="{{ route('admin.staff.edit', $staff->id ?? 0) }}" class="btn btn-warning rounded-3 shadow-sm fw-bold px-3">
                <i class="fa-solid fa-pencil me-1"></i> Edit Staff
            </a>
        </div>
    </div>

    <div class="row g-4">
        {{-- Left Column: Personal & Employment Info --}}
        <div class="col-12 col-lg-8 order-2 order-lg-1">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 fw-bold">Personal & Contact Information</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold text-muted small text-uppercase">Full Name</label>
                            <div class="bg-light rounded-3 py-2 px-3 border-0">{{ $staff->name ?? 'Not provided' }}</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold text-muted small text-uppercase">Email Address</label>
                            <div class="bg-light rounded-3 py-2 px-3 border-0">{{ $staff->email ?? 'Not provided' }}</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold text-muted small text-uppercase">Phone Number</label>
                            <div class="bg-light rounded-3 py-2 px-3 border-0">{{ $staff->phone ?? 'Not provided' }}</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold text-muted small text-uppercase">is_enabled</label>
                            <div class="bg-light rounded-3 py-2 px-3 border-0">
                                @php
                                    $isActive = ($staff->is_enabled ?? false) || (($staff->is_enabled ?? '') === 'is_enabled');
                                @endphp
                                @if($isActive)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 fw-bold">Employment Details</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold text-muted small text-uppercase">Role</label>
                            <div class="bg-light rounded-3 py-2 px-3 border-0">
                                 @if(isset($staff->role) && in_array(strtolower($staff->role), ['sub admin', 'admin', 'super admin', 'teacher']))
                                    {{ ucfirst($staff->role) }}
                                @else
                                    —
                                @endif
                            </div>

                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label fw-bold text-muted small text-uppercase">Sex</label>
                            <div class="bg-light rounded-3 py-2 px-3 border-0">
                                @if(isset($staff->sex) && in_array(strtolower($staff->sex), ['male', 'female']))
                                    {{ ucfirst($staff->sex) }}
                                @else
                                    —
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column: Profile Image & Meta --}}
        <div class="col-12 col-lg-4 order-1 order-lg-2">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0 text-center">
                    <h5 class="card-title mb-0 fw-bold">Profile Card</h5>
                </div>
                <div class="card-body text-center pb-4">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="rounded-circle shadow-sm border p-1 bg-white" style="width: 140px; height: 140px;">
                            <div class="rounded-circle w-100 h-100 overflow-hidden bg-light">
                                @if($staff->photo ?? false)
                                    <img src="{{ Storage::url($staff->photo) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div class="h-100 d-flex align-items-center justify-content-center bg-primary text-white fs-1 fw-bold">
                                        {{ strtoupper(substr($staff->name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">{{ $staff->name ?? 'Staff Member' }}</h5>
                    <p class="text-primary fw-medium mb-1">{{ $staff->role ?? 'Staff Member' }}</p>
                    <p class="text-muted small mb-0"><i class="fa-regular fa-envelope me-1"></i> {{ $staff->email ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3 text-muted small text-uppercase border-bottom pb-2">Record Information</h6>
                    <div class="d-flex justify-content-between mb-3 align-items-center">
                        <span class="text-muted small">Record Created</span>
                        <span class="small fw-medium bg-light px-2 py-1 rounded">
                            {{ isset($staff->created_at) ? $staff->created_at->format('M j, Y') : 'N/A' }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted small">Last Activity</span>
                        <span class="small fw-medium text-primary">
                            {{ isset($staff->updated_at) ? $staff->updated_at->diffForHumans() : 'N/A' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
