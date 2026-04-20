@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Edit Role')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">Edit Role</h2>
        <p class="text-muted small mb-0">Update the name of this role.</p>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Role Details</h5>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Back to List
            </a>
        </div>

        <div class="card-body p-3 p-md-4">
            <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3 row">
                    <div class="col-12">
                        <div class="input-group">
                            <label for="name" class="input-group-text col-form-label">Role Name</label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $role->name) }}"
                                   placeholder="Enter role name" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-grid d-md-block mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save"></i> Update Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
