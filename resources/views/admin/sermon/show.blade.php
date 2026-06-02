@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Sermon Details')
@section('content')

    <div class="container-fluid py-2">
        <div class="mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-1">{{ "Sermon Details" }}</h2>
            <p class="text-muted small mb-0"></p>

        </div>

        <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">Sermon Details</h5>
                <a href="{{ route('admin.sermons.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
            </div>
            
            <div class="card-body p-3 p-md-4">
                <div class="row">
                    {{-- Left section: Image + Info --}}
                    <div class="col-md-4">
                        @if ($sermon->image)
                            <div class="mb-3">
                                <img src="{{ asset($sermon->image) }}"
                                    alt="{{ $sermon->title }}"
                                    class="img-fluid rounded w-100"
                                    style="max-height: 300px; object-fit: cover;">
                            </div>
                        @endif

                        <div class="card rounded shadow-sm border-0">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <small class="text-muted">Status</small>
                                    @if ($sermon->is_enabled)
                                        <span class="badge bg-success">Enabled</span>
                                    @else
                                        <span class="badge bg-secondary">Disabled</span>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <small class="text-muted">Date</small>
                                    <strong class="text-dark">
                                        {{ $sermon->date ? \Carbon\Carbon::parse($sermon->date)->format('d M, Y') : '—' }}
                                    </strong>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <small class="text-muted">Video URL</small>
                                    @if ($sermon->video_url)
                                        <a href="{{ $sermon->video_url }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-play"></i> Open
                                        </a>
                                    @else
                                        <small class="text-muted">—</small>
                                    @endif
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <small class="text-muted">Audio URL</small>
                                    @if ($sermon->audio_url)
                                        <a href="{{ $sermon->audio_url }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-secondary">
                                            <i class="fa-solid fa-volume-up"></i> Play
                                        </a>
                                    @else
                                        <small class="text-muted">—</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right section: Details --}}
                    <div class="col-md-8">
                        <h4 class="fw-bold text-dark mb-3">
                            {{ $sermon->title }}
                        </h4>

                        <div class="mb-4">
                            <h6 class="text-muted mb-1">Speaker</h6>
                            <p class="lead mb-0">
                                {{ $sermon->speaker ?? '—' }}
                            </p>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted mb-1">Scripture</h6>
                            <p class="mb-0">
                                {{ $sermon->scripture ?? '—' }}
                            </p>
                        </div>

                        <div>
                            <h6 class="text-muted mb-1">Description</h6>
                            <p class="text-muted">
                                {!! nl2br(e($sermon->description ?? 'No description available.')) !!}
                            </p>
                        </div>

                        {{-- edit button --}}
                        <div class="mt-4 pt-4 border-top">
                            <a href="{{ route('admin.sermons.edit', $sermon->id) }}"
                            class="btn btn-primary">
                                <i class="fa-solid fa-pencil"></i> Edit Sermon
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection