@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'New Notice')

@section('content')

{{-- 1. Styles inside the content section to bypass layout issues --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-editor.note-frame { border: 1px solid #ced4da !important; border-radius: 0.375rem !important; }
    .note-editable { background: #fff !important; }
</style>

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Create New Notice" }}</h2>
        <p class="text-muted small mb-0">Fill out the details below to publish a new notice.</p>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <form action="{{ route('admin.notices.store') }}" method="POST">
            @csrf
            <div class="card-body p-4">
                <div class="mb-3">
                    <label for="title" class="form-label">Notice Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" id="title" class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="summernote_editor" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div> 

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.notices.index') }}" class="btn btn-light">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create Notice</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- 2. Scripts included directly to ensure they load --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    (function($) {
        $(document).ready(function() {
            $('#summernote_editor').summernote({
                placeholder: 'Enter notice description here...',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    })(jQuery);
</script>

@endsection