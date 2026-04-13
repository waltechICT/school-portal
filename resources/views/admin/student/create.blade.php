@extends('admin.layout.app')
{{-- page title --}}
@section('page_title', 'New Student')
@section('content')

<div class="container-fluid py-3 py-md-4">
    <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fs-4 fs-md-3 fw-bold text-dark mb-1">Create New Student</h2>
            <p class="text-muted small mb-0">Fill in the details below to register a new student.</p>
        </div>
        <a href="{{ route('admin.students.index') }}" class="btn btn-outline-secondary rounded-3 shadow-sm">
            Back to List
        </a>
    </div>

    <form action="{{ route('admin.students.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row g-4">
            {{-- Left Column: Personal & Academic Info --}}
            <div class="col-12 col-lg-8 order-2 order-lg-1">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Personal Information</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label for="student_id" class="form-label fw-medium">Student ID</label>
                                <input type="text" name="student_id" id="student_id" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('student_id') is-invalid @enderror" value="{{ old('student_id') }}" placeholder="e.g. 123456789" required>
                                @error('student_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="admission_no" class="form-label fw-medium">Admission/Reg No.</label>
                                <input type="text" name="admission_no" id="admission_no" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('admission_no') is-invalid @enderror" value="{{ old('admission_no') }}" placeholder="e.g. 123456789" required>
                                @error('admission_no') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="surname" class="form-label fw-medium">Surname</label>
                                <input type="text" name="surname" id="surname" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('surname') is-invalid @enderror" value="{{ old('surname') }}" placeholder="Enter surname" required>
                                @error('surname') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="other_names" class="form-label fw-medium">Other Names</label>
                                <input type="text" name="other_names" id="other_names" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('other_names') is-invalid @enderror" value="{{ old('other_names') }}" placeholder="Enter other names" required>
                                @error('other_names') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="is_enabled" class="form-label fw-medium">Status</label>
                                <select name="is_enabled" id="is_enabled" class="form-select bg-light border-0 py-2 px-3 rounded-3 @error('is_enabled') is-invalid @enderror" required>
                                    <option value="">Select Status</option>
                                    <option value="1" {{ old('is_enabled') == '1' ? 'selected' : '' }}>Enabled</option>
                                    <option value="0" {{ old('is_enabled') == '0' ? 'selected' : '' }}>Disabled</option>
                                </select>
                                @error('is_enabled') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-4">
                                <label for="sex" class="form-label fw-medium">Sex</label>
                                <select name="sex" id="sex" class="form-select bg-light border-0 py-2 px-3 rounded-3 @error('sex') is-invalid @enderror" required>
                                    <option value="">Select Sex</option>
                                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('sex') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-8">
                                <label for="date_of_birth" class="form-label fw-medium">Date of Birth</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}" required>
                                @error('date_of_birth') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Academic & Guardian Details</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <label for="class_id" class="form-label fw-medium">Class</label>
                                <select name="class_id" id="class_id" class="form-select bg-light border-0 py-2 px-3 rounded-3 @error('class_id') is-invalid @enderror" required>
                                    <option value="">Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                                @error('class_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="arm_id" class="form-label fw-medium">Arm/stream</label>
                                <select name="arm_id" id="arm_id" class="form-select bg-light border-0 py-2 px-3 rounded-3 @error('arm_id') is-invalid @enderror" required>
                                    <option value="">Select Arm/stream</option>
                                    @foreach($arms as $arm)
                                        <option value="{{ $arm->id }}" {{ old('arm_id') == $arm->id ? 'selected' : '' }}>{{ $arm->name }}</option>
                                    @endforeach
                                </select>
                                @error('arm_id') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12"><hr class="text-muted opacity-25 my-1"></div>
                            <div class="col-12 col-sm-6">
                                <label for="guardian_name" class="form-label fw-medium">Guardian Name</label>
                                <input type="text" name="guardian_name" id="guardian_name" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('guardian_name') is-invalid @enderror" value="{{ old('guardian_name') }}" placeholder="Full name of guardian" required>
                                @error('guardian_name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="guardian_phone" class="form-label fw-medium">Guardian Phone</label>
                                <input type="text" name="guardian_phone" id="guardian_phone" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('guardian_phone') is-invalid @enderror" value="{{ old('guardian_phone') }}" placeholder="Phone number" required>
                                @error('guardian_phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="guardian_occupation" class="form-label fw-medium">Guardian Occupation</label>
                                <input type="text" name="guardian_occupation" id="guardian_occupation" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('guardian_occupation') is-invalid @enderror" value="{{ old('guardian_occupation') }}" placeholder="Occupation" required>
                                @error('guardian_occupation') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="guardian_address" class="form-label fw-medium">Guardian Address</label>
                                <textarea name="guardian_address" id="guardian_address" class="form-control bg-light border-0 py-2 px-3 rounded-3 @error('guardian_address') is-invalid @enderror" placeholder="Home address" required>{{ old('guardian_address') }}</textarea>
                                @error('guardian_address') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Passport & Actions --}}
            <div class="col-12 col-lg-4 order-1 order-lg-2">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white py-3 border-bottom-0">
                        <h5 class="card-title mb-0 fw-bold">Passport Photo</h5>
                    </div>
                    <div class="card-body text-center pb-4">
                        <div class="mb-3 d-flex justify-content-center">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center shadow-sm border" style="width: 120px; height: 120px; overflow: hidden;" id="passportPreview">
                                <i class="fa-solid fa-user text-muted fs-1"></i>
                            </div>
                        </div>
                        <div class="px-2 px-md-3">
                            <p class="text-muted small mb-3">Upload a passport-sized photo (Max 2MB, JPEG/PNG)</p>
                            <input type="file" name="student_passport" id="student_passport" class="form-control form-control-sm border-0 bg-light rounded-3 @error('student_passport') is-invalid @enderror" required onchange="previewImage(event)">
                            @error('student_passport') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>

                <div class="card border-0 bg-primary text-white shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">Ready to Save?</h6>
                        <p class="small opacity-75 mb-4">By clicking submit, the student will be added to the portal and academic records will be saved.</p>
                        <button type="submit" class="btn btn-light text-primary fw-bold w-100 py-2 rounded-3">
                            Register Student
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const output = document.getElementById('passportPreview');
        output.innerHTML = `<img src="${reader.result}" style="width: 100%; height: 100%; object-fit: cover;">`;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection