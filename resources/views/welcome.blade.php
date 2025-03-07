<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            padding: 15px 0;
        }

        .navbar-dark .navbar-nav .nav-link {
            transition: 0.3s;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #f8a100;
        }

        .hero {
            min-height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .card {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .features-section .card {
            transition: transform 0.3s;
        }

        .features-section .card:hover {
            transform: scale(1.05);
        }

        .contact-btn {
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 8px;
        }

        footer {
            padding: 20px 0;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link" href="/character">Character Match</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->

<!-- Hero Section -->
<header class="hero bg-primary text-white text-center py-5">
    <div class="container">
        <h1>Submission Technical Test for HashMicro</h1>
        <p class="lead">Okky Anugerah Arrohman</p>
        <p class="lead">Laravel Developer</p>
        <p>
            <a href="https://github.com/okkyarrohman" class="text-white me-3" target="_blank">
                <i class="fab fa-github fa-lg"></i> GitHub
            </a> |
            <a href="https://www.linkedin.com/in/okky-arrohman-06b5a8256/" class="text-white ms-3" target="_blank">
                <i class="fab fa-linkedin fa-lg"></i> LinkedIn
            </a>
        </p>
    <p class="mt-4">
        Website ini dibuat menggunakan Laravel 12, dengan blade templating enggine untuk client side. databasenya menggunakan MySql
        Untuk design architecture yang saya gunakan adalah berkonsep Repository Services pattern, jadi Query nya saya taruh di Repository Class
        , dan Services untuk proses bisnis nya.
        Tentunya sedikit kompleks fitur yang saya buat kali ini yang hanya saya kerjakan dengan deadline 1 hari. Tetapi dengan pattern ini saya tidak perlu menulis Query bekali bekali, tinggal dipanggil aja data yang ada dari class Services
        Lebih Detail nya bisa di lihat di repository Github saya
        <br>
        <a href="https://github.com/okkyarrohman/Hashmicro-test" class="text-white me-3" target="_blank">
            <i class="fab fa-github fa-lg"></i> Repo Project
        </a> 

        {{-- Website ini dibuat sebagai bagian dari technical test untuk HashMicro.
        Menggunakan teknologi Laravel untuk backend serta Bootstrap untuk tampilan UI.
        Beberapa fitur utama termasuk manajemen produk, pemesanan dengan integrasi payment gateway,
        serta fitur ekspor laporan dalam format PDF. --}}
    </p>
    </div>
</header>


    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container text-center">
            <h2 class="mb-4">Testing Account</h2>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Admin</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Role Admin</h6>
                        <p class="card-text">Email : admin@gmail.com</p>
                        <p class="card-text">Password : admin123</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Customer</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Role Customer</h6>
                        <p class="card-text">Email : customer@gmail.com</p>
                        <p class="card-text">Password : customer123</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section bg-light py-5">
        <div class="container text-center">
            <h2 class="mb-4">Our Features</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Products</h4>
                        <ul class="list-unstyled">
                            <li>✔ CRUD</li>
                            <li>✔ Export In PDF</li>
                            <li>✔ Search</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Order Products</h4>
                        <ul class="list-unstyled">
                            <li>✔ Integration with payment gateway</li>
                            <li>✔ Order multiple products</li>
                            <li>✔ Invoice</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Transaction</h4>
                        <ul class="list-unstyled">
                            <li>✔ Show transaction</li>
                            <li>✔ Detail</li>
                            <li>✔ Invoice</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container text-center">
            <h2 class="mb-3">Contact Me</h2>
            <p>Have any questions? Reach out to us!</p>
            <a href="https://api.whatsapp.com/send/?phone=6281336581930&text&type=phone_number&app_absent=0"
                class="btn btn-primary contact-btn">
                Whatsapp
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2025 MyBrand. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
