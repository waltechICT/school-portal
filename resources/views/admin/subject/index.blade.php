@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Subjects')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ 'All Subjects' }}</h2>
        <p class="text-muted small mb-0">Manage and view all subjects in the system.</p>

        {{-- Create class button with plus icon--}}
        <a href="{{ route('admin.subjects.create') }}" class="btn btn-sm btn-primary mt-2">
            <i class="fa-solid fa-plus"></i> Create New Subject
        </a>        

    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Subject List</h5>
            <input type="text" class="form-control form-control-sm w-auto" placeholder="Search classes...">
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th scope="col" class="px-4 py-3">SN</th>
                        <th scope="col" class="px-4 py-3">Name</th>
                        <th scope="col" class="px-4 py-3">Classes</th>
                        <th scope="col" class="px-4 py-3">Is_enabled?</th>
                        <th scope="col" class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $key=> $subject)
                    
                    <tr>
                        <td class="px-4 py-3">{{ $key + 1 }}</td>
                        <td class="px-4 py-3">{{ $subject->name }}</td>
                        <td class="px-4 py-3">
                            <div class="d-flex flex-wrap gap-1">
                                @forelse($subject->school_classes as $school_class)
                                    <span class="badge bg-primary">{{ $school_class->name }}</span>
                                @empty
                                    <span class="text-muted small">None</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            @if ($subject->is_enabled)
                                <span class="badge bg-success">Enabled</span>
                            @else
                                <span class="badge bg-secondary">Disabled</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="d-flex flex-nowrap gap-1">
                                <a href="{{ route('admin.subjects.show', $subject->id) }}" class="btn btn-sm btn-info text-nowrap">
                                    <i class="fa-solid fa-eye"></i> View
                                </a>
                                <a href="{{ route('admin.subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning text-nowrap">
                                    <i class="fa-solid fa-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="POST" class="d-inline-block m-0" onsubmit="return confirm('Are you sure you want to delete this subject?');">
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