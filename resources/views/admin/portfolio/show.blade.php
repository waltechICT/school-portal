@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'Portfolio Details')

@section('content')

<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">Portfolio Details</h2>
        <p class="text-muted small mb-0">Viewing detailed information for this project.</p>
    </div>

    <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0 fs-6">Portfolio Overview</h5>
            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Back to List
            </a>
        </div>
        
        <div class="card-body p-4">
            <div class="row">
                {{-- Left Column: Passport Image, Title, and Status --}}
                <div class="col-md-3 border-end text-center">
                    {{-- Anonymous Individual Passport Placeholder --}}
                    <div class="rounded-3 shadow-sm border d-flex align-items-center justify-content-center bg-secondary-subtle mx-auto mb-3" 
                         style="width: 130px; height: 160px; border: 2px solid #dee2e6 !important; overflow: hidden;">
                        {{-- SVG for Anonymous User --}}
                        <svg viewBox="0 0 24 24" fill="currentColor" class="text-secondary opacity-50" style="width: 80%; height: 80%;">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>

                    {{-- Title and Status directly under image --}}
                    <h4 class="fw-bold text-dark mb-1">{{ $portfolio->title }}</h4>
                    <div class="mb-3">
                        @if ($portfolio->is_enabled)
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3">Enabled</span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-3">Disabled</span>
                        @endif
                    </div>
                </div>

                {{-- Right Column: Description and Meta Details --}}
                <div class="col-md-9 ps-md-5">
                    <div class="mb-4">
                        <label class="text-muted fw-bold small text-uppercase mb-2 d-block">Description</label>
                        <p class="text-dark fs-6" style="line-height: 1.6;">
                            {{ $portfolio->description ?? 'No description provided for this portfolio project.' }}
                        </p>
                    </div>

                    <div class="row pt-3 border-top">
                        <div class="col-sm-6">
                            <label class="text-muted small d-block mb-1">Date Created</label>
                            <p class="fw-medium text-dark"><i class="fa-regular fa-calendar-check me-2"></i>{{ $portfolio->created_at->format('M d, Y') }}</p>
                        </div>
                        <div class="col-sm-6">
                            <label class="text-muted small d-block mb-1">Last Updated</label>
                            <p class="fw-medium text-dark"><i class="fa-regular fa-clock me-2"></i>{{ $portfolio->updated_at->format('M d, Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 pt-4 border-top d-flex gap-2">
                <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-warning px-4">
                    <i class="fa-solid fa-pencil me-2"></i> Edit Portfolio
                </a>
                
                <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" onsubmit="return confirm('Permanently delete this project?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger px-4">
                        <i class="fa-solid fa-trash me-2"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection