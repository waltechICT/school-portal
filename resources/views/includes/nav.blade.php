<!-- ===================== NAVBAR ===================== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">WALTECH ICT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="training">Training</a></li>
                <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
                @auth
                  
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link" style="color: white; text-decoration: none;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="login">sign-in</a></li>
                    <li class="nav-item"><a class="nav-link" href="register">signup</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    nav{
        position: sticky;
        top: 0;
        z-index: 1000;
    }
</style>