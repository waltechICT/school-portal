@extends('admin.layout.app')
@section('page_title', 'Assignments')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4 d-flex flex-wrap gap-2 justify-content-between align-items-start">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">All Assignments</h2>
            <p class="text-muted small mb-0">Manage and view all assignments in the system.</p>
        </div>
        <a href="{{ route('admin.assignment.create') }}" class="btn btn-sm btn-primary">
            <i class="fa-solid fa-plus"></i> Create New Assignment
        </a>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-3 p-md-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Assignment List</h5>
            <input type="text" class="form-control form-control-sm" style="max-width: 200px;" placeholder="Search assignments...">
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">SN</th>
                            <th class="px-4 py-3">Class</th>
                            <th class="px-4 py-3">Subject</th>
                            <th class="px-4 py-3 d-none d-lg-table-cell">Description</th>
                            <th class="px-4 py-3">Is Enabled</th>
                            <th class="px-4 py-3">Actions</th>

                        </tr>
                    </thead>
                   <tbody>
                        @forelse($assignments as $key => $assignment)
                        <tr>
                            <td class="px-4 py-3">
                                {{ method_exists($assignments, 'firstItem') ? $assignments->firstItem() + $key : $loop->iteration }}
                            </td>
                            <td class="px-4 py-3">{{ $assignment->schoolClass?->name ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                <p class="mb-0 fw-medium small text-nowrap">{{ $assignment->subject?->name ?? 'N/A' }}</p>
                                <p class="mb-0 text-muted" style="font-size: 0.75rem;">ID: {{ $assignment->id }}</p>
                            </td>
                            <td class="px-4 py-3 small d-none d-lg-table-cell">
                                {{ \Illuminate\Support\Str::limit(strip_tags($assignment->note), 80) ?: 'N/A' }}
                            </td>
                            <td class="px-4 py-3">
                                @if ($assignment->is_enabled)
                                    <span class="badge bg-success">Is Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Is Disabled</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex flex-nowrap gap-1">
                                    <a href="{{ route('admin.assignment.show', $assignment->id) }}" class="btn btn-sm btn-info text-nowrap">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.assignment.edit', $assignment->id) }}" class="btn btn-sm btn-warning text-nowrap">
                                        <i class="fa-solid fa-pencil"></i> Edit
                                    </a>
                                   <form action="{{ route('admin.assignment.destroy', $assignment->id) }}" method="POST" class="d-inline-block m-0" onsubmit="return confirm('Are you sure?');">
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
                            <td colspan="6" class="text-center py-5 text-muted">No assignments found.</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>




        </div>
    </div>
</div>

@endsection
