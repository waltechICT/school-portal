@include('includes.nav')

<style>
    body {
        background-color: #fcfcfc;
    }
    
    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: pointer;
    }
    
    .hover-lift:hover {
        transform: translateY(-3px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08)!important;
    }

    .view-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .hover-lift:hover .view-overlay {
        opacity: 1;
    }

    /* Gallery Layout Modes */
    .gallery-container {
        transition: all 0.3s ease;
    }

    /* Grid Mode */
    .gallery-container.grid-mode {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }
    .gallery-container.grid-mode .gallery-item {
        margin-bottom: 0;
    }
    .gallery-container.grid-mode .gallery-item .img-wrapper {
        aspect-ratio: 1 / 1;
    }
    .gallery-container.grid-mode .gallery-item img {
        width: 100%; height: 100%; object-fit: cover;
    }

    /* Masonry Mode */
    .gallery-container.masonry-mode {
        column-count: 3;
        column-gap: 1.5rem;
    }
    @media (max-width: 991px) {
        .gallery-container.masonry-mode { column-count: 2; }
    }
    @media (max-width: 575px) {
        .gallery-container.masonry-mode { column-count: 1; }
    }
    .gallery-container.masonry-mode .gallery-item {
        break-inside: avoid;
        margin-bottom: 1.5rem;
        display: inline-block;
        width: 100%;
    }
    .gallery-container.masonry-mode .gallery-item img {
        width: 100%; height: auto; display: block; object-fit: cover;
    }

    .img-count-badge {
        position: absolute;
        bottom: 8px;
        right: 8px;
        z-index: 2;
    }
</style>

<div class="container pt-5 pb-4">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="text-uppercase text-primary fw-bold mb-1" style="letter-spacing: 1px;">Memories & Moments</h6>
            <h1 class="display-4 fw-bold text-dark mb-2">Gallery</h1>
            <p class="text-muted fw-medium mb-0">
                <i class="fa-solid fa-camera me-2"></i>
                Showing {{ $galleries->firstItem() ?? 0 }} - {{ $galleries->lastItem() ?? 0 }} of {{ $galleries->total() ?? 0 }} records
            </p>
        </div>
        <div class="col-md-4 text-md-end d-none d-md-block opacity-25">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-fluid" style="max-height: 80px;">
        </div>
    </div>
</div>

<div class="container mb-4">
    <div class="bg-white p-3 rounded-4 shadow-sm border border-light-subtle">
        <div class="row g-3 align-items-center justify-content-between">

            <div class="col-md-8">
                <form action="{{ route('gallery.index') }}" method="GET">
                    <div class="input-group">
                        <button type="submit" class="input-group-text bg-light border-end-0 text-muted rounded-start-pill ps-4 border-light-subtle" style="cursor: pointer;">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control bg-light border-start-0 rounded-end-pill py-2 border-light-subtle shadow-none" placeholder="Search galleries by title or description...">
                    </div>
                </form>
            </div>

            <div class="col-md-4 d-flex justify-content-md-end align-items-center gap-3">
                <span class="text-muted fw-medium small d-none d-sm-inline">{{ $galleries->count() }} galleries loaded</span>

                <div class="btn-group bg-light p-1 rounded-pill border border-light-subtle">
                    <button type="button" id="masonryViewBtn" class="btn btn-dark rounded-pill px-4 btn-sm fw-bold">Masonry</button>
                    <button type="button" id="gridViewBtn" class="btn btn-transparent text-muted rounded-pill px-4 btn-sm fw-bold">Grid</button>
                </div>
            </div>

        </div>
    </div>

    @if(request()->filled('search'))
        <div class="mt-3 px-2 d-flex gap-2 align-items-center flex-wrap">
            <span class="text-muted small fw-bold me-1">Active Filters:</span>
            <a href="{{ route('gallery.index') }}" class="badge bg-secondary bg-opacity-10 text-dark border rounded-pill px-3 py-2 fw-normal text-decoration-none hover-lift">
                Search: "{{ request('search') }}" <i class="fa-solid fa-xmark ms-2 text-danger"></i>
            </a>
            <a href="{{ route('gallery.index') }}" class="text-danger small fw-bold ms-2 text-decoration-none">Clear All</a>
        </div>
    @endif
</div>

<div class="container mb-5">
    <div class="gallery-container masonry-mode" id="galleryContainer">
        @forelse($galleries as $gallery)
            @php $firstImage = ($gallery->images && count($gallery->images) > 0) ? $gallery->images[0] : null; @endphp

            <a href="{{ route('gallery.show', $gallery->id) }}" class="gallery-item d-block text-decoration-none">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden hover-lift bg-white">
                    <div class="img-wrapper position-relative bg-dark">
                        @if($firstImage)
                            <img src="{{ asset($firstImage) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
                        @else
                            <div class="w-100 py-5 d-flex justify-content-center align-items-center bg-secondary" style="min-height: 250px;">
                                <i class="fa-solid fa-image fa-3x text-white opacity-25"></i>
                            </div>
                        @endif

                        <div class="view-overlay">
                            <i class="fa-solid fa-expand fa-2x text-white"></i>
                        </div>

                        @if($gallery->images && count($gallery->images) > 1)
                            <div class="img-count-badge">
                                <span class="badge bg-dark bg-opacity-75 rounded-pill px-2 py-1 small">
                                    <i class="fa-solid fa-images me-1"></i>{{ count($gallery->images) }}
                                </span>
                            </div>
                        @endif
                    </div>

                    @if($gallery->title)
                        <div class="px-3 py-2 border-top border-light-subtle">
                            <p class="mb-0 small fw-bold text-dark text-truncate">{{ $gallery->title }}</p>
                            <p class="mb-0 text-muted" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($gallery->created_at)->format('d M, Y') }}</p>
                        </div>
                    @endif
                </div>
            </a>

        @empty
            <div class="text-center py-5">
                <h4 class="text-muted">No galleries found.</h4>
            </div>
        @endforelse
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $galleries->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const masonryBtn = document.getElementById('masonryViewBtn');
        const gridBtn    = document.getElementById('gridViewBtn');
        const container  = document.getElementById('galleryContainer');

        if (localStorage.getItem('galleryLayout') === 'grid') setGrid();

        masonryBtn.addEventListener('click', setMasonry);
        gridBtn.addEventListener('click', setGrid);

        function setMasonry() {
            container.classList.remove('grid-mode');
            container.classList.add('masonry-mode');
            masonryBtn.classList.replace('btn-transparent', 'btn-dark');
            masonryBtn.classList.remove('text-muted');
            gridBtn.classList.replace('btn-dark', 'btn-transparent');
            gridBtn.classList.add('text-muted');
            localStorage.setItem('galleryLayout', 'masonry');
        }

        function setGrid() {
            container.classList.remove('masonry-mode');
            container.classList.add('grid-mode');
            gridBtn.classList.replace('btn-transparent', 'btn-dark');
            gridBtn.classList.remove('text-muted');
            masonryBtn.classList.replace('btn-dark', 'btn-transparent');
            masonryBtn.classList.add('text-muted');
            localStorage.setItem('galleryLayout', 'grid');
        }
    });
</script>