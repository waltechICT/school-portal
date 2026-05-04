@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'Portfolio')

@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ 'All Portfolios' }}</h2>
        <p class="text-muted small mb-0">Manage and view all Portfolio projects in the system.</p>

        {{-- Create portfolio button --}}
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-sm btn-primary mt-2">
            <i class="fa-solid fa-plus"></i> Create New Portfolio
        </a>        
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Portfolio List</h5>
            <input type="text" class="form-control form-control-sm w-auto" placeholder="Search Portfolio...">
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="px-4 py-3">SN</th>
                            <th scope="col" class="px-4 py-3">Title</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- FIX: Changed $portfolio to $portfolios to match the Controller's compact('portfolios') --}}
                        @forelse ($portfolios as $key => $item)
                        <tr>
                            <td class="px-4 py-3">{{ $key + 1 }}</td>
                            <td class="px-4 py-3 fw-medium">{{ $item->title }}</td>
                            <td class="px-4 py-3">
                                @if ($item->is_enabled)
                                    <span class="badge bg-success-subtle text-success border border-success-subtle px-3">Enabled</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-3">Disabled</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.portfolio.show', $item->id) }}" class="btn btn-sm btn-outline-info" title="View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.portfolio.edit', $item->id) }}" class="btn btn-sm btn-outline-warning" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.portfolio.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this portfolio?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                No created portfolios yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection