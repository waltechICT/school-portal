@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'New Class')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Create New Class" }}</h2>
        <p class="text-muted small mb-0"></p>

    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">

        <form action="{{ route('admin.classes.store') }}" method="POST">
            @csrf
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Class Name</label>
                    <input type="text" name="name" value="{{ old("name") }}" id="name" class="form-control" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div> --}}

                <button type="submit" class="btn btn-primary">Create Class</button>
            </div>
        </form>
    </div>
</div>

@endsection