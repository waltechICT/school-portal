<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services | WALTECH ICT SERVICES AND CONSULTANT LTD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            line-height: 1.7;
        }
        .carousel-item img {
            height: 80vh;
            object-fit: cover;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
        }
        .counter {
            font-size: 3rem;
            font-weight: bold;
            color: #0d6efd;
        }
    </style>
</head>
<body>

    @include('includes.nav')
 
    <!-- ===================== SERVICES PAGE CAROUSEL ===================== -->
<div id="servicesCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#servicesCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="/assets/images/services/web-development.jpg" class="d-block w-100" alt="Web and App Development">
            <div class="carousel-caption d-none d-md-block">
                <h2>Innovative Web & App Solutions</h2>
                <p>We design and develop modern, scalable websites and applications that drive business growth.</p>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="/assets/images/services/computer-services.jpg" class="d-block w-100" alt="Computer Repairs and Sales">
            <div class="carousel-caption d-none d-md-block">
                <h2>Computer Sales, Repairs & Installation</h2>
                <p>Reliable systems, professional repairs, and quality laptops for individuals and organizations.</p>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="/assets/images/services/training.jpg" class="d-block w-100" alt="ICT Training">
            <div class="carousel-caption d-none d-md-block">
                <h2>Professional ICT Training</h2>
                <p>We empower students and professionals with practical, in-demand tech skills.</p>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

</div>

<section class="py-5">
    <div class="container text-center">
        <h2 class="mb-3">Our Services</h2>
        <p class="lead">
            WALTECH ICT SERVICES AND CONSULTANT LTD delivers innovative digital solutions,
            professional ICT services, and hands-on training tailored to meet modern
            business and educational needs.
        </p>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">

            <!-- Web Development -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Website Design & Development</h5>
                        <p class="card-text">
                            We create responsive, SEO-optimized, and user-friendly websites
                            tailored for businesses, organizations, and individuals.
                        </p>
                    </div>
                </div>
            </div>

            <!-- App Development -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">App & Software Development</h5>
                        <p class="card-text">
                            From custom business applications to enterprise software solutions,
                            we design scalable systems that solve real-world problems.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Computer Repairs -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Computer Repairs & Installation</h5>
                        <p class="card-text">
                            Professional troubleshooting, repairs, networking, and system installations
                            for homes, offices, and institutions.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Graphic Design -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Graphic Design</h5>
                        <p class="card-text">
                            Creative designs including logos, flyers, banners, branding materials,
                            and digital media content that elevate your brand identity.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Computer Sales -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Computer & Laptop Sales</h5>
                        <p class="card-text">
                            Sales and supply of quality computers, laptops, accessories,
                            and ICT equipment for individuals and corporate clients.
                        </p>
                    </div>
                </div>
            </div>

            <!-- ICT Training -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">ICT Training & Skill Development</h5>
                        <p class="card-text">
                            Practical training programs covering web development, app development,
                            graphic design, computer maintenance, and more.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h3>Hands-On ICT Training</h3>
                <p>
                    At WALTECH ICT SERVICES AND CONSULTANT LTD, training is practical,
                    industry-focused, and result-driven. Our students gain real-world
                    experience using modern tools and technologies.
                </p>
                <ul>
                    <li>Beginner to Advanced Level</li>
                    <li>Project-Based Learning</li>
                    <li>Experienced Instructors</li>
                    <li>Career-Focused Skills</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="/assets/images/services/training-lab.jpg" class="img-fluid rounded" alt="ICT Training">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-dark text-white">
    <div class="container text-center">
        <h3>Why Choose WALTECH?</h3>
        <p class="mt-3">
            We combine technical expertise, creativity, and education to deliver
            complete ICT solutions you can trust.
        </p>
        <div class="row mt-4">
            <div class="col-md-3">✔ Professional Team</div>
            <div class="col-md-3">✔ Quality Service Delivery</div>
            <div class="col-md-3">✔ Affordable Pricing</div>
            <div class="col-md-3">✔ Practical Training</div>
        </div>
    </div>
</section>

<section class="py-5 text-center">
    <div class="container">
        <h3>Ready to Work With Us?</h3>
        <p>
            Whether you need digital solutions, ICT services, or professional training,
            WALTECH ICT SERVICES AND CONSULTANT LTD is here to help.
        </p>
        <a href="/contact" class="btn btn-primary btn-lg">
            Contact WALTECH Today
        </a>
    </div>
</section>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
