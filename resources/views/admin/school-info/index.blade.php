@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'School Info')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4 d-flex flex-wrap gap-2 justify-content-between align-items-start">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">All School Info</h2>
            <p class="text-muted small mb-0">Manage and view all school settings and metadata.</p>
        </div>
        <a href="{{ route('admin.school-info.create') }}" class="btn btn-sm btn-primary">
            <i class="fa-solid fa-plus"></i> Create New
        </a>        
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-3 p-md-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">School Info List</h5>
            <input type="text" class="form-control form-control-sm" style="max-width: 200px;" placeholder="Search school info...">
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="px-4 py-3">SN</th>
                            <th scope="col" class="px-4 py-3">Educational Level</th>
                            <th scope="col" class="px-4 py-3">School Name</th>
                            <th scope="col" class="px-4 py-3 d-none d-md-table-cell">Phone</th>
                            <th scope="col" class="px-4 py-3 d-none d-lg-table-cell">Email</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($school_infos as $key => $school_info)
                        <tr>
                            <td class="px-4 py-2 small text-muted">{{ $key + 1 }}</td>
                            <td class="px-4 py-2 fw-medium text-dark">{{ $school_info->educationalLevel->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 small">{{ $school_info->school_name }}</td>
                            <td class="px-4 py-2 small d-none d-md-table-cell">{{ $school_info->school_phone }}</td>
                            <td class="px-4 py-2 small d-none d-lg-table-cell">{{ $school_info->school_email }}</td>
                            <td class="px-4 py-2">
                                @if ($school_info->is_enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                <div class="d-flex flex-nowrap gap-1">
                                    <a href="{{ route('admin.school-info.show', $school_info->id) }}" class="btn btn-sm btn-info text-nowrap" title="View">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('admin.school-info.edit', $school_info->id) }}" class="btn btn-sm btn-warning text-nowrap" title="Edit">
                                        <i class="fa-solid fa-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.school-info.destroy', $school_info->id) }}" method="POST" class="d-inline-block m-0" onsubmit="return confirm('Are you sure you want to delete this class?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-nowrap" title="Delete"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">No school information found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection