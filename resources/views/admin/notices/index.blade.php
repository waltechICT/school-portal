@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'All Notices')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">All Notices</h2>
            <p class="text-muted small mb-0">Manage and view all Notices in the system.</p>
        </div>

        {{-- Create notice button --}}
        <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Create New Notice
        </a>        
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Notice List</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="px-4 py-3">SN</th>
                            <th scope="col" class="px-4 py-3">Title</th>
                            <th scope="col" class="px-4 py-3">Description</th>
                            <th scope="col" class="px-4 py-3 text-center">Is_Enabled</th>
                            <th scope="col" class="px-4 py-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notices as $notice)
                        <tr>
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 fw-bold">{{ $notice->title }}</td>
                            <td class="px-4 py-3 text-muted">
                                {{ Str::limit(strip_tags($notice->description), 60) }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($notice->is_enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ route('admin.notices.show', $notice->id) }}" class="btn btn-sm btn-white text-info" title="View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.notices.edit', $notice->id) }}" class="btn btn-sm btn-white text-warning" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-white text-danger" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No notices found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection