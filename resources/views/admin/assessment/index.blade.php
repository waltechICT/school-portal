@extends('admin.layout.app')

@section('page_title', 'All Assessment')

@section('content')
<div class="container-fluid py-2">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">Assessment</h2>
            <p class="text-muted small mb-0">View and manage all student assessments.</p>
        </div>
        <a href="{{ route('admin.assessment.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i> Create New Assessment
        </a>        
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            {{-- Changed label to # for better visual context --}}
                            <th class="px-4 py-3" style="width: 80px;">Id</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($assessment as $item)
                        <tr>
                            {{-- 
                                UPDATED: Using $loop->iteration ensures the 
                                top row is always 1, the second is 2, etc. 
                            --}}
                            <td class="px-4 py-3 text-muted fw-bold">{{ $loop->iteration }}</td>
                            
                            {{-- Name column --}}
                            <td class="px-4 py-3 fw-bold text-dark">{{ $item->name }}</td>
                            
                            {{-- Title column --}}
                            <td class="px-4 py-3 text-muted">
                                {{ Str::limit($item->title, 50) }}
                            </td>
                            
                            {{-- Is_Enabled column --}}
                            <td class="px-4 py-3 text-center">
                                <span class="badge {{ $item->is_enabled ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $item->is_enabled ? 'Enabled' : 'Disabled' }}
                                </span>
                            </td>

                            {{-- Actions column --}}
                            <td class="px-4 py-3 text-end">
                                <div class="btn-group shadow-sm">
                                    <a href="{{ route('admin.assessment.show', $item->id) }}" class="btn btn-sm btn-white text-info">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.assessment.edit', $item->id) }}" class="btn btn-sm btn-white text-warning">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.assessment.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this assessment?');">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-white text-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">No assessment found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection