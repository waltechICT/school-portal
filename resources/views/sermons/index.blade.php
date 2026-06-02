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

    .play-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s ease;
    }
    
    .hover-lift:hover .play-overlay {
        background: rgba(0,0,0,0.5);
    }


    #sermonContainer {
        transition: all 0.3s ease;
    }

    #sermonContainer.grid-mode .sermon-item {
        width: 33.333333%; 
    }
    @media (max-width: 991px) {
        #sermonContainer.grid-mode .sermon-item { width: 50%; }
    }
    @media (max-width: 575px) {
        #sermonContainer.grid-mode .sermon-item { width: 100%; }
    }

    #sermonContainer.grid-mode .card-row {
        flex-direction: column !important;
        height: 100%;
    }
    
    #sermonContainer.grid-mode .img-container,
    #sermonContainer.grid-mode .body-container,
    #sermonContainer.grid-mode .btn-container {
        width: 100% !important;
        flex: 0 0 100% !important;
        max-width: 100% !important;
    }

    #sermonContainer.grid-mode .btn-container {
        border-left: none !important;
        border-top: 1px solid var(--bs-border-color-translucent) !important;
        margin-top: auto; 
    }

</style>

<div class="container pt-5 pb-4">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h6 class="text-uppercase text-primary fw-bold mb-1" style="letter-spacing: 1px;">Be Inspired</h6>
            <h1 class="display-4 fw-bold text-dark mb-2">Sermons Archive</h1>
            <p class="text-muted fw-medium mb-0">
                <i class="fa-solid fa-layer-group me-2"></i>
                Showing {{ $sermons->firstItem() ?? 0 }} - {{ $sermons->lastItem() ?? 0 }} of {{ $sermons->total() }} records
            </p>
        </div>
        <div class="col-md-4 text-md-end d-none d-md-block opacity-25">
           <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-fluid">
        </div>
    </div>
</div>

