@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'New Role')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">Create New Role</h2>
        <p class="text-muted small mb-0">Add a new role to the system (e.g. Student, Teacher, Staff).</p>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Role Details</h5>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Back to List
            </a>
        </div>

        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="card-body p-3 p-md-4">
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Role Name</label>
                    <input type="text" name="name" id="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="e.g. Student, Teacher, Staff"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="is_enabled" class="form-label fw-semibold">Is Enabled</label>
                    <select name="is_enabled" id="is_enabled"
                            class="form-select @error('is_enabled') is-invalid @enderror"
                            required>
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                    @error('is_enabled')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid d-md-block mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i> Create Role
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
