@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Roles')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">All Roles</h2>
        <p class="text-muted small mb-0">Manage roles that can be assigned to students and users.</p>

        <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary mt-2">
            <i class="fa-solid fa-plus"></i> Create New Role
        </a>
    </div>

    {{-- Success / Error Alerts --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Role List</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="px-4 py-3">SN</th>
                            <th scope="col" class="px-4 py-3">Role Name</th>
                            <th scope="col" class="px-4 py-3">Is Enabled</th>
                            <th scope="col" class="px-4 py-3">Created</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $key => $role)
                        <tr>
                            <td class="px-4 py-3">{{ $roles->firstItem() + $key }}</td>
                            <td class="px-4 py-3 fw-semibold">{{ $role->name }}</td>
                            <td class="px-4 py-3">
                                @if ($role->is_enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-danger">Disabled</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-muted small">{{ $role->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <div class="d-flex flex-nowrap gap-1">
                                    <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-sm btn-warning text-nowrap">
                                        <i class="fa-solid fa-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                          class="d-inline-block m-0"
                                          onsubmit="return confirm('Delete this role? Students assigned to it will have their role unset.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">No roles found. Create one above.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        @if($roles->hasPages())
        <div class="card-footer bg-white border-top px-4 py-3">
            {{ $roles->links() }}
        </div>
        @endif
    </div>
</div>

@endsection
