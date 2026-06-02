@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Gallery Details')
@section('content')

    <div class="container-fluid py-2">
        <div class="mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Gallery Details" }}</h2>
            <p class="text-muted small mb-0"></p>
        </div>

        <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">Gallery Details</h5>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
            </div>
            
            <div class="card-body p-3 p-md-4">
                <div class="row g-4">
                    {{-- Details Section --}}
                    <div class="col-md-8">
                        <h4 class="fw-bold text-dark mb-3">{{ $gallery->title }}</h4>
                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Description</h6>
                            <div class="text-muted p-3 bg-light rounded" style="min-height: 120px; white-space: pre-wrap;">
                                {{ $gallery->description ?? 'No description available.' }}
                            </div>
                        </div>
                    </div>

                    {{-- Status/Actions Sidebar --}}
                    <div class="col-md-4">
                        <div class="card rounded shadow-sm border-0 bg-light mb-3">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <small class="text-muted">Status</small>
                                    @if ($gallery->is_enabled)
                                        <span class="badge bg-success">Enabled</span>
                                    @else
                                        <span class="badge bg-secondary">Disabled</span>
                                    @endif
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <small class="text-muted">Created At</small>
                                    <strong class="text-dark small">
                                        {{ $gallery->created_at ? $gallery->created_at->format('d M, Y h:i A') : '—' }}
                                    </strong>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="{{ route('admin.galleries.edit', $gallery->id) }}" class="btn btn-primary">
                                <i class="fa-solid fa-pencil me-2"></i>Edit Gallery
                            </a>
                        </div>
                    </div>

                    {{-- Images Grid Section --}}
                    <div class="col-12 mt-4">
                        <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">
                        Images ({{ $gallery->images ? count($gallery->images) : 0 }})
                        </h5>

                        <div class="row g-3">
                            @if ($gallery->images && count($gallery->images) > 0)
                                @foreach ($gallery->images as $img)
                                    <div class="col-6 col-sm-4 col-md-3">
                                        <div class="card h-100 border p-1 shadow-sm gallery-item">
                                            <a href="{{ asset($img) }}" target="_blank">
                                                <img src="{{ asset($img) }}"
                                                    alt="{{ $gallery->title }}"
                                                    class="card-img-top rounded img-fluid"
                                                    style="height: 180px; object-fit: cover; transition: transform 0.2s;">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center py-5 bg-light rounded text-muted">
                                    <i class="fa-solid fa-image fa-3x mb-2 text-secondary"></i>
                                    <p class="mb-0">No images in this gallery.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
