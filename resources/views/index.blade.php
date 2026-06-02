@include('includes.nav')

<style>
    .hero-container {
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('images/img.jpg') }}');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover; 
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh; 
        color: white; 
        text-align: center;
        padding: 1rem 0;
    }

    .service-time-box {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 1rem 2rem;
        border-radius: 12px;
        min-width: 220px;
        text-align: center;
    }

    .btn1 {
        width: 300px;
        border-radius: 30px;
        font-size: 1rem;
        font-weight: 600;
        margin: 10px;
        background-color: transparent;
        color: #ffffff;
        border: 1px solid #ffffff;
        padding: 10px;
        text-decoration: none;
        display: inline-block;
    }

    .btn1:hover {
        background-color: #ffffff;
        color: #000000;
    }

    .notice-section {
        background-color: #f1f1f1ff;
        padding: 2.5rem 0;
    }

    .notice-card {
        margin: 0 auto;
        width: 90%;
        max-width: 800px;
        background-color: #ffffff;
        color: #1a1a1a;
        padding: 0.6rem 0.6rem;
        border-radius: 50px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .notice-badge {
        background-color: #1a1a1a;
        color: white;
        padding: 0.5rem 1.2rem;
        border-radius: 40px;
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        white-space: nowrap;
        z-index: 2;
        box-shadow: 5px 0 15px rgba(255, 255, 255, 1);
    }

    .notice-scroll-wrapper {
        flex-grow: 1;
        overflow: hidden;
        white-space: nowrap;
        margin-left: 1rem;
        position: relative;
    }

    .notice-text {
        display: inline-block;
        font-size: 1rem;
        font-weight: 500;
        animation: scrollLeft 20s linear infinite;
        padding-left: 100%; 
    }

    @keyframes scrollLeft {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }

    .sermons-section {
        padding: 4rem 0;
        background-color: #ffffff;
    }
    
    .sermons-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    
    .sermons-header h2 {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        color: #1a1a1a;
    }
    
    .sermons-carousel-wrapper {
        position: relative;
        padding: 0 40px; 
    }

    .sermon-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: transform 0.3s ease;
        height: 100%;
    }

    .sermon-card:hover {
        transform: translateY(-5px);
    }

    .sermon-image-placeholder {
        background-color: #e9ecef;
        aspect-ratio: 1 / 1; 
        display: flex;
        align-items: center;
        justify-content: center;
        color: #adb5bd;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 40px;
        height: 40px;
        background-color: #1a1a1a;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0.7;
    }
    .watch-live-section {
        background-color: #f8f9fa; 
        padding: 5rem 0;
    }
    .events-section {
        background-color: #ffffff;
        padding: 5rem 0;
    }
    
    .event-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(0,0,0,0.08);
    }
    
    .event-card:hover {
        transform: translateX(5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05) !important;
        border-color: rgba(0,0,0,0.15);
    }

    .event-date-box {
        min-width: 90px;
        text-align: center;
        background-color: #f8f9fa;
        border-radius: 12px;
        padding: 10px;
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .video-wrapper {
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        border: 1px solid rgba(0,0,0,0.05);
    }
    
    .carousel-control-prev {
        left: -10px;
    }
    
    .carousel-control-next {
        right: -10px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        opacity: 1;
        background-color: #000;
    }

    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0.4; }
        100% { opacity: 1; }
    }

    /* --- ADDED GALLERY CSS --- */
    .gallery-section {
        padding: 5rem 0;
        background-color: #f8f9fa; /* Matches the alternate section styling */
        font-family: 'Outfit', sans-serif;
    }

    .gallery-section .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .gallery-section .section-header h2 {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 10px;
    }

    .gallery-section .section-header p {
        color: #6b7280;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-auto-rows: 250px;
        gap: 15px;
        grid-auto-flow: dense;
    }

    .gallery-item.tall { grid-row: span 2; }
    .gallery-item.wide { grid-column: span 2; }

    .gallery-item {
        position: relative;
        border-radius: 12px; /* Matched border-radius to other cards */
        overflow: hidden;
        cursor: pointer;
        background: #e9ecef;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-caption {
        color: white;
        font-size: 1.25rem;
        font-weight: 600;
        text-align: center;
        padding: 0 20px;
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }

    .gallery-item:hover img { transform: scale(1.08); }
    .gallery-item:hover .gallery-overlay { opacity: 1; }
    .gallery-item:hover .gallery-caption { transform: translateY(0); }

    @media (max-width: 768px) {
        .sermons-carousel-wrapper {
            padding: 0;
        }
        .carousel-control-prev,
        .carousel-control-next {
            display: none; 
        }
    }

    @media (max-width: 600px) {
        .gallery-grid {
            grid-template-columns: 1fr;
            grid-auto-rows: 250px;
        }
        .gallery-item.wide,
        .gallery-item.tall {
            grid-column: span 1;
            grid-row: span 1;
        }
    }

    /* --- PRAYER REQUEST CSS --- */
    .prayer-request-section {
        padding: 5rem 0;
        background-color: #ffffff;
        font-family: 'Outfit', sans-serif;
    }

    .prayer-request-section .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .prayer-request-section .section-header h2 {
        font-family: 'Outfit', sans-serif;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 10px;
    }

    .prayer-request-section .section-header p {
        color: #6b7280;
    }

    .prayer-card {
        background: #ffffff;
        border-radius: 20px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);
        padding: 2.5rem;
        max-width: 650px;
        margin: 0 auto;
    }

    .prayer-form .form-label {
        font-family: 'Plus Jakarta Sans', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #4b5563;
        margin-bottom: 0.5rem;
    }

    .prayer-form .form-control {
        font-family: 'Plus Jakarta Sans', sans-serif;
        border-radius: 10px;
        border: 1px solid rgba(0, 0, 0, 0.12);
        padding: 0.75rem 1rem;
        font-size: 0.95rem;
        color: #1a1a1a;
        background-color: #fcfcfc;
        transition: all 0.25s ease;
    }

    .prayer-form .form-control:focus {
        border-color: #1a1a1a;
        background-color: #ffffff;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05);
        outline: none;
    }

    .prayer-form textarea.form-control {
        resize: none;
    }

    .btn-prayer-submit {
        font-family: 'Outfit', sans-serif;
        background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
        color: #ffffff;
        border: none;
        border-radius: 50px;
        padding: 0.8rem 2rem;
        font-weight: 600;
        font-size: 1rem;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.25s ease;
        margin-top: 1rem;
    }

    .btn-prayer-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
        color: #ffffff;
        opacity: 0.95;
    }

    .btn-prayer-submit:active {
        transform: translateY(0);
    }
