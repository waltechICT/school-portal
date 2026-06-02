<style>
.custom-footer {
    background-color: #111111;
    color: #e5e7eb;
    font-family: 'Plus Jakarta Sans', sans-serif;
    padding: 5rem 0 2rem 0;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}

.footer-brand h3 {
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    color: #ffffff;
    font-size: 1.5rem;
    margin-bottom: 1.2rem;
}

.footer-text {
    color: #9ca3af;
    font-size: 0.925rem;
    line-height: 1.6;
}

.footer-header {
    font-family: 'Outfit', sans-serif;
    font-weight: 600;
    color: #ffffff;
    font-size: 1.1rem;
    margin-bottom: 1.5rem;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: #9ca3af;
    text-decoration: none;
    font-size: 0.925rem;
    transition: all 0.25s ease;
    display: inline-block;
}

.footer-links a:hover {
    color: #ffffff;
    transform: translateX(4px);
}

.social-icons {
    display: flex;
    gap: 12px;
    margin-top: 1.5rem;
}

.social-icon-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.05);
    color: #ffffff;
    transition: all 0.3s ease;
    text-decoration: none;
}

.social-icon-btn:hover {
    background-color: #ffffff;
    color: #111111;
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(255, 255, 255, 0.15);
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.05);
    margin-top: 4rem;
    padding-top: 2rem;
    font-size: 0.875rem;
    color: #6b7280;
}

.footer-bottom a {
    color: #6b7280;
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-bottom a:hover {
    color: #ffffff;
}

/* Scroll to Top Button styling */
.scroll-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    border: 1px solid rgba(255, 255, 255, 0.15);
    opacity: 0;
    visibility: hidden;
    transform: scale(0.8);
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    z-index: 9999;
}

.scroll-to-top.show {
    opacity: 1;
    visibility: visible;
    transform: scale(1);
}

.scroll-to-top:hover {
    background: #ffffff;
    color: #1a1a1a;
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

.scroll-to-top:active {
    transform: translateY(-2px) scale(0.95);
}
</style>

<footer class="custom-footer">
  <div class="container">
    <div class="row g-4 justify-content-between">
      
      <!-- Brand & Info -->
      <div class="col-lg-4 col-md-6 footer-brand">
        <h3>Worship Cloud</h3>
        <p class="footer-text mb-4">
          Experience the power of community, worship, and spiritual growth. We welcome you to join our family in person or online.
        </p>
        <div class="social-icons">
          <a href="#" class="social-icon-btn"><i class="fa-brands fa-youtube"></i></a>
          <a href="#" class="social-icon-btn"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="social-icon-btn"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="social-icon-btn"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-3 col-md-6">
        <h5 class="footer-header">Quick Links</h5>
        <ul class="footer-links">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('sermons.index') }}">Sermons</a></li>
          <li><a href="/live">Live Streams</a></li>
          <li><a href="/upcoming">Upcoming Events</a></li>
          <li><a href="/gallery">Gallery</a></li>
          <li><a href="/prayer">Prayer Request</a></li>
        </ul>
      </div>

      <!-- Service Times & Contact -->
      <div class="col-lg-4 col-md-12">
        <h5 class="footer-header">Connect With Us</h5>
        <p class="footer-text mb-2">
          <i class="fa-solid fa-location-dot me-2 text-white"></i> palace road, Omoku, River State
        </p>
        <p class="footer-text mb-4">
          <i class="fa-solid fa-envelope me-2 text-white"></i> [EMAIL_ADDRESS]
        </p>
        
        <h6 class="text-white fw-bold mb-2 small text-uppercase" style="letter-spacing: 0.5px;">Service Times</h6>
        <p class="footer-text mb-1">Sundays — 10:00 AM</p>
        <p class="footer-text">Wednesdays — 7:00 PM</p>
      </div>

    </div>

    <!-- Bottom copyrights -->
    <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
      <p class="mb-0">&copy; {{ date('Y') }} Worship Cloud. All rights reserved.</p>
      <div class="d-flex gap-4">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>

<a href="#" class="scroll-to-top" id="scrollToTop" aria-label="Scroll to top">
  <i class="fa-solid fa-arrow-up"></i>
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const footer = document.querySelector('.custom-footer');
    if (footer) {
        document.body.appendChild(footer);
    }

    const scrollBtn = document.getElementById('scrollToTop');
    if (scrollBtn) {
        document.body.appendChild(scrollBtn);
    }
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            scrollBtn.classList.add('show');
        } else {
            scrollBtn.classList.remove('show');
        }
    });
    
    scrollBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});
</script>
