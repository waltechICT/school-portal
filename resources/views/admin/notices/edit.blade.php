@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'Edit Notice')

@section('content')

{{-- 1. Styles inside the content section --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-editor.note-frame { border: 1px solid #ced4da !important; border-radius: 0.375rem !important; }
    .note-editable { background: #fff !important; }
</style>

<div class="container-fluid py-2">
    <div class="mb-4">
        {{-- Changed Title --}}
        <h2 class="fs-4 fw-bold text-dark mb-1">Edit Notice</h2>
        <p class="text-muted small mb-0">Update the details below to modify the notice.</p>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        {{-- UPDATE: Route points to update, and we add the ID --}}
        <form action="{{ route('admin.notices.update', $notice->id) }}" method="POST">
            @csrf
            {{-- UPDATE: Laravel requires @method('PUT') or @method('PATCH') for updates --}}
            @method('PUT')

            <div class="card-body p-4">
                {{-- Title Input --}}
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Notice Title</label>
                    {{-- UPDATE: value now shows old input OR existing title --}}
                    <input type="text" name="title" value="{{ old('title', $notice->title) }}" id="title" class="form-control @error('title') is-invalid @enderror" required>
                    @error('title')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Description Textarea with Summernote --}}
                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    {{-- UPDATE: Content goes between textarea tags --}}
                    <textarea name="description" id="summernote_editor" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $notice->description) }}</textarea>
                    @error('description')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div> 

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.notices.index') }}" class="btn btn-light px-4">Cancel</a>
                    <button type="submit" class="btn btn-primary px-4">Update Notice</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- 2. Scripts included directly --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    (function($) {
        $(document).ready(function() {
            $('#summernote_editor').summernote({
                placeholder: 'Update your notice content here...',
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