@if($sermons->currentPage() == 1 && $sermons->count() > 0)
    @php $latest = $sermons->first(); @endphp
    <div class="container mb-5">
        <h4 class="fw-bold mb-3 text-dark">Latest</h4>
        
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="row g-0 align-items-stretch">
                <div class="col-md-5 position-relative bg-dark">
                    <div class="position-absolute top-0 start-0 m-3 z-3">
                        <span class="badge bg-danger text-white px-3 py-2 text-uppercase fw-bold shadow-sm">Latest</span>
                    </div>
                    
                    @if($latest->image)
                        <img src="{{ asset($latest->image) }}" class="w-100 h-100" style="object-fit: cover; min-height: 280px;" alt="{{ $latest->title }}">
                    @else
                        <div class="w-100 h-100 bg-secondary" style="min-height: 280px;"></div>
                    @endif
                    
                    <div class="play-overlay">
                        <i class="fa-regular fa-circle-play fa-4x text-white opacity-75"></i>
                    </div>
                </div>
                
                <div class="col-md-7 d-flex flex-column bg-white">
                    <div class="card-body p-4 p-md-5 d-flex flex-column h-100">
                        <div class="mb-2 text-primary fw-bold small">
                            {{ \Carbon\Carbon::parse($latest->date)->format('F d, Y') }} | {{ $latest->speaker ?? 'Guest Speaker' }}
                        </div>
                        <h2 class="card-title fw-bold mb-3 text-dark">{{ $latest->title }}</h2>
                        
                        <p class="card-text text-muted mb-4 fs-5">
                            {{ Str::limit($latest->description, 150) ?? 'Join us as we dive into the word of God in this powerful message. Watch or listen to the full sermon now.' }}
                        </p>
                        
                        <div class="mt-auto d-flex gap-2">
                            <a href="{{ route('sermons.show', $latest->id) }}" class="btn btn-dark rounded-pill px-4 py-2 fw-bold">
                                Watch / Listen <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container mb-4">
    <form action="{{ route('sermons.index') }}" method="GET">
        <div class="bg-white p-3 rounded-4 shadow-sm border border-light-subtle">
            <div class="row g-3 align-items-center">
                
                <div class="col-md-6">
                    <div class="input-group">
                        <button type="submit" class="input-group-text bg-light border-end-0 text-muted rounded-start-pill ps-4 border-light-subtle" style="cursor: pointer;">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control bg-light border-start-0 rounded-end-pill py-2 border-light-subtle shadow-none" placeholder="Search sermons by title or topic...">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <select name="speaker" class="form-select rounded-pill py-2 bg-light border-light-subtle shadow-none" onchange="this.form.submit()">
                        <option value="">Filter by Speaker: All</option>
                        @foreach($speakers as $speaker)
                            <option value="{{ $speaker }}" {{ request('speaker') == $speaker ? 'selected' : '' }}>
                                {{ $speaker }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-2 d-flex justify-content-md-end gap-2">
                    <button type="button" id="listViewBtn" class="btn btn-dark rounded-pill px-3"><i class="fa-solid fa-list"></i></button>
                    <button type="button" id="gridViewBtn" class="btn btn-outline-secondary rounded-pill px-3"><i class="fa-solid fa-border-all"></i></button>
                </div>
            </div>
        </div>
    </form>
    
    @if(request()->filled('search') || request()->filled('speaker'))
        <div class="mt-3 px-2 d-flex gap-2 align-items-center flex-wrap">
            <span class="text-muted small fw-bold me-1">Active Filters:</span>
            
            @if(request()->filled('speaker'))
                <a href="{{ route('sermons.index', ['search' => request('search')]) }}" class="badge bg-secondary bg-opacity-10 text-dark border rounded-pill px-3 py-2 fw-normal text-decoration-none hover-lift">
                    Speaker: {{ request('speaker') }} <i class="fa-solid fa-xmark ms-2 text-danger"></i>
                </a>
            @endif

            @if(request()->filled('search'))
                <a href="{{ route('sermons.index', ['speaker' => request('speaker')]) }}" class="badge bg-secondary bg-opacity-10 text-dark border rounded-pill px-3 py-2 fw-normal text-decoration-none hover-lift">
                    Search: "{{ request('search') }}" <i class="fa-solid fa-xmark ms-2 text-danger"></i>
                </a>
            @endif

            <a href="{{ route('sermons.index') }}" class="text-danger small fw-bold ms-2 text-decoration-none">Clear All</a>
        </div>
    @endif
</div>

<div class="container mb-5">
    <div class="row g-3" id="sermonContainer">
        @forelse($sermons as $index => $sermon)
            @if($sermons->currentPage() == 1 && $index == 0) 
                @continue 
            @endif
            
            <div class="col-12 sermon-item">
                <div class="card border border-light-subtle shadow-sm rounded-4 overflow-hidden hover-lift bg-white h-100">
                    
                    <div class="row g-0 align-items-center card-row">
                        
                        <div class="col-md-3 col-4 bg-dark position-relative img-container">
                            @if($sermon->image)
                                <img src="{{ asset($sermon->image) }}" class="img-fluid w-100 h-100" style="object-fit: cover; aspect-ratio: 16/9;" alt="{{ $sermon->title }}">
                            @else
                                <div class="w-100 d-flex justify-content-center align-items-center bg-secondary" style="aspect-ratio: 16/9;">
                                    <i class="fa-solid fa-church fa-2x text-white opacity-25"></i>
                                </div>
                            @endif
                            <div class="play-overlay">
                                <i class="fa-solid fa-play fa-2x text-white opacity-75"></i>
                            </div>
                        </div>
                        
                        <div class="col-md-7 col-8 body-container">
                            <div class="card-body py-3 px-3 px-md-4">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="badge bg-light text-dark border">{{ \Carbon\Carbon::parse($sermon->date)->format('M d, Y') }}</span>
                                    @if($sermon->scripture)
                                        <span class="text-primary small fw-bold"><i class="fa-solid fa-book-bible me-1"></i> {{ $sermon->scripture }}</span>
                                    @endif
                                </div>
                                
                                <h5 class="card-title fw-bold mb-1 text-truncate">{{ $sermon->title }}</h5>
                                <p class="text-muted small mb-0"><i class="fa-solid fa-user me-1"></i> {{ $sermon->speaker ?? 'Guest Speaker' }}</p>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-12 p-3 p-md-0 d-flex justify-content-md-center align-items-center border-start border-light-subtle bg-light btn-container">
                            <a href="{{ route('sermons.show', $sermon->id) }}" class="btn btn-outline-dark rounded-pill w-100 mx-md-3 fw-bold mb-md-0 mb-2">View Details</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <h4 class="text-muted">No additional sermons found.</h4>
            </div>
        @endforelse
    </div>
    
    <div class="mt-5 d-flex justify-content-center">
        {{ $sermons->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const listBtn = document.getElementById('listViewBtn');
        const gridBtn = document.getElementById('gridViewBtn');
        const container = document.getElementById('sermonContainer');

        if (localStorage.getItem('sermonLayout') === 'grid') {
            setGrid();
        }

        listBtn.addEventListener('click', setList);
        gridBtn.addEventListener('click', setGrid);

        function setList() {
            container.classList.remove('grid-mode');
            
            
            listBtn.classList.replace('btn-outline-secondary', 'btn-dark');
            gridBtn.classList.replace('btn-dark', 'btn-outline-secondary');
            
            
            localStorage.setItem('sermonLayout', 'list');
        }

        function setGrid() {
            container.classList.add('grid-mode');
            
        
            gridBtn.classList.replace('btn-outline-secondary', 'btn-dark');
            listBtn.classList.replace('btn-dark', 'btn-outline-secondary');
            
            localStorage.setItem('sermonLayout', 'grid');
        }
    });
</script>