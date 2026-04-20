@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'School Info Details')
@section('content')

<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">School Info Details</h2>
            <p class="text-muted small mb-0">Viewing full details for {{ $school_info->school_name }}.</p>
        </div>
        <a href="{{ route('admin.school-info.index') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
            Back to List
        </a>
    </div>

    <div class="row g-4">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0 d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0 fw-bold">General Information</h5>
                    @if ($school_info->is_enabled)
                        <span class="badge bg-success px-3 py-2 rounded-pill">Enabled</span>
                    @else
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">Disabled</span>
                    @endif
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label class="form-label text-muted small fw-bold mb-1">Educational Level</label>
                            <div class="form-control-plaintext py-0 fw-medium">{{ $school_info->educationalLevel->name ?? 'N/A' }}</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label text-muted small fw-bold mb-1">School Name</label>
                            <div class="form-control-plaintext py-0 fw-medium">{{ $school_info->school_name }}</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label text-muted small fw-bold mb-1">Phone Number</label>
                            <div class="form-control-plaintext py-0 fw-medium">{{ $school_info->school_phone }}</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label class="form-label text-muted small fw-bold mb-1">Email Address</label>
                            <div class="form-control-plaintext py-0 fw-medium">{{ $school_info->school_email }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 fw-bold">Detailed Description</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold mb-1">School Address</label>
                            <div class="bg-light p-3 rounded-3 text-dark mb-2">
                                {{ $school_info->school_address ?: 'No address provided.' }}
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label text-muted small fw-bold mb-1">About the School</label>
                            <div class="bg-light p-3 rounded-3 text-dark">
                                {{ $school_info->school_about ?: 'No additional info provided.' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <h5 class="card-title mb-0 fw-bold">Quick Actions</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.school-info.edit', $school_info->id) }}" class="btn btn-warning rounded-3 fw-bold py-2">
                            Edit
                        </a>
                        <form action="{{ route('admin.school-info.destroy', $school_info->id) }}" method="POST" class="m-0 text-center" onsubmit="return confirm('Are you sure you want to delete this class?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100 rounded-3 fw-bold py-2 mt-2">Delete Info</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer bg-white border-top text-muted small text-center py-3">
                    Created: {{ $school_info->created_at->format('F j, Y') }}<br>
                    Last Updated: {{ $school_info->updated_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection