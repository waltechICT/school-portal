{{-- edit --}}
@extends('admin.layout.app')
@section('page_title', 'Edit Assignment')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css">
@endpush

@section('content')
<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Edit Assignment</h2>
            <p class="text-muted small mb-0">Update the details of the assignment below.</p>
        </div>
        <a href="{{ route('admin.assignment.management') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to List
        </a>
    </div>  
    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.assignment.update', $assignment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Assignment Information</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label for="school_class_id" class="form-label fw-medium">Class <span class="text-danger">*</span></label>
                                <select name="school_class_id" id="school_class_id" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="">Select Class</option>
                                    @foreach ($school_classes as $class)
                                        <option value="{{ $class->id }}" {{ old('school_class_id', $assignment->school_class_id) == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="subject_id" class="form-label fw-medium">Subject <span class="text-danger">*</span></label>
                                <select name="subject_id" id="subject_id" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subject_id', $assignment->subject_id) == $subject->id ? 'selected' : '' }}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="note" class="form-label fw-medium"> Description <span class="text-danger">*</span></label>
                            <textarea name="note" id="note" class="form-control bg-light border-0 rounded-3 summernote" rows="6">{{ old('note', $assignment->note) }}</textarea>
                        </div>
                        <div class="mt-3">
                            <label for="submittion_date" class="form-label fw-medium">Submission date <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="submittion_date" id="submittion_date" class="form-control bg-light border-0 py-2 px-3 rounded-3" value="{{ old('submittion_date', $assignment->submittion_date ? \Carbon\Carbon::parse($assignment->submittion_date)->format('Y-m-d\TH:i') : '') }}" max="9999-12-31T23:59" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary rounded-3 py-2 px-4 fw-bold">
                <i class="fa-solid fa-paper-plane me-1"></i> Update Assignment
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 250,
                placeholder: 'Write assignment description here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endpush
