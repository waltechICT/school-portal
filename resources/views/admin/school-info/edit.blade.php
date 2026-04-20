@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'Edit School Info')
@section('content')

<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Edit School Info</h2>
            <p class="text-muted small mb-0">Update the information for {{ $school_info->school_name }}.</p>
        </div>
        <a href="{{ route('admin.school-info.index') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
            Back to List
        </a>
    </div>

    <form action="{{ route('admin.school-info.update', $school_info->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-12 col-lg-8 order-2 order-lg-1">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">General Information</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label for="educational_level" class="form-label fw-medium">Educational Level</label>
                                <select name="educational_level" id="educational_level" class="form-select bg-light border-0 py-2 px-3 rounded-3 @error('educational_level') is-invalid @enderror">
                                    <option value="">Select Educational Level</option>
                                    @foreach($educational_levels as $educational_level)
                                        <option value="{{ $educational_level->id }}" {{ old('educational_level', $school_info->educational_level_id) == $educational_level->id ? 'selected' : '' }}>{{ $educational_level->name }}</option>
                                    @endforeach
                                </select>
                                @error('educational_level')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="school_name" class="form-label fw-medium">School Name</label>
                                <input type="text" name="school_name" id="school_name" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('school_name') is-invalid @enderror" value="{{ old('school_name', $school_info->school_name) }}" placeholder="Enter school name">
                                @error('school_name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="school_phone" class="form-label fw-medium">School Phone</label>
                                <input type="text" name="school_phone" id="school_phone" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('school_phone') is-invalid @enderror" value="{{ old('school_phone', $school_info->school_phone) }}" placeholder="Enter phone number">
                                @error('school_phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="school_email" class="form-label fw-medium">School Email</label>
                                <input type="email" name="school_email" id="school_email" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('school_email') is-invalid @enderror" value="{{ old('school_email', $school_info->school_email) }}" placeholder="Enter email address">
                                @error('school_email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="is_enabled" class="form-label fw-medium">Status</label>
                                <select name="is_enabled" id="is_enabled" class="form-select bg-light border-0 py-2 px-3 rounded-3 @error('is_enabled') is-invalid @enderror">
                                    <option value="1" {{ old('is_enabled', $school_info->is_enabled) == '1' ? 'selected' : '' }}>Enabled</option>
                                    <option value="0" {{ old('is_enabled', $school_info->is_enabled) == '0' ? 'selected' : '' }}>Disabled</option>
                                </select>
                                @error('is_enabled')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Detailed Description</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="school_address" class="form-label fw-medium">School Address</label>
                                <textarea name="school_address" id="school_address" rows="3" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('school_address') is-invalid @enderror" placeholder="Enter school address">{{ old('school_address', $school_info->school_address) }}</textarea>
                                @error('school_address')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="school_about" class="form-label fw-medium">School About</label>
                                <textarea name="school_about" id="school_about" rows="4" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('school_about') is-invalid @enderror" placeholder="Write something about the school...">{{ old('school_about', $school_info->school_about) }}</textarea>
                                @error('school_about')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 order-1 order-lg-2">
                <div class="card border-0 bg-primary text-white shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">Save Changes?</h6>
                        <p class="small opacity-75 mb-4">You are about to update the record. Make sure the properties are accurate before saving.</p>
                        <button type="submit" class="btn btn-light text-primary fw-bold w-100 py-2 rounded-3">
                            Update School Info
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection