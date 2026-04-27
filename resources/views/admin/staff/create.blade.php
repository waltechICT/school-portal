@extends('admin.layout.app')

@section('page_title', 'Add New Staff')

@section('content')

<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Add New Staff Member</h2>
            <p class="text-muted small mb-0">Fill out the form below to create a new staff record.</p>
        </div>
        <a href="{{ route('admin.staff.index') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
            Back to List
        </a>
    </div>

    {{-- Error Display --}}
    @if ($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-4 mb-4">
            <ul class="mb-0 small">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            <div class="col-12 col-lg-8 order-2 order-lg-1">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Personal & Contact Information</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label for="name" class="form-label fw-medium">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter full name" required>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="email" class="form-label fw-medium">Email Address</label>
                                <input type="email" name="email" id="email" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="staff@school.com" required>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="phone" class="form-label fw-medium">Phone Number</label>
                                <input type="tel" name="phone" id="phone" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('phone') is-invalid @enderror" value="{{ old('phone') }}" placeholder="e.g. 08123456789">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="is_enabled" class="form-label fw-medium">is_enabled?</label>
                                <select name="is_enabled" id="is_enabled" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="1" {{ old('is_enabled') == '1' ? 'selected' : '' }}>Enabled</option>
                                    <option value="0" {{ old('is_enabled') == '0' ? 'selected' : '' }}>Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Account Security & Role</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label for="role" class="form-label fw-medium">Role</label>
                                <select name="role" id="role" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="">Select Role</option>
                                    @foreach(['Sub admin', 'Super admin', 'Teacher'] as $role)
                                        <option value="{{ $role }}" {{ old('role') == $role ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label for="password" class="form-label fw-medium">Account Password</label>
                                <input type="password" name="password" id="password" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('password') is-invalid @enderror" placeholder="••••••••" required>
                            </div>


                            <div class="col-12 col-sm-6">
                                <label for="sex" class="form-label fw-medium">Sex</label>
                                <select name="sex" id="sex" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="">Select Sex</option>
                                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4 order-1 order-lg-2">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Staff Passport</h5>
                    </div>
                    <div class="card-body text-center pb-4">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center shadow-sm border" style="width: 120px; height: 120px; overflow: hidden;" id="passportPreview">
                                <i class="fa-solid fa-user-tie text-muted fs-1"></i>
                            </div>
                        </div>
                        <div class="px-2 px-md-3">
                            <p class="text-muted small mb-3">Max 75KB (JPG/PNG)</p>
                            <input type="file" name="photo" id="photo" class="form-control form-control-sm border-0 bg-light rounded-3" accept="image/jpeg,image/png" onchange="previewImage(event)">
                            <small id="fileSizeError" class="text-danger d-none mt-1">File size exceeds 75KB. Please choose a smaller image.</small>
                        </div>
                    </div>
                </div>

                <div class="card border-0 bg-primary text-white shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4 text-center">
                        <h6 class="fw-bold mb-3">Save Profile?</h6>
                        <button type="submit" class="btn btn-light text-primary fw-bold w-100 py-2 rounded-3 shadow-sm">
                            <i class="fa-solid fa-user-plus me-2"></i>Create Staff Member
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const errorSpan = document.getElementById('fileSizeError');
    const previewDiv = document.getElementById('passportPreview');

    if (file) {
        // Check file size (75KB = 75 * 1024 bytes)
        if (file.size > 75 * 1024) {
            errorSpan.classList.remove('d-none');
            // Reset preview to default icon
            previewDiv.innerHTML = `<i class="fa-solid fa-user-tie text-muted fs-1"></i>`;
            // Clear the file input so it won't be submitted
            event.target.value = '';
            return;
        } else {
            errorSpan.classList.add('d-none');
        }

        // Check if it's an image
        if (!file.type.startsWith('image/')) {
            previewDiv.innerHTML = `<i class="fa-solid fa-user-tie text-muted fs-1"></i>`;
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            previewDiv.innerHTML = `<img src="${e.target.result}" style="width: 100%; height: 100%; object-fit: cover;">`;
        };
        reader.readAsDataURL(file);
    } else {
        // Reset to default icon if no file selected
        previewDiv.innerHTML = `<i class="fa-solid fa-user-tie text-muted fs-1"></i>`;
        errorSpan.classList.add('d-none');
    }
}
</script>

@endsection
