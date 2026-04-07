@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'New Subject')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Create New Subject" }}</h2>
        <p class="text-muted small mb-0"></p>

    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">

        <form action="{{ route('admin.subjects.store') }}" method="POST">
            @csrf
            <div class="card-body p-3 p-md-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Subject Name</label>
                    <input type="text" name="name" value="{{ old("name") }}" id="name" class="form-control" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

               <div class="mb-3">
                <label class="form-label fw-bold">Assign to Classes</label>
                <div class="d-flex flex-wrap gap-3 mt-1">
                    @foreach($school_classes as $class)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="school_classes[]" value="{{ $class->id }}" id="school_class_{{ $class->id }}">
                            <label class="form-check-label" for="school_class_{{ $class->id }}">
                                {{ $class->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
               </div>

                <div class="d-grid d-md-block mt-3">
                    <button type="submit" class="btn btn-primary">Create Subject</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection