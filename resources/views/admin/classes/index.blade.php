@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Classes')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ 'All Classes' }}</h2>
        <p class="text-muted small mb-0">Manage and view all classes in the system.</p>

        {{-- Create class button with plus icon--}}
        <a href="{{ route('admin.classes.create') }}" class="btn btn-sm btn-primary mt-2">
            <i class="fa-solid fa-plus"></i> Create New Class
        </a>        

    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Class List</h5>
            <input type="text" class="form-control form-control-sm w-auto" placeholder="Search classes...">
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="px-4 py-3">SN</th>
                        <th scope="col" class="px-4 py-3">Name</th>
                        <th scope="col" class="px-4 py-3">Is_enabled?</th>
                        <th scope="col" class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($school_classes as $key=> $school_class)
                    
                    <tr>
                        <td class="px-4 py-3">{{ $key + 1 }}</td>
                        <td class="px-4 py-3">{{ $school_class->name }}</td>
                        <td class="px-4 py-3">
                            @if ($school_class->is_enabled)
                                <span class="badge bg-success">Enabled</span>
                            @else
                                <span class="badge bg-secondary">Disabled</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="d-flex flex-nowrap gap-1">
                                <a href="{{ route('admin.classes.show', $school_class->id) }}" class="btn btn-sm btn-info text-nowrap">
                                    <i class="fa-solid fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.classes.edit', $school_class->id) }}" class="btn btn-sm btn-warning text-nowrap">
                                    <i class="fa-solid fa-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.classes.destroy', $school_class->id) }}" method="POST" class="d-inline-block m-0" onsubmit="return confirm('Are you sure you want to delete this class?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger text-nowrap"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection