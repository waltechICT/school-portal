@extends('admin.layout.app')

@section('page_title', 'Promotion & Demotion')

@section('content')
<div class="container-fluid py-2">

    <div class="mb-4 d-flex flex-wrap gap-2 justify-content-between align-items-start">
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-1">Student Promotion & Demotion</h2>
            <p class="text-muted small mb-0">Select a class to view its students, then promote or demote them.</p>
        </div>
        
        <form action="{{ route('admin.promote.initiate') }}" method="POST" id="initiatePromotionForm">
            @csrf
            <input type="hidden" name="key" id="promotionKeyInput">
            <button type="button" class="btn btn-sm btn-dark" onclick="promptPromotionKey()">
                <i class="fa-solid fa-flag-checkered me-1"></i>Initiate Promotion
            </button>
        </form>
    </div>

    

    <div class="card border border-light shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white p-3 border-bottom">
            <h5 class="fw-bold text-dark mb-0 fs-6">
                <i class="fa-solid fa-filter me-2 text-primary"></i>Select Class
            </h5>
        </div>
        <div class="card-body p-3">
            <form method="GET" action="{{ route('admin.promote.index') }}" class="row g-3 align-items-end">
                <div class="col-12 col-md-5">
                    <label for="class_id" class="form-label fw-medium small mb-1">Class</label>
                    <select name="class_id" id="class_id" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">-- Choose a class --</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ $selectedClass == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.promote.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fa-solid fa-xmark me-1"></i>Clear
                    </a>
                </div>
            </form>
        </div>
    </div>

    @if($selectedClass)
        @if($students->isEmpty())
            <div class="alert alert-warning">
                <i class="fa-solid fa-users-slash me-2"></i>No students found in this class.
            </div>
        @else
        @php $allPromoted = $students->every('is_promoted'); @endphp

        <form id="promotionForm" method="POST" action="{{ route('admin.promote.promote') }}">
            @csrf

            <div class="card border border-light shadow-sm rounded-4 overflow-hidden">

                <div class="card-header bg-white p-3 p-md-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <h5 class="fw-bold text-dark mb-0 fs-6">
                        Students in
                        <span class="text-primary">{{ $students->first()->schoolClass?->name ?? 'Unknown' }}</span>
                        <span class="badge bg-secondary ms-2">{{ $students->count() }}</span>
                    </h5>
                    <div class="form-check mb-0">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label small fw-medium" for="selectAll">Select All</label>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-3 py-3" style="width:44px;">☐</th>
                                    <th class="px-3 py-3">#</th>
                                    <th class="px-3 py-3">Student</th>
                                    <th class="px-3 py-3 d-none d-md-table-cell">Admission No.</th>
                                    <th class="px-3 py-3 d-none d-lg-table-cell">Current Class</th>
                                    <th class="px-3 py-3 d-none d-lg-table-cell">Arm</th>
                                    <th class="px-3 py-3">Is Promoted</th>
                                    <th class="px-3 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $key => $student)
                                <tr class="{{ $student->is_promoted ? 'opacity-75' : '' }}">
                                    <td class="px-3 py-2">
                                        <input class="form-check-input student-cb"
                                               type="checkbox"
                                               name="student_ids[]"
                                               value="{{ $student->id }}"
                                               @if($student->is_promoted) title="Promoted — can demote" @endif>
                                    </td>
                                    <td class="px-3 py-2 text-muted small">{{ $key + 1 }}</td>
                                    <td class="px-3 py-2">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ asset($student->student_passport ?? 'uploads/students/default.png') }}"
                                                 alt="{{ $student->surname }}"
                                                 class="rounded-circle border shadow-sm"
                                                 style="width:38px;height:38px;object-fit:cover;flex-shrink:0;">
                                            <div>
                                                <p class="mb-0 fw-medium small text-nowrap">
                                                    {{ $student->surname }} {{ $student->other_names }}
                                                </p>
                                                <p class="mb-0 text-muted" style="font-size:0.73rem;">
                                                    {{ $student->student_id }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 small d-none d-md-table-cell">{{ $student->admission_no }}</td>
                                    <td class="px-3 py-2 small d-none d-lg-table-cell">{{ $student->schoolClass?->name ?? 'N/A' }}</td>
                                    <td class="px-3 py-2 small d-none d-lg-table-cell">{{ $student->arm?->name ?? 'N/A' }}</td>
                                    <td class="px-3 py-2">
                                        @if($student->is_promoted)
                                            <span class="badge bg-success">Promoted</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Not Promoted</span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2">
                                        <a href="{{ route('admin.students.show', $student->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa-solid fa-eye me-1"></i>View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer bg-white p-3 border-top">
                    <div class="row g-2 align-items-end">
                        <div class="col-12 col-md-5">
                            <label for="target_class_select" class="form-label fw-medium small mb-1">
                                Target Class <span class="text-danger">*</span>
                            </label>
                            <select name="target_class_id" id="target_class_select" class="form-select form-select-sm" required>
                                <option value="">-- Select target class --</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-7 d-flex flex-wrap gap-2 pt-md-3">
                                    @if(!$allPromoted)
                                    <button type="submit" formaction="{{ route('admin.promote.promote') }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure you want to promote the selected students?')">
                                        <i class="fa-solid fa-circle-arrow-up me-1"></i>Promote Selected
                                    </button>
                                    @endif
                            <button type="submit" formaction="{{ route('admin.promote.demote') }}" class="btn btn-sm btn-warning" onclick="return confirm('Are you sure you want to demote the selected students?')">
                                <i class="fa-solid fa-circle-arrow-down me-1"></i>Demote Selected
                            </button>
                            <span class="text-muted small align-self-center ms-1" id="selectedCount">0 selected</span>
                        </div>
                    </div>
                </div>

            </div>
        </form>

        @endif
    @else
        <div class="card border border-light shadow-sm rounded-4">
            <div class="card-body text-center py-5 text-muted">
                <i class="fa-solid fa-hand-pointer fa-2x mb-3 text-primary opacity-50 d-block"></i>
                <p class="mb-0">Select a class above to load its students.</p>
            </div>
        </div>
    @endif

    <script>
        function promptPromotionKey() {
            let key = prompt("Enter key to confirm:");
            if (key !== null && key.trim() !== '') {
                document.getElementById('promotionKeyInput').value = key;
                document.getElementById('initiatePromotionForm').submit();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('change', function(e) {
                
                if (e.target.id === 'selectAll') {
                    const isChecked = e.target.checked;
                    document.querySelectorAll('.student-cb').forEach(cb => {
                        cb.checked = isChecked;
                    });
                    updateSelectedCount();
                }
                
                
                
                if (e.target.classList.contains('student-cb')) {
                    updateSelectedCount();
                    
                    if (!e.target.checked) {
                        const selectAllBtn = document.getElementById('selectAll');
                        if (selectAllBtn) selectAllBtn.checked = false;
                    }
                }
            });

            function updateSelectedCount() {
                const countDisplay = document.getElementById('selectedCount');
                if (countDisplay) {
                    const count = document.querySelectorAll('.student-cb:checked').length;
                    countDisplay.innerText = count + ' selected';
                }
            }

            
            
            setTimeout(updateSelectedCount, 100)
        });
    </script>

</div> 
@endsection