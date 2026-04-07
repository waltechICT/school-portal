@extends('admin.layout.app')

@section('content')
<div class="container-fluid py-2">
    <div class="mb-4">
        <h2 class="fs-4 fw-bold text-dark mb-1">{{ __('Dashboard Overview') }}</h2>
        <p class="text-muted small mb-0">Welcome back, {{ Auth::user()->name }}! Here is your system health.</p>
    </div>

    <div class="row g-4 mb-4">
        
        <div class="col-12 col-md-6">
            <div class="card border border-light shadow-sm rounded-4 h-100 p-4">
                <div class="d-flex align-items-center">
                    <div class="p-3 rounded-3 bg-primary bg-opacity-10 text-primary me-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-users fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small fw-bold text-uppercase tracking-wide mb-1">Total Users</p>
                        <h3 class="fs-3 fw-bold text-dark mb-0">{{ number_format(5) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border border-light shadow-sm rounded-4 h-100 p-4">
                <div class="d-flex align-items-center">
                    <div class="p-3 rounded-3 bg-success bg-opacity-10 text-success me-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-box-open fs-3"></i>
                    </div>
                    <div>
                        <p class="text-muted small fw-bold text-uppercase tracking-wide mb-1">Total Products</p>
                        <h3 class="fs-3 fw-bold text-dark mb-0">{{ number_format(5) }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

   @php
    use Illuminate\Support\Facades\DB;
    use Jenssegers\Agent\Agent;
    use Illuminate\Support\Str;
    use Carbon\Carbon;

    // Fetch sessions directly from the database
    $sessions = DB::table('sessions')
        ->orderBy('last_activity', 'desc')
        ->limit(10) // Limit to 10 for performance
        ->get();

    $agent = new Agent();
@endphp

<div class="card border border-light shadow-sm rounded-4 overflow-hidden mt-2">
    <div class="card-header bg-white p-4 border-bottom d-flex flex-wrap gap-2 justify-content-between align-items-center">
        <h5 class="fw-bold text-dark mb-0 fs-6">Recent System Activity</h5>
        <button class="btn btn-link text-decoration-none fw-semibold p-0" style="color: #4f46e5; font-size: 0.875rem;">View All</button>
    </div>
    <div class="card-body p-0"> {{-- Removed padding for a flush table --}}
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="px-4 py-3 border-0 small text-uppercase fw-bold text-muted">User</th>
                        <th class="px-4 py-3 border-0 small text-uppercase fw-bold text-muted">Device & Browser</th>
                        <th class="px-4 py-3 border-0 small text-uppercase fw-bold text-muted">IP Address</th>
                        <th class="px-4 py-3 border-0 small text-uppercase fw-bold text-muted">Last Active</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sessions as $session)
                        @php
                            // Setup Agent for this row
                            $agent->setUserAgent($session->user_agent);
                            $browser = $agent->browser();
                            $platform = $agent->platform();
                            
                            // Decode payload for IP (Laravel stores IP in a separate column usually, 
                            // but if not, we extract from payload)
                            $ip = $session->ip_address ?? 'Unknown'; 
                        @endphp
                        <tr>
                            <td class="px-4 py-3">
                                <span class="fw-medium text-dark">{{ $session->user_id ? 'User #'.$session->user_id : 'Guest' }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <i class="{{ $agent->isDesktop() ? 'fa-solid fa-desktop' : 'fa-solid fa-mobile-screen' }} me-2 text-muted"></i>
                                    <div>
                                        <div class="text-dark small fw-bold">{{ $browser }}</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">{{ $platform }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-muted small">
                                {{ $ip }}
                            </td>
                            <td class="px-4 py-3 small text-muted">
                                {{ Carbon::createFromTimestamp($session->last_activity)->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-5 text-center">
                                <i class="fa-solid fa-clock-rotate-left fs-3 text-muted mb-2"></i>
                                <p class="text-muted mb-0">No recent activity to display.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection