@extends('admin.layout.app')

@section('page_title', 'Edit Staff Member')

@section('content')
<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Edit Staff Member</h2>
            <p class="text-muted small mb-0">Update information for {{ $staff->name ?? 'Staff Member' }}.</p>
        </div>
        <a href="{{ route('admin.staff.index') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
            Back to List
        </a>
    </div>

    {{-- Error Display --}}
    @if ($errors->any())
        <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-12 col-lg-8 order-2 order-lg-1">
                {{-- Personal Information Card --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Personal Information</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label class="form-label fw-medium">Full Name</label>
                                <input type="text" name="name" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('name') is-invalid @enderror" value="{{ old('name', $staff->name) }}" required>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label class="form-label fw-medium">Email Address</label>
                                <input type="email" name="email" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('email') is-invalid @enderror" value="{{ old('email', $staff->email) }}" required>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label class="form-label fw-medium">Phone Number</label>
                                <input type="tel" name="phone" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('phone') is-invalid @enderror" value="{{ old('phone', $staff->phone) }}">
                            </div>

                            <div class="col-12 col-sm-6">
                                <label class="form-label fw-medium">is_enabled</label>
                                <select name="is_enabled" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="1" {{ old('is_enabled', $staff->is_enabled ?? 1) == 1 ? 'selected' : '' }}>Enabled</option>
                                    <option value="0" {{ old('is_enabled', $staff->is_enabled ?? 1) == 0 ? 'selected' : '' }}>Disabled</option>
                                </select>
                                <small class="text-muted">Disabled accounts cannot log in.</small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Role & Gender Card --}}
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Role & Gender</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label class="form-label fw-medium">Sex</label>
                                <select name="sex" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="male" {{ old('sex', $staff->sex) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('sex', $staff->sex) == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6">
                                <label class="form-label fw-medium">Role</label>
                                <select name="role" class="form-select bg-light border-0 py-2 px-3 rounded-3" required>
                                    <option value="">Select Role</option>
                                    @foreach(['Sub admin', 'Super admin', 'Teacher'] as $role)
                                        <option value="{{ $role }}" {{ old('role', $staff->role) == $role ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Photo & Submit --}}
            <div class="col-12 col-lg-4 order-1 order-lg-2">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Staff Photo</h5>
                    </div>
                    <div class="card-body text-center pb-4">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center shadow-sm border" style="width: 120px; height: 120px; overflow: hidden;" id="passportPreview">
                                @if(!empty($staff->photo) && \Storage::exists($staff->photo))
                                    <img src="{{ \Storage::url($staff->photo) }}" alt="Profile" style="width: 100%; height: 100%; object-fit: cover;" id="currentPhoto">
                                @else
                                    <img src="{{ asset('defaults/user.png') }}" alt="Default" style="width: 100%; height: 100%; object-fit: cover;" id="currentPhoto">
                                @endif
                            </div>
                        </div>
                        <div class="px-2 px-md-3">
                            <p class="text-muted small mb-3">Max 75KB (JPG/PNG). Leave empty to keep current.</p>
                            <input type="file" name="photo" id="photo" class="form-control form-control-sm border-0 bg-light rounded-3" accept="image/jpeg,image/png" onchange="previewImage(event)">
                            <small id="fileSizeError" class="text-danger d-none mt-1">File size exceeds 75KB. Please choose a smaller image.</small>
                        </div>
                    </div>
                </div>

                <div class="card border-0 bg-primary text-white shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">Save Changes?</h6>
                        <p class="small opacity-75 mb-4">Click below to update this staff record.</p>
                        <button type="submit" class="btn btn-light text-primary fw-bold w-100 py-2 rounded-3">
                            Update Staff Member
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
    const imgElement = document.getElementById('currentPhoto');

    if (file) {
        if (file.size > 75 * 1024) {
            errorSpan.classList.remove('d-none');
            event.target.value = '';
            return;
        } else {
            errorSpan.classList.add('d-none');
        }

        if (!file.type.startsWith('image/')) {
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            if (imgElement) {
                imgElement.src = e.target.result;
            }
        };
        reader.readAsDataURL(file);
    } else {
        if (imgElement && "{{ $staff->photo }}") {
            imgElement.src = "{{ \Storage::url($staff->photo) }}";
        } else if (imgElement) {
            imgElement.src = "{{ asset('defaults/user.png') }}";
        }
        errorSpan.classList.add('d-none');
    }
}
</script>
@endsection
