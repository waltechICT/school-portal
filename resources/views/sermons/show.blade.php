@include('includes.nav')

<style>
    body {
        background-color: #fcfcfc;
    }
    
    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08)!important;
    }
</style>

<div class="container py-5 mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <a href="{{ route('sermons.index') }}" class="text-decoration-none text-muted mb-4 d-inline-block fw-medium">
                <i class="fa-solid fa-arrow-left me-2"></i>Back to Archive
            </a>

            <div class="mb-4">
                <span class="badge bg-light text-dark border mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm">
                    {{ \Carbon\Carbon::parse($sermon->date)->format('F d, Y') }}
                </span>
                <h1 class="display-4 fw-bold text-dark mb-3" style="letter-spacing: -1px;">{{ $sermon->title }}</h1>
                
                <div class="d-flex flex-wrap gap-4 text-muted fw-medium mb-4 fs-5">
                    <span><i class="fa-solid fa-user text-primary me-2"></i>{{ $sermon->speaker ?? 'Guest Speaker' }}</span>
                    @if($sermon->scripture)
                        <span><i class="fa-solid fa-book-bible text-primary me-2"></i>{{ $sermon->scripture }}</span>
                    @endif
                </div>
            </div>

            @if($sermon->image)
                <div class="rounded-4 overflow-hidden mb-5 shadow-sm border border-light-subtle bg-dark" style="aspect-ratio: 16/9;">
                    <img src="{{ asset($sermon->image) }}" alt="{{ $sermon->title }}" class="w-100 h-100" style="object-fit: cover;">
                </div>
            @endif

            <div class="d-flex flex-column flex-sm-row gap-3 mb-5 p-4 bg-white rounded-4 border border-light-subtle shadow-sm align-items-sm-center">
                <div class="flex-grow-1">
                    <h5 class="fw-bold mb-1 text-dark">Access Media</h5>
                    <p class="text-muted small mb-0 d-none d-sm-block">Watch the full video or listen to the audio recording.</p>
                </div>
                
                <div class="d-flex gap-2 align-items-center flex-wrap">
                    @if($sermon->video_url)
                        <a href="{{ $sermon->video_url }}" target="_blank" class="btn btn-dark rounded-pill px-4 py-2 fw-bold shadow-sm">
                            <i class="fa-solid fa-play me-2"></i>Watch Video
                        </a>
                    @endif
                    
                    @if($sermon->audio_url)
                        <a href="{{ $sermon->audio_url }}" target="_blank" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold">
                            <i class="fa-solid fa-headphones me-2"></i>Listen
                        </a>
                    @endif
                    
                    @if(!$sermon->video_url && !$sermon->audio_url)
                        <span class="badge bg-secondary px-3 py-2 rounded-pill fw-normal">Media Unavailable</span>
                    @endif
                </div>
            </div>

            <div class="text-dark bg-white p-4 p-md-5 rounded-4 shadow-sm border border-light-subtle mb-5" style="line-height: 1.8; font-size: 1.1rem;">
                <h4 class="fw-bold mb-4 text-dark border-bottom pb-3">Message Summary</h4>
                @if($sermon->description)
                    <p class="mb-0 text-muted">{!! nl2br(e($sermon->description)) !!}</p>
                @else
                    <p class="text-muted fst-italic mb-0">No description provided for this sermon.</p>
                @endif
            </div>

        </div>
    </div>
</div>

@if($relatedSermons && $relatedSermons->count() > 0)
<div class="bg-light py-5 border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="fw-bold mb-0 text-dark">Recent Messages</h3>
            <a href="{{ route('sermons.index') }}" class="text-decoration-none fw-bold">View All <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
        
        <div class="row g-4">
            @foreach($relatedSermons as $recent)
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-light-subtle shadow-sm rounded-4 overflow-hidden hover-lift bg-white">
                        
                        <div class="position-relative bg-dark" style="aspect-ratio: 16/9;">
                            @if($recent->image)
                                <img src="{{ asset($recent->image) }}" class="card-img-top w-100 h-100" alt="{{ $recent->title }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary">
                                    <i class="fa-solid fa-church fa-2x"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-dark bg-opacity-75 px-2 py-1 rounded-pill small">
                                    {{ \Carbon\Carbon::parse($recent->date)->format('M d') }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="card-body p-3 d-flex flex-column">
                            <h6 class="card-title fw-bold mb-1 text-dark text-truncate">{{ $recent->title }}</h6>
                            <p class="card-text text-muted small mb-3 text-truncate"><i class="fa-solid fa-user me-1"></i> {{ $recent->speaker ?? 'Guest' }}</p>
                            <a href="{{ route('sermons.show', $recent->id) }}" class="btn btn-sm btn-outline-dark w-100 rounded-pill mt-auto fw-bold">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif