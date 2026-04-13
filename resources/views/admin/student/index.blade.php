@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Students')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4 d-flex flex-wrap gap-2 justify-content-between align-items-start">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">All Students</h2>
            <p class="text-muted small mb-0">Manage and view all students in the system.</p>
        </div>
        <a href="{{ route('admin.students.create') }}" class="btn btn-sm btn-primary">
            <i class="fa-solid fa-plus"></i> Create New Student
        </a>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-3 p-md-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Student List</h5>
            <input type="text" class="form-control form-control-sm" style="max-width: 200px;" placeholder="Search students...">
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" class="px-3 py-3">SN</th>
                            <th scope="col" class="px-3 py-3">Student</th>
                            <th scope="col" class="px-3 py-3 d-none d-md-table-cell">Admission No.</th>
                            <th scope="col" class="px-3 py-3 d-none d-lg-table-cell">Class</th>
                            <th scope="col" class="px-3 py-3 d-none d-lg-table-cell">Arm</th>
                            <th scope="col" class="px-3 py-3 d-none d-xl-table-cell">Sex</th>
                            <th scope="col" class="px-3 py-3">Is_Enabled</th>
                            <th scope="col" class="px-3 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $key => $student)
                        <tr>
                            <td class="px-3 py-2 text-muted small">{{ $students->firstItem() + $key }}</td>
                            <td class="px-3 py-2">
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset($student->student_passport) }}"
                                        alt="{{ $student->surname }}"
                                        class="rounded-circle border shadow-sm"
                                        style="width: 38px; height: 38px; object-fit: cover; flex-shrink: 0;">
                                    <div>
                                        <p class="mb-0 fw-medium small text-nowrap">{{ $student->surname }} {{ $student->other_names }}</p>
                                        <p class="mb-0 text-muted" style="font-size: 0.75rem;">{{ $student->student_id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-3 py-2 small d-none d-md-table-cell">{{ $student->admission_no }}</td>
                            <td class="px-3 py-2 small d-none d-lg-table-cell">{{ $student->schoolClass->name ?? 'N/A' }}</td>
                            <td class="px-3 py-2 small d-none d-lg-table-cell">{{ $student->arm->name ?? 'N/A' }}</td>
                            <td class="px-3 py-2 small d-none d-xl-table-cell">{{ $student->sex }}</td>
                            <td class="px-3 py-2">
                                @if ($student->is_enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                <div class="d-flex flex-nowrap gap-1">
                                    <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="fa-solid fa-eye"></i>View
                                    </a>
                                    <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>Edit
                                    </a>
                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="d-inline-block m-0" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"><i class="fa-solid fa-trash"></i>Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">No students found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($students->hasPages())
            <div class="p-3 p-md-4 border-top">
                {{ $students->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection