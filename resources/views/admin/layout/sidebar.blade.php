<nav id="sidebar" class="d-flex flex-column flex-shrink-0">
    <div class="p-3 fs-4 fw-bold border-bottom border-secondary text-center d-flex justify-content-center align-items-center"
        style="height: 73px;">
        <span class="sidebar-text">School Portal</span>
        <i class="fa-solid fa-water d-none collapsed-show text-info"></i>
    </div>

    <ul class="nav flex-column mt-2 pb-4">
        <li class="nav-section-title">Overview</li>
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                <i class="fa-solid fa-house fa-fw"></i> <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-divider"></li>

        <li class="nav-section-title">Network Audit</li>

        {{-- school info dropdown menu --}}
        <li class="nav-item has-dropdown">
            <a href="{{ route('admin.school-info.index') }}" class="nav-link">
                <i class="fa-solid fa-school fa-fw"></i>
                <span>School Info</span>
                <i class="fa-solid fa-chevron-down dropdown-toggle-icon"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li><a href="{{ route('admin.school-info.index') }}">All School Info</a></li>
                <li><a href="{{ route('admin.school-info.create') }}">Add School Info</a></li>
            </ul>
        </li>

        {{-- classes dropdown menu --}}
        <li class="nav-item has-dropdown">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-chalkboard-user fa-fw"></i>
                <span>Classes</span>
                <i class="fa-solid fa-chevron-down dropdown-toggle-icon"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li><a href="{{ route('admin.classes.index') }}">All Classes</a></li>
                <li><a href="{{ route('admin.classes.create') }}">Add Class</a></li>
                <li><a href="#">Class Schedules</a></li>
            </ul>
        </li>

        {{-- arms dropdown menu --}}
        <li class="nav-item has-dropdown">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-chalkboard-user fa-fw"></i>
                <span>Arms/Stream</span>
                <i class="fa-solid fa-chevron-down dropdown-toggle-icon"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li><a href="{{ route('admin.arms.index') }}">All Arms/Streams</a></li>
                <li><a href="{{ route('admin.arms.create') }}">Add Arm/Stream</a></li>
            </ul>
        </li>
 
        
        {{-- subject dropdown menu --}}
        <li class="nav-item has-dropdown">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-book-open fa-fw"></i>
                <span>Subjects</span>
                <i class="fa-solid fa-chevron-down dropdown-toggle-icon"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li><a href="{{ route('admin.subjects.index') }}">All Subjects</a></li>
                <li><a href="{{ route('admin.subjects.create') }}">Add Subject</a></li>
                <li><a href="#">Subject Schedules</a></li>
            </ul>
        </li>


        {{--roles--}}
        <li class="nav-item has-dropdown">
            <a href="{{ route('admin.roles.index') }}" class="nav-link">
                <i class="fa-solid fa-school fa-fw"></i>
                <span>Roles</span>
                <i class="fa-solid fa-chevron-down dropdown-toggle-icon"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                <li><a href="{{ route('admin.roles.create') }}">Add Role</a></li>
            </ul>
        </li>



 {{-- staff management dropdown menu --}}
        <li class="nav-item has-dropdown">
            <a href="{{ route('admin.staff.management') }}" class="nav-link">
                <i class="fa-solid fa-users-gear fa-fw"></i>
                <span>Staff Management</span>
                <i class="fa-solid fa-chevron-down dropdown-toggle-icon"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                {{-- <li><a href="{{ route('admin.staff.management') }}">Add staff</a></li> --}}
                <li><a href="{{ route('admin.staff.index') }}">All Staff</a></li>
                <li><a href="{{ route('admin.staff.create') }}">Add Staff</a></li>
            </ul>
        </li>


        {{--Student management--}}
        <li class="nav-item has-dropdown">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user-graduate fa-fw"></i>
                <span>Students</span>
                <i class="fa-solid fa-chevron-down dropdown-toggle-icon"></i>
            </a>
            <ul class="sidebar-dropdown-menu">
                <li><a href="{{ route('admin.students.index') }}">All Students</a></li>
                <li><a href="{{ route('admin.students.create') }}">Add Student</a></li>
                {{-- generate promotion key --}}
                <li><a href="{{ route('admin.promote.key') }}">Promotion Keys</a></li>
                <li><a href="{{ route('admin.promote.index') }}">Promote / Demote</a></li>
            </ul>
        </li>

        {{-- add other menus / tabs here --}}


        {{-- end --}}

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-user-slash fa-fw"></i> <span>Banned Accounts</span>
            </a>
        </li>

        <li class="nav-divider"></li>

        <li class="nav-section-title">Financials</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-money-bill-transfer fa-fw"></i> <span>Manage Balances</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-wallet fa-fw"></i> <span>Withdrawal Requests</span>
            </a>
        </li>

        <li class="nav-divider"></li>

        <li class="nav-section-title">System</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa-solid fa-gear fa-fw"></i> <span>Settings</span>
            </a>
        </li>
    </ul>
</nav>