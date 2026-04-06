<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICT Training Programs | WALTECH ICT SERVICES AND CONSULTANT LTD</title>

    <!-- SEO Meta -->
    <meta name="description" content="WALTECH ICT Services and Consultant Ltd offers professional ICT training in website development, app/software development, computer repairs, graphic design, and laptop maintenance.">
    <meta name="keywords" content="ICT training Nigeria, website development training, app development training, computer repair training, graphic design training, WALTECH ICT">
    <meta name="author" content="WALTECH ICT SERVICES AND CONSULTANT LTD">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('includes.nav')


<!-- ===================== CAROUSEL ===================== -->
<div id="trainingCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#trainingCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#trainingCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#trainingCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1581091870627-3a29c7e56c8d?auto=format&fit=crop&w=1600&q=80" class="d-block w-100" alt="ICT Training">
            <div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
                <h2>Professional ICT Training</h2>
                <p>Empowering students with in-demand digital skills</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1600267185393-e158a98703de?auto=format&fit=crop&w=1600&q=80" class="d-block w-100" alt="Software Development Training">
            <div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
                <h2>Website & App Development</h2>
                <p>Learn practical coding and real-world projects</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1593642634367-d91a135587b5?auto=format&fit=crop&w=1600&q=80" class="d-block w-100" alt="Computer Repair Training">
            <div class="carousel-caption bg-dark bg-opacity-50 rounded p-3">
                <h2>Computer Repairs & Hardware Training</h2>
                <p>Hands-on training with modern tools</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#trainingCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#trainingCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- ===================== INTRO ===================== -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2>Our ICT Training Programs</h2>
            <p class="text-muted">
                At WALTECH ICT SERVICES AND CONSULTANT LTD, we provide structured, hands-on training
                designed to equip students with practical and employable ICT skills.
            </p>
        </div>
    </div>
</section>

<!-- ===================== TRAINING AREAS ===================== -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Website Design & Development</h5>
                        <p class="card-text">
                            Learn how to design and build modern, responsive websites using HTML,
                            CSS, Bootstrap, JavaScript, and backend technologies.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">App & Software Development</h5>
                        <p class="card-text">
                            Master application and software development concepts, from planning
                            and design to coding, testing, and deployment.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Computer Repairs & Installation</h5>
                        <p class="card-text">
                            Hands-on training in computer hardware repairs, troubleshooting,
                            operating system installation, and system maintenance.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Graphic Design</h5>
                        <p class="card-text">
                            Learn professional graphic design using industry tools for branding,
                            flyers, banners, logos, and digital marketing materials.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Laptop Sales & Maintenance</h5>
                        <p class="card-text">
                            Training covers laptop diagnostics, upgrades, maintenance, and
                            professional handling of computer sales and supplies.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Practical Student Training</h5>
                        <p class="card-text">
                            All our programs are practical-based, ensuring students gain real
                            experience and confidence in the services we render.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===================== CALL TO ACTION ===================== -->
<section class="py-5">
    <div class="container text-center">
        <h3>Start Your ICT Career with WALTECH</h3>
        <p class="mb-4">
            Whether you are a beginner or looking to upgrade your skills,
            our training programs are designed to prepare you for today’s ICT industry.
        </p>
        <a href="contact.html" class="btn btn-primary btn-lg">
            Enroll for Training
        </a>
    </div>
</section>

<!-- ===================== FOOTER ===================== -->
<footer class="bg-dark text-light py-3">
    <div class="container text-center">
        <p class="mb-0">&copy; 2026 WALTECH ICT SERVICES AND CONSULTANT LTD. All Rights Reserved.</p>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