</style>

<body>

<div class="hero-container">
    <div class="container d-flex flex-column align-items-center">
        <div class="mb-5 mt-4 w-100">
            <h1 class="display-3 fw-bold mb-3">Welcome to Worship Cloud</h1>
            <p class="lead fs-4">Join us for worship and fellowship</p>
        </div>

        <div class="d-flex flex-column flex-md-row gap-3 gap-md-4 mb-5">
            <div class="service-time-box">
                <span class="d-block fw-bold fs-5 mb-1">Sunday Service</span>
                <span class="text-light">10:00 AM</span>
            </div>
            
            <div class="service-time-box">
                <span class="d-block fw-bold fs-5 mb-1">Wednesday Service</span>
                <span class="text-light">7:00 PM</span>
            </div>
        </div>

        <a href="#" class="btn1">Join us</a>
    </div>
</div>

<div class="notice-section">
    <div class="container">
        <div class="notice-card">
            <div class="notice-badge">Notice</div>
            <div class="notice-scroll-wrapper">
                <div class="notice-text">
                    Join us for a special evening worship service this Friday at 6:00 PM. • Choir practice has been moved to Thursday at 5:00 PM. • Don't forget to register for the upcoming youth retreat!
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sermons-section">
    <div class="container">
        <div class="sermons-header">
            <h2>Sermons</h2>
        </div>

        <div class="sermons-carousel-wrapper">
    <div id="sermonsCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            
            @forelse($recentSermons->chunk(3) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row g-4">
                        @foreach($chunk as $index => $sermon)
                            <div class="col-md-4 {{ $index > 0 ? 'd-none d-md-block' : '' }}">
                                <div class="card sermon-card">
                                    
                                    @if($sermon->image)
                                        <img src="{{ asset($sermon->image) }}" class="card-img-top" alt="{{ $sermon->title }}" style="aspect-ratio: 1/1; object-fit: cover;">
                                    @else
                                        <div class="sermon-image-placeholder">
                                            <i class="fa-solid fa-image fa-3x"></i>
                                        </div>
                                    @endif
                                    
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">{{ $sermon->title }}</h5>
                                        <p class="card-text text-muted small">
                                            {{ $sermon->speaker ?? 'Guest Speaker' }} | 
                                            {{ \Carbon\Carbon::parse($sermon->date)->format('M d, Y') }}
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <p class="text-muted">No sermons available yet.</p>
                </div>
            @endforelse

        </div>

        @if($recentSermons->count() > 3)
            <button class="carousel-control-prev" type="button" data-bs-target="#sermonsCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-chevron-left"></i>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#sermonsCarousel" data-bs-slide="next">
                <i class="fa-solid fa-chevron-right"></i>
                <span class="visually-hidden">Next</span>
            </button>
        @endif
    </div>
    
    <div class="text-center mt-4">
        <a href="{{ route('sermons.index') }}" class="btn btn-outline-dark rounded-pill px-4">View All Sermons</a>
    </div>
</div>
</div>
</div>

<div class="watch-live-section">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-uppercase text-danger fw-bold mb-1" style="letter-spacing: 1px;">
                <i class="fa-solid fa-circle text-danger me-1" style="font-size: 0.6rem; vertical-align: middle; animation: blink 2s infinite;"></i> 
                Live Now
            </h6>
            <h2 class="display-4 fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Watch Live</h2>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">
                Join our worship services online from anywhere in the world. Experience the presence of God right from your screen.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 rounded-4 overflow-hidden video-wrapper bg-dark">
                    
                    <div class="ratio ratio-16x9">
                        <iframe 
                          src="https://www.youtube.com/embed/-79JLOyzNyA?autoplay=1&rel=0" 
                          title="Church Live Stream" 
                          frameborder="0" 
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                          allowfullscreen>
                        </iframe>
                    </div>

                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="https://www.youtube.com/@YouTube_Church/featured" target="_blank" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold hover-lift">
                <i class="fa-brands fa-youtube me-2 text-danger"></i> Visit Our Channel
            </a>
        </div>
        
    </div>
</div>

<div class="events-section">
    <div class="container">
        
        <div class="text-center mb-5">
            <h6 class="text-uppercase text-primary fw-bold mb-1" style="letter-spacing: 1px;">Join The Family</h6>
            <h2 class="display-5 fw-bold text-dark mb-3" style="font-family: 'Outfit', sans-serif;">Upcoming Events</h2>
            <p class="text-muted mx-auto" style="max-width: 600px;">
                There is always something happening in our community. Find an event, register, and get involved!
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="d-flex flex-column gap-3">
                    
                    <div class="card event-card bg-white rounded-4 p-3 p-md-4 shadow-sm">
                        <div class="d-flex flex-column flex-md-row align-items-md-center gap-3 gap-md-4">
                            <div class="event-date-box flex-shrink-0">
                                <span class="d-block text-danger fw-bold text-uppercase" style="font-size: 0.9rem; letter-spacing: 1px;">Jun</span>
                                <span class="d-block fw-bold text-dark" style="font-size: 2rem; line-height: 1;">12</span>
                            </div>
                            
                            <div class="flex-grow-1">
                                <div class="d-flex flex-wrap gap-3 mb-2 text-muted small fw-medium">
                                    <span><i class="fa-regular fa-clock me-1 text-primary"></i> 6:00 PM - 8:30 PM</span>
                                    <span><i class="fa-solid fa-location-dot me-1 text-primary"></i> Main Sanctuary</span>
                                </div>
                                <h4 class="fw-bold mb-1 text-dark">Night of Worship & Praise</h4>
                                <p class="text-muted mb-0 small">Join us for a special evening dedicated entirely to extended worship, prayer, and seeking God's presence together as a community.</p>
                            </div>
                            
                            <div class="flex-shrink-0 mt-3 mt-md-0 text-md-end">
                                <a href="#" class="btn btn-dark rounded-pill px-4 py-2 fw-bold w-100">Register</a>
                            </div>
                        </div>
                    </div>

                    <div class="card event-card bg-white rounded-4 p-3 p-md-4 shadow-sm">
                        <div class="d-flex flex-column flex-md-row align-items-md-center gap-3 gap-md-4">
                            <div class="event-date-box flex-shrink-0">
                                <span class="d-block text-danger fw-bold text-uppercase" style="font-size: 0.9rem; letter-spacing: 1px;">Jun</span>
                                <span class="d-block fw-bold text-dark" style="font-size: 2rem; line-height: 1;">18</span>
                            </div>
                            
                            <div class="flex-grow-1">
                                <div class="d-flex flex-wrap gap-3 mb-2 text-muted small fw-medium">
                                    <span><i class="fa-regular fa-clock me-1 text-primary"></i> 9:00 AM - 2:00 PM</span>
                                    <span><i class="fa-solid fa-location-dot me-1 text-primary"></i> Fellowship Hall</span>
                                </div>
                                <h4 class="fw-bold mb-1 text-dark">Annual Youth Retreat</h4>
                                <p class="text-muted mb-0 small">A transformative weekend for teenagers focusing on identity in Christ, team building, and deep biblical teaching.</p>
                            </div>
                            
                            <div class="flex-shrink-0 mt-3 mt-md-0 text-md-end">
                                <a href="#" class="btn btn-dark rounded-pill px-4 py-2 fw-bold w-100">Details</a>
                            </div>
                        </div>
                    </div>

                    <div class="card event-card bg-white rounded-4 p-3 p-md-4 shadow-sm">
                        <div class="d-flex flex-column flex-md-row align-items-md-center gap-3 gap-md-4">
                            <div class="event-date-box flex-shrink-0">
                                <span class="d-block text-danger fw-bold text-uppercase" style="font-size: 0.9rem; letter-spacing: 1px;">Jul</span>
                                <span class="d-block fw-bold text-dark" style="font-size: 2rem; line-height: 1;">05</span>
                            </div>
                            
                            <div class="flex-grow-1">
                                <div class="d-flex flex-wrap gap-3 mb-2 text-muted small fw-medium">
                                    <span><i class="fa-regular fa-clock me-1 text-primary"></i> 10:00 AM - 1:00 PM</span>
                                    <span><i class="fa-solid fa-location-dot me-1 text-primary"></i> City Park Pavilion</span>
                                </div>
                                <h4 class="fw-bold mb-1 text-dark">Church Summer Picnic</h4>
                                <p class="text-muted mb-0 small">Bring your family and friends for our annual summer picnic! Free food, games for kids, and great fellowship.</p>
                            </div>
                            
                            <div class="flex-shrink-0 mt-3 mt-md-0 text-md-end">
                                <a href="#" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold w-100">Get Directions</a>
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="text-center mt-5">
                    <a href="#" class="text-decoration-none fw-bold text-dark border-bottom border-dark pb-1 hover-lift d-inline-block">
                        View Full Calendar <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="gallery-section">
  <div class="container">
    <div class="section-header">
      <h2>Church Gallery</h2>
      <p>Highlights from our recent events and worship.</p>
    </div>

    <div class="gallery-grid">
      @foreach($galleries as $gallery)
        @php $firstImage = ($gallery->images && count($gallery->images) > 0) ? $gallery->images[0] : null; @endphp
        <a href="{{ route('gallery.show', $gallery->id) }}" class="gallery-item">
          @if($firstImage)
            <img src="{{ asset($firstImage) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
          @else
            <img src="https://via.placeholder.com/600x400" alt="No Image">
          @endif
          <div class="gallery-overlay">
            <span class="gallery-caption">{{ $gallery->title ?? 'Untitled' }}</span>
          </div>
        </a>
      @endforeach
    </div>

    <div class="text-center mt-5">
      <a href="{{ route('gallery.index') }}" class="btn btn-outline-dark rounded-pill px-4 py-2 fw-bold hover-lift">
        View Full Gallery <i class="fa-solid fa-arrow-right ms-1"></i>
      </a>
    </div>
  </div>
</div>

{{---Prayer request section ---}}
<div class="prayer-request-section">
  <div class="container">
    <div class="section-header">
      <h2>Prayer Request</h2>
      <p>Share your prayer requests with us and we will pray for you.</p>
    </div>
    
    <div class="prayer-card">
      <form action="#" method="POST" class="prayer-form">
        @csrf
        <div class="mb-4">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="mb-4">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
        </div>
        <div class="mb-4">
          <label for="prayer_request" class="form-label">Prayer Request</label>
          <textarea class="form-control" id="prayer_request" name="prayer_request" rows="4" placeholder="How can we pray for you?" required></textarea>
        </div>
        <button type="submit" class="btn-prayer-submit">Send Prayer Request</button>
      </form>
    </div>
  </div>
</div>

</body>