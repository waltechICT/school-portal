@extends('admin.layout.app')

{{-- page title --}}
@section('page_title', 'Edit Portfolio Details')

@section('content')

    <div class="container-fluid py-2">
        <div class="mb-4">
            <h2 class="fs-4 fw-bold text-dark mb-1">Edit Portfolio Details</h2>
            <p class="text-muted small mb-0">Update the information for "{{ $portfolio->title }}"</p>
        </div>

        <div class="card border border-light shadow-sm rounded-4 overflow-hidden">
            <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
                <h5 class="fw-bold text-dark mb-0 fs-6">Portfolio Details</h5>
                <a href="{{ route('admin.portfolio.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i> Back to List
                </a>
            </div>

            <div class="card-body p-4">
                {{-- FIX: Added the portfolio ID to the route --}}
                <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 row">
                        {{-- Portfolio Title --}}
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <label for="title" class="input-group-text col-form-label">Portfolio Name</label>
                                {{-- FIX: Changed name="name" to name="title" to match Controller & Migration --}}
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $portfolio->title) }}" placeholder="Enter portfolio title" required>
                            </div>
                            @error('title')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Is Enabled --}}
                        <div class="col-12">
                            <div class="input-group">
                                <label for="is_enabled" class="input-group-text col-form-label">Is Enabled?</label>
                                <select name="is_enabled" id="is_enabled"
                                    class="form-select @error('is_enabled') is-invalid @enderror" required>
                                    {{-- FIX: Changed $subject to $portfolio --}}
                                    <option value="1" {{ old('is_enabled', $portfolio->is_enabled) == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_enabled', $portfolio->is_enabled) == 0 ? 'selected' : '' }}>No</option>
                                </select>
                            </div>
                            @error('is_enabled')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save"></i> Update Changes To Portfolio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection