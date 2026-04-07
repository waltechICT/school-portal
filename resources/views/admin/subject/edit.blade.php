@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Edit Subject Details')
@section('content')

    <div class="container-fluid py-2">
        <div class="mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Edit Subject Details" }}</h2>
            <p class="text-muted small mb-0"></p>

        </div>

        <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">Subject Details</h5>
                <a href="{{ route('admin.subjects.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="card-body p-3 p-md-4">
                <form action="{{ route('admin.subjects.update', $subject->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <div class="col-12">
                            <div class="input-group">
                                <label for="class_name" class="input-group-text col-form-label">Subject Name</label>

                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $subject->name) }}" placeholder="Enter subject name" required>

        
                                <div class="col-12 mt-3">
                                    <label class="form-label fw-bold">Assign to Classes</label>
                                    <div class="d-flex flex-wrap gap-3 mt-1">
                                        @foreach($school_classes as $class)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="school_classes[]" value="{{ $class->id }}" id="school_class_{{ $class->id }}" {{ in_array($class->id, $subject->school_classes_id ?? []) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="school_class_{{ $class->id }}">
                                                    {{ $class->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @error('name')
                                <span class="p-3">
                                    <div class="text-danger">{{ $message }}</div>
                                </span>
                            @enderror
                        </div>

                        {{-- is endabled --}}
                        <div class="col-12">
                            <div class="input-group">
                                <label for="is_enabled" class="input-group-text col-form-label">Is Enabled?</label>
                                <select name="is_enabled" id="is_enabled"
                                    class="form-select @error('is_enabled') is-invalid @enderror" required>
                                    <option value="1" {{ old('is_enabled', $subject->is_enabled) == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_enabled', $subject->is_enabled) == 0 ? 'selected' : '' }}>No</option>
                                </select>
                                {{-- error message --}}
                                @error('is_enabled')
                                    <span class="p-3">
                                        <div class="text-danger">{{ $message }}</div>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-grid d-md-block mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Update Subject</button>
                    </div>
                </form>
            </div>

        </div>

@endsection