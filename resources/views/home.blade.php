<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <title>WALTECH ICT SERVICES AND CONSULTANT LTD | ICT Solutions & Training</title>
    <meta name="description" content="WALTECH ICT SERVICES AND CONSULTANT LTD provides professional website development, app & software development, computer repairs, graphic design, laptop sales, and ICT training.">
    <meta name="keywords" content="ICT training, website development, software development, computer repairs, laptop sales, ICT company in Nigeria">
    <meta name="author" content="WALTECH ICT SERVICES AND CONSULTANT LTD">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-caption {
            background: rgba(0,0,0,0.55);
            padding: 20px;
            border-radius: 8px;
        }
        .service-card i {
            font-size: 40px;
            color: #0d6efd;
        }
        .achievement-icon {
            font-size: 45px;
            color: #0d6efd;
        }
        .cta-section {
            background: linear-gradient(135deg, #0d6efd, #031633);
            color: #fff;
        }
    </style>
</head>
<body>

<!-- ===================== NAVBAR ===================== -->
@include('includes.nav')
@auth 
    <div class="alert alert-success text-center mb-0" role="alert">
        Welcome back, {{ Auth::user()->name }}!
        {{('You are logged in to WALTECH ICT. Explore our services and training programs.') }}
    </div>
@endauth

<!-- ===================== CAROUSEL ===================== -->
<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <div class="carousel-item active">
            <div class="carousel-caption hero-caption">
                <h1 class="fw-bold">ICT Solutions That Drive Growth</h1>
                <p>Professional Website, App & Software Development</p>
            </div>
        </div>

        <div class="carousel-item">
             <div class="carousel-caption hero-caption">
                <h1 class="fw-bold">ICT Training & Capacity Building</h1>
                <p>We Train Students & Professionals for the Digital Future</p>
            </div>
        </div>

        <div class="carousel-item">
            <div class="carousel-caption hero-caption">
                <h1 class="fw-bold">Computer Sales & Technical Support</h1>
                <p>Laptops, Repairs, Installation & Maintenance</p>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- ===================== ABOUT ===================== -->
<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Welcome to WALTECH ICT SERVICES AND CONSULTANT LTD</h2>
        <p class="text-muted">
            We are a professional ICT company delivering innovative digital solutions, reliable technical services,
            and hands-on ICT training. Our goal is to empower individuals, businesses, and organizations through technology.
        </p>
    </div>
</section>

<!-- ===================== SERVICES ===================== -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Core Services</h2>
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card service-card h-100 text-center p-4">
                    <i class="bi bi-code-slash"></i>
                    <h5 class="mt-3">Website Design & Development</h5>
                    <p class="text-muted">Modern, responsive, and SEO-friendly websites tailored to your business goals.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 text-center p-4">
                    <i class="bi bi-phone"></i>
                    <h5 class="mt-3">App & Software Development</h5>
                    <p class="text-muted">Custom mobile and desktop applications built with performance and security in mind.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 text-center p-4">
                    <i class="bi bi-tools"></i>
                    <h5 class="mt-3">Computer Repairs & Installation</h5>
                    <p class="text-muted">Hardware repairs, system installation, networking, and technical support.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 text-center p-4">
                    <i class="bi bi-palette"></i>
                    <h5 class="mt-3">Graphic Design</h5>
                    <p class="text-muted">Creative designs for branding, marketing, and digital presence.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 text-center p-4">
                    <i class="bi bi-laptop"></i>
                    <h5 class="mt-3">Computer & Laptop Sales</h5>
                    <p class="text-muted">Sales and supply of quality laptops, desktops, and ICT accessories.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card service-card h-100 text-center p-4">
                    <i class="bi bi-mortarboard"></i>
                    <h5 class="mt-3">ICT Training</h5>
                    <p class="text-muted">Practical training in all our services for students and professionals.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===================== ACHIEVEMENTS ===================== -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Achievements</h2>
        <div class="row text-center">

            <div class="col-md-3">
                <i class="achievement-icon bi bi-people"></i>
                <h5 class="mt-3">Students Trained</h5>
            </div>

            <div class="col-md-3">
                <i class="achievement-icon bi bi-check-circle"></i>
                <h5 class="mt-3">Projects Completed</h5>
            </div>

            <div class="col-md-3">
                <i class="achievement-icon bi bi-hand-thumbs-up"></i>
                <h5 class="mt-3">Happy Clients</h5>
            </div>

            <div class="col-md-3">
                <i class="achievement-icon bi bi-award"></i>
                <h5 class="mt-3">Years of Experience</h5>
            </div>

        </div>
    </div>
</section>

<!-- ===================== CTA ===================== -->
<section class="cta-section py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to Work or Learn With Us?</h2>
        <p class="mb-4">Partner with WALTECH ICT SERVICES AND CONSULTANT LTD for quality solutions and practical ICT training.</p>
        <a href="#" class="btn btn-light btn-lg">Contact Us Today</a>
    </div>
</section>

<!-- ===================== FOOTER ===================== -->
<footer class="bg-dark text-light py-4">
    <div class="container text-center">
        <p class="mb-0">&copy; 2026 WALTECH ICT SERVICES AND CONSULTANT LTD. All Rights Reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>