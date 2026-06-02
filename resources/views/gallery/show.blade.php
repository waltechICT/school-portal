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

    /* Image grid click cursor */
    .img-thumb {
        cursor: pointer;
    }

    /* Carousel image container */
    .carousel-image-wrapper {
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        max-height: 65vh;
        min-height: 300px;
    }
    .carousel-image-wrapper img {
        max-height: 65vh;
        width: auto;
        max-width: 100%;
        object-fit: contain;
    }

    /* Nav button style */
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        background: rgba(0,0,0,0.5);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        bottom: auto;
    }
    .carousel-control-prev { left: 1rem; }
    .carousel-control-next { right: 1rem; }
</style>

<div class="container py-5 mt-3">
    <div class="row justify-content-center">
        <div class="col-lg-9">

            <a href="{{ route('gallery.index') }}" class="text-decoration-none text-muted mb-4 d-inline-block fw-medium hover-lift">
                <i class="fa-solid fa-arrow-left me-2"></i>Back to Gallery
            </a>

            {{-- Header --}}
            <div class="mb-4">
                <span class="badge bg-light text-dark border mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm">
                    {{ \Carbon\Carbon::parse($gallery->created_at)->format('F d, Y') }}
                </span>
                <h1 class="display-4 fw-bold text-dark mb-3" style="letter-spacing: -1px;">
                    {{ $gallery->title ?? 'Untitled Gallery' }}
                </h1>
                <div class="d-flex flex-wrap gap-4 text-muted fw-medium mb-4 fs-5">
                    <span>
                        <i class="fa-solid fa-images text-primary me-2"></i>
                        {{ $gallery->images ? count($gallery->images) : 0 }} Photo(s)
                    </span>
                </div>
            </div>

            {{-- Description --}}
            <div class="text-dark bg-white p-4 p-md-5 rounded-4 shadow-sm border border-light-subtle mb-5" style="line-height: 1.8; font-size: 1.1rem;">
                <h4 class="fw-bold mb-4 text-dark border-bottom pb-3">About this Gallery</h4>
                @if($gallery->description)
                    <p class="mb-0 text-muted">{!! nl2br(e($gallery->description)) !!}</p>
                @else
                    <p class="text-muted fst-italic mb-0">No description provided for this gallery.</p>
                @endif
            </div>

            {{-- Images Grid — click opens modal carousel --}}
            @if($gallery->images && count($gallery->images) > 0)
                <h4 class="fw-bold mb-3 text-dark">Photos ({{ count($gallery->images) }})</h4>
                <div class="row g-3 mb-5">
                    @foreach($gallery->images as $i => $image)
                        <div class="col-6 col-md-4">
                            <div class="card border-0 shadow-sm rounded-4 overflow-hidden hover-lift bg-dark img-thumb"
                                data-bs-toggle="modal"
                                data-bs-target="#imageModal"
                                data-slide="{{ $i }}">
                                <div style="aspect-ratio: 1/1; overflow: hidden;">
                                    <img src="{{ asset($image) }}"
                                        alt="{{ $gallery->title ?? 'Photo' }} {{ $i + 1 }}"
                                        class="w-100 h-100" style="object-fit: cover; transition: transform 0.3s ease;">
                                </div>
                                <div class="position-absolute bottom-0 end-0 m-2">
                                    <span class="badge bg-dark bg-opacity-75 rounded-pill px-2 py-1 small">
                                        {{ $i + 1 }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted fst-italic">No photos in this gallery yet.</p>
            @endif

        </div>
    </div>
</div>

{{-- Related Galleries --}}
@if($relatedGalleries && $relatedGalleries->count() > 0)
<div class="bg-light py-5 border-top">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="fw-bold mb-0 text-dark">Recent Galleries</h3>
            <a href="{{ route('gallery.index') }}" class="text-decoration-none fw-bold hover-lift">
                View All <i class="fa-solid fa-arrow-right ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach($relatedGalleries as $recent)
                @php $recentFirst = ($recent->images && count($recent->images) > 0) ? $recent->images[0] : null; @endphp
                <div class="col-md-3 col-sm-6">
                    <div class="card h-100 border-light-subtle shadow-sm rounded-4 overflow-hidden hover-lift bg-white">

                        <div class="position-relative bg-dark" style="aspect-ratio: 1/1;">
                            @if($recentFirst)
                                <img src="{{ asset($recentFirst) }}" class="card-img-top w-100 h-100"
                                    alt="{{ $recent->title }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary">
                                    <i class="fa-solid fa-image fa-2x"></i>
                                </div>
                            @endif

                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-dark bg-opacity-75 px-2 py-1 rounded-pill small">
                                    {{ \Carbon\Carbon::parse($recent->created_at)->format('M d') }}
                                </span>
                            </div>

                            @if($recent->images && count($recent->images) > 1)
                                <div class="position-absolute bottom-0 start-0 m-2">
                                    <span class="badge bg-dark bg-opacity-75 rounded-pill px-2 py-1 small">
                                        <i class="fa-solid fa-images me-1"></i>{{ count($recent->images) }}
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="card-body p-3 d-flex flex-column">
                            <h6 class="card-title fw-bold mb-1 text-dark text-truncate">{{ $recent->title ?? 'Untitled' }}</h6>
                            <p class="card-text text-muted small mb-3 text-truncate">
                                <i class="fa-solid fa-images me-1"></i>
                                {{ $recent->images ? count($recent->images) : 0 }} photo(s)
                            </p>
                            <a href="{{ route('gallery.show', $recent->id) }}" class="btn btn-sm btn-outline-dark w-100 rounded-pill mt-auto fw-bold">
                                View Gallery
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

{{-- Image Modal with Carousel --}}
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">

            {{-- Close Button --}}
            <div class="position-absolute top-0 end-0 z-3 m-3">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    style="background-color: rgba(0,0,0,0.5); padding: 10px; border-radius: 50%; opacity: 1;"></button>
            </div>

            <div class="modal-body p-0">

                {{-- Carousel --}}
                <div id="imageCarousel" class="carousel slide" data-bs-interval="false">
                    <div class="carousel-inner">
                        @foreach($gallery->images ?? [] as $i => $image)
                            <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                                <div class="carousel-image-wrapper w-100">
                                    <img src="{{ asset($image) }}" alt="Photo {{ $i + 1 }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Prev / Next --}}
                    @if(count($gallery->images ?? []) > 1)
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @endif
                </div>

                {{-- Info Section below carousel --}}
                <div class="bg-white p-4">

                    {{-- Description --}}
                    @if($gallery->description)
                        <p class="text-muted mb-3" style="line-height: 1.7;">
                            {{ Str::limit($gallery->description, 200) }}
                        </p>
                    @endif

                    {{-- Meta: Date | Count --}}
                    <div class="d-flex flex-wrap align-items-center gap-3">
                        <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-bold">
                            <i class="fa-regular fa-calendar me-1 text-primary"></i>
                            {{ \Carbon\Carbon::parse($gallery->created_at)->format('d M, Y') }}
                        </span>
                        <span class="badge bg-light text-dark border rounded-pill px-3 py-2 fw-bold">
                            <i class="fa-solid fa-images me-1 text-primary"></i>
                            <span id="modalCounter">1</span> / {{ count($gallery->images ?? []) }} Photos
                        </span>
                        <div class="ms-auto">
                            <button class="btn btn-sm btn-outline-dark rounded-pill fw-bold" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalEl    = document.getElementById('imageModal');
        const carouselEl = document.getElementById('imageCarousel');
        const counter    = document.getElementById('modalCounter');

        // Jump to clicked image slide when modal opens
        document.querySelectorAll('.img-thumb').forEach(thumb => {
            thumb.addEventListener('click', function () {
                const index = parseInt(this.getAttribute('data-slide'));
                const bsCarousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, { interval: false });
                bsCarousel.to(index);
                if (counter) counter.textContent = index + 1;
            });
        });

        // Update counter on slide change
        carouselEl.addEventListener('slid.bs.carousel', function (e) {
            if (counter) counter.textContent = e.to + 1;
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!modalEl.classList.contains('show')) return;
            const bsCarousel = bootstrap.Carousel.getOrCreateInstance(carouselEl, { interval: false });
            if (e.key === 'ArrowRight') bsCarousel.next();
            if (e.key === 'ArrowLeft')  bsCarousel.prev();
        });
    });
</script>