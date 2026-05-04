@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'View Notice')
@section('content')

<div class="container-fluid py-2">
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">Notice Details</h2>
            <p class="text-muted small mb-0">Viewing details for notice ID: #{{ $notice->id }}</p>
        </div>
        <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border border-light shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <span class="text-uppercase text-muted small fw-bold">Notice Title</span>
                        <h3 class="text-dark mt-1">{{ $notice->title }}</h3>
                    </div>

                    <div class="mb-4">
                        <span class="text-uppercase text-muted small fw-bold">Description</span>
                        {{-- 
                            FIX: Using {!! !!} to render colors, bold, and underline.
                            We removed 'white-space: pre-wrap' to let Summernote's HTML handle the layout.
                        --}}
                        <div class="mt-2 text-dark notice-render-area" style="line-height: 1.6;">
                            {!! $notice->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border border-light shadow-sm rounded-4">
                <div class="card-header bg-white p-4 border-bottom">
                    <h5 class="fw-bold text-dark mb-0 fs-6">Information</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="text-muted small d-block">Status</label>
                        @if($notice->is_enabled)
                            <span class="badge bg-success">Enabled / Visible</span>
                        @else
                            <span class="badge bg-secondary">Disabled / Hidden</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small d-block">Created At</label>
                        <span class="text-dark fw-medium">{{ $notice->created_at->format('M d, Y h:i A') }}</span>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small d-block">Last Updated</label>
                        <span class="text-dark fw-medium">{{ $notice->updated_at->format('M d, Y h:i A') }}</span>
                    </div>

                    <hr>

                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.notices.edit', $notice->id) }}" class="btn btn-warning text-white">
                            <i class="fa-solid fa-pencil"></i> Edit Notice
                        </a>
                        <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">
                                <i class="fa-solid fa-trash"></i> Delete Notice
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
    .notice-render-area img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }
    /* Ensure underlined text displays properly */
    .notice-render-area u {
        text-decoration: underline;
    }
</style>
@endpush

@endsection