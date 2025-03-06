<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MyBrand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Welcome to MyBrand</h1>
            <p class="lead">We provide amazing solutions for your business</p>
            <a href="#features" class="btn btn-light btn-lg">Explore More</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2>About Us</h2>
            <p>We are dedicated to delivering high-quality services and solutions for our customers.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="bg-light py-5">
        <div class="container text-center">
            <h2>Our Features</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <h4>Fast</h4>
                    <p>We ensure quick and efficient services.</p>
                </div>
                <div class="col-md-4">
                    <h4>Reliable</h4>
                    <p>We provide reliable solutions you can trust.</p>
                </div>
                <div class="col-md-4">
                    <h4>Secure</h4>
                    <p>Your data is always safe with us.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container text-center">
            <h2>Contact Us</h2>
            <p>Have any questions? Reach out to us!</p>
            <a href="mailto:info@mybrand.com" class="btn btn-primary">Email Us</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 MyBrand. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
