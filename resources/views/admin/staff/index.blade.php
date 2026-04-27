@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'All Staff')

@section('content')

<div class="container-fluid py-2">
    {{-- Header Section --}}
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">All Staff Members</h2>
        <p class="text-muted small mb-0">Manage and view all employee records in the system.</p>

        {{-- Create staff button consistent with subject layout --}}
        <a href="{{ route('admin.staff.create') }}" class="btn btn-sm btn-primary mt-2">
            <i class="fa-solid fa-plus"></i> Create New Staff
        </a>
    </div>

    {{-- Main Card --}}
    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Staff List</h5>
            <input type="text" class="form-control form-control-sm w-auto" placeholder="Search staff...">
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="px-4 py-3">SN</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3 d-none d-md-table-cell">Email</th>
                            <th scope="col" class="px-4 py-3 d-none d-lg-table-cell">Phone</th>
                            <th scope="col" class="px-4 py-3">is_enabled</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($staff as $key => $member)
                        <tr>
                            <td class="px-4 py-3">
                                {{ method_exists($staff, 'firstItem') ? $staff->firstItem() + $key : $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center gap-2">
                                    {{-- Staff Image --}}
                                    @if(isset($member->photo))
                                        <img src="{{ asset($member->photo) }}"
                                             alt="{{ $member->name }}"
                                             class="rounded-circle border shadow-sm"
                                             style="width: 35px; height: 35px; object-fit: cover; flex-shrink: 0;">
                                    @else
                                        <div class="rounded-circle border shadow-sm bg-light d-flex align-items-center justify-content-center"
                                             style="width: 35px; height: 35px; flex-shrink: 0;">
                                            <i class="fa-solid fa-user-tie text-muted small"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="mb-0 fw-medium small text-nowrap">{{ $member->name }}</p>
                                        <p class="mb-0 text-muted" style="font-size: 0.75rem;">ID: {{ $member->staff_id ?? $member->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 small d-none d-md-table-cell text-muted">{{ $member->email }}</td>
                            <td class="px-4 py-3 small d-none d-lg-table-cell">{{ $member->phone ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                @if ($member->status === 'active' || $member->is_enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex flex-nowrap gap-1">
                                    <a href="{{ route('admin.staff.show', $member->id) }}" class="btn btn-sm btn-info text-nowrap">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.staff.edit', $member->id) }}" class="btn btn-sm btn-warning text-nowrap">
                                        <i class="fa-solid fa-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.staff.destroy', $member->id) }}" method="POST" class="d-inline-block m-0" onsubmit="return confirm('Are you sure?');">
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
                            <td colspan="6" class="text-center py-5 text-muted">No staff members found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if(method_exists($staff, 'hasPages') && $staff->hasPages())
                <div class="px-4 py-3 border-top">
                    {{ $staff->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
