@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Sermons')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ 'All Sermons' }}</h2>
        <p class="text-muted small mb-0">Manage and view all sermons in the system.</p>

        {{-- Create sermon button with plus icon--}}
        <a href="{{ route('admin.sermons.create') }}" class="btn btn-sm btn-primary mt-2">
            <i class="fa-solid fa-plus"></i> Create New Sermon
        </a>        

    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Sermon List</h5>
            <input type="text" class="form-control form-control-sm w-auto" placeholder="Search sermons...">
        </div>
        

        <div class="card-body p-0">

    @if($sermons->count() == 0)

        <div class="p-5 text-center text-muted">
            <i class="fa-solid fa-microphone fa-3x mb-3 text-secondary"></i>
            <p>No sermons found.</p>
        </div>

    @else

        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3">SN</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Speaker</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Is Enabled</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sermons as $key => $sermon)
                        <tr>
                            <td class="px-4 py-3">{{ $key + 1 }}</td>

                            <td class="px-4 py-3">
                                <strong>{{ $sermon->title }}</strong>
                            </td>

                            <td class="px-4 py-3">
                                {{ $sermon->speaker ?? '—' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $sermon->date ? \Carbon\Carbon::parse($sermon->date)->format('d M, Y') : '—' }}
                            </td>

                            <td class="px-4 py-3">
                                @if($sermon->is_enabled == 1)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                <div class="d-flex flex-nowrap gap-1">
                                    <a href="{{ route('admin.sermons.show', $sermon->id) }}"
                                    class="btn btn-sm btn-info text-nowrap">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>

                                    <a href="{{ route('admin.sermons.edit', $sermon->id) }}"
                                    class="btn btn-sm btn-warning text-nowrap">
                                        <i class="fa-solid fa-pencil"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.sermons.destroy', $sermon->id) }}"
                                    method="POST"
                                    class="d-inline-block m-0"
                                    onsubmit="return confirm('Are you sure you want to delete this sermon?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-nowrap">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endif
</div>


</div>

@endsection