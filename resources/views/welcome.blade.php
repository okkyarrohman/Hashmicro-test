<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page - HashMicro Test</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        /* Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.8);
            padding: 10px 0;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff;
            transition: 0.3s;
        }

        .navbar-dark .navbar-nav .nav-link:hover {
            color: #FB8A3C;
        }

        /* Hero Section */
        .hero {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            background: linear-gradient(to right, #FB8A3C, #f45d22);
            padding: 50px 20px;
        }

        .hero h1 {
            font-weight: 600;
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .hero a {
            text-decoration: none;
            color: white;
            transition: 0.3s;
        }

        .hero a:hover {
            color: #ffebcc;
        }

        /* Cards */
        .card {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 10px;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        /* Features Section */
        .features-section {
            background: #fff;
            padding: 60px 20px;
        }

        .features-section h2 {
            color: #FB8A3C;
        }

        /* Contact Button */
        .contact-btn {
            font-size: 18px;
            padding: 12px 25px;
            border-radius: 8px;
            background-color: #FB8A3C;
            color: white;
            transition: 0.3s;
        }

        .contact-btn:hover {
            background-color: #f45d22;
        }

        /* Footer */
        footer {
            background: #222;
            color: white;
            padding: 20px 0;
        }

        .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 20px;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #FB8A3C;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">MyBrand</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/character">Character Match</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        
        <div class="container">
            <br>
            <br>
            <br>
            <h1>Submission Technical Test for HashMicro</h1>
            <p class="lead">Okky Anugerah Arrohman - Laravel Developer</p>
            <p>
                <a href="https://github.com/okkyarrohman" target="_blank">
                    <i class="fab fa-github"></i> GitHub
                </a> |
                <a href="https://www.linkedin.com/in/okky-arrohman-06b5a8256/" target="_blank">
                    <i class="fab fa-linkedin"></i> LinkedIn
                </a>
            </p>
            <p class="mt-4">
                Website ini dibuat menggunakan Laravel 12, dengan blade templating enggine untuk client side. databasenya
                menggunakan MySql
                Untuk design architecture yang saya gunakan adalah berkonsep Repository Services pattern, jadi Query nya saya taruh
                di Repository Class
                , dan Services untuk proses bisnis nya.
                Tentunya sedikit kompleks fitur yang saya buat kali ini yang hanya saya kerjakan dengan deadline 1 hari. Tetapi
                dengan pattern ini saya tidak perlu menulis Query bekali bekali, tinggal dipanggil aja data yang ada dari class
                Services
                Lebih Detail nya bisa di lihat di repository Github saya
                <br>
                <a href="https://github.com/okkyarrohman/Hashmicro-test" class="text-white me-3" target="_blank">
                    <i class="fab fa-github fa-lg"></i> Repo Project
                </a>
            
            </p>
        </div>
    </header>

    <!-- Testing Accounts -->
    <section class="py-5 text-center">
        <div class="container">
            <h2>Testing Account</h2>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <div class="card p-3" style="width: 18rem;">
                    <h5>Admin</h5>
                    <p>Email: admin@gmail.com</p>
                    <p>Password: admin123</p>
                </div>
                <div class="card p-3" style="width: 18rem;">
                    <h5>Customer</h5>
                    <p>Email: customer@gmail.com</p>
                    <p>Password: customer123</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section text-center">
        <div class="container">
            <h2>Our Features</h2>
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
                            <li>✔ Payment Gateway</li>
                            <li>✔ Multiple Orders</li>
                            <li>✔ Invoice</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Transaction</h4>
                        <ul class="list-unstyled">
                            <li>✔ Show transaction</li>
                            <li>✔ Detail & Invoice</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; 2025 MyBrand. All rights reserved.</p>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>