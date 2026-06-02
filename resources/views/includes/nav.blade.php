<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <style>
    .custom-navbar {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.08);
        padding: 0.8rem 0;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .custom-navbar .navbar-brand {
        font-family: 'Outfit', sans-serif;
        font-size: 1.35rem;
        font-weight: 700;
        letter-spacing: -0.03em;
        color: #1a1a1a !important;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .custom-navbar .navbar-brand span {
        background: linear-gradient(135deg, #111111 0%, #555555 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .custom-navbar .navbar-brand:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    .custom-navbar .nav-link {
        color: rgba(0, 0, 0, 0.65) !important;
        font-weight: 500;
        font-size: 0.925rem;
        padding: 0.5rem 1rem !important;
        position: relative;
        transition: all 0.25s ease;
    }

    .custom-navbar .nav-link:hover {
        color: #000000 !important;
    }

    .custom-navbar .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #000000, #555555);
        transition: all 0.25s ease;
        transform: translateX(-50%);
    }

    .custom-navbar .nav-link:hover::after,
    .custom-navbar .nav-link.active::after {
        width: 80%;
    }

    .custom-navbar .nav-link.active {
        color: #000000 !important;
        font-weight: 600;
    }

    .custom-navbar .navbar-toggler {
        border: 1px solid rgba(0, 0, 0, 0.1);
        padding: 0.4rem 0.6rem;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .custom-navbar .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.1);
    }

    .btn-nav-pill {
        border-radius: 50px;
        padding: 0.5rem 1.3rem !important;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.25s ease;
        margin-left: 0.5rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-nav-primary {
        background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%);
        color: #ffffff !important;
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-nav-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.25);
        color: #ffffff !important;
        opacity: 0.95;
    }

    .btn-nav-secondary {
        border: 1px solid rgba(0, 0, 0, 0.15);
        color: rgba(0, 0, 0, 0.7) !important;
    }

    .btn-nav-secondary:hover {
        background: rgba(0, 0, 0, 0.05);
        border-color: rgba(0, 0, 0, 0.3);
        color: #000000 !important;
    }

    .btn-nav-danger {
        border: 1px solid rgba(239, 68, 68, 0.3);
        color: #ef4444 !important;
    }

    .btn-nav-danger:hover {
        background: rgba(239, 68, 68, 0.1);
        border-color: rgba(239, 68, 68, 0.5);
        color: #dc2626 !important;
    }

    .custom-navbar .dropdown-menu {
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        margin-top: 10px;
    }

    .custom-navbar .dropdown-item {
        color: rgba(0, 0, 0, 0.7);
        font-weight: 500;
        font-size: 0.875rem;
        padding: 0.6rem 1.2rem;
        transition: all 0.2s ease;
        display: inline-block;
        margin: 0.5rem 0;
        border-radius: 50px;
        text-align: center;
        width: 100%;
    }

    .custom-navbar .dropdown-item:hover {
        background: rgba(0, 0, 0, 0.05);
        color: #000000;
        text-align: center;
    }

    nav {
        position: fixed;
        top: 0;
        z-index: 1050;
    }

    /* Mobile Toggle Button Override */
    .custom-navbar .navbar-toggler {
        border: none;
        padding: 0.5rem;
        font-size: 1.35rem;
        color: #1a1a1a !important;
        transition: all 0.3s ease;
        outline: none;
    }
    
    .custom-navbar .navbar-toggler:focus {
        box-shadow: none;
    }
    
    .custom-navbar .navbar-toggler:hover {
        transform: scale(1.08);
    }

    /* Mobile Dropdown Styling */
    @media (max-width: 991.98px) {
        .custom-navbar .navbar-collapse {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 16px;
            padding: 1.5rem;
            margin-top: 1rem;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            transition: all 0.3s ease;
        }

        .custom-navbar .nav-link {
            padding: 0.75rem 1rem !important;
            border-radius: 8px;
            font-size: 0.95rem;
        }

        .custom-navbar .nav-link:hover, 
        .custom-navbar .nav-link.active {
            background: rgba(0, 0, 0, 0.03);
            padding-left: 1.3rem !important;
        }

        .custom-navbar .nav-link::after {
            display: none !important; /* Hide bottom line effect on mobile collapse list */
        }

        .btn-nav-pill {
            margin-left: 0 !important;
            margin-top: 0.5rem;
            width: 100%;
            text-align: center;
        }
        
        .navbar-nav {
            gap: 0.3rem;
        }
    }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="img-fluid">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('sermons*') ? 'active' : '' }}" href="{{ route('sermons.index') }}">Sermons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('live*') ? 'active' : '' }}" href="/live">Live Streams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('upcoming*') ? 'active' : '' }}" href="/upcoming">Upcoming Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}" href="/gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prayer*') ? 'active' : '' }}" href="/prayer">Prayer Request</a>
                    </li>
                   
                    @auth
                        <li class="nav-item ms-lg-2">
                            <a href="{{ route('admin.dashboard') }}" class="btn-nav-pill btn-nav-secondary text-decoration-none">
                               Admin Panel
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn-nav-pill btn-nav-danger btn btn-link text-decoration-none">
                                 Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item ms-lg-2">
                            <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn-nav-pill btn-nav-primary text-decoration-none" href="{{ route('register') }}">Sign Up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @include('includes.foot')
</body>
</html>