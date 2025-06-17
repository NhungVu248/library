<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for Banner */
        .banner {
            background: url('{{ asset("images/banner.jpg") }}') no-repeat center center;
            background-size: contain;
            height: 400px; /* Increased height to show full image */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            position: relative;
            margin-bottom: 40px;
        }
        
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand, .nav-link {
            color: #333 !important;
        }

        .navbar-brand {
            font-weight: bold;
        }

        .nav-link:hover {
            color: #00b894 !important;
        }

        .shop-section {
            padding: 40px 0;
            background-color: #f9f9f9;
            text-align: center;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .btn-primary {
            background-color: #ff9999;
            border: none;
        }

        .btn-primary:hover {
            background-color: #ff6666;
        }

        .newsletter-section {
            background-color: #e9ecef;
            padding: 40px 0;
            text-align: center;
            margin: 40px 0;
        }

        .newsletter-section input {
            max-width: 300px;
            margin: 10px auto;
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        .newsletter-btn {
            background-color: #ff9999;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
        }

        .newsletter-btn:hover {
            background-color: #ff6666;
        }

        .blog-section {
            padding: 40px 0;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Library Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/books') }}">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/students') }}">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/librarians') }}">Librarians</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/borrowings') }}">Borrowings</a>
                    </li>
                </ul>
                <div>
                    <a href="{{ route('logout') }}" class="btn btn-outline-primary"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Banner Section -->
    <div class="banner">
    </div>

    <!-- Cards Section -->
    <div class="container shop-section">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/book.jpg') }}" class="card-img-top" alt="Card 1">
                    <div class="card-body">
                        <h5 class="card-title">Books</h5>
                        <p class="card-text">Manage all book information efficiently and with ease.</p>
                        <a href="{{ url('/books') }}" class="btn btn-primary">Add Book</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/student.jpg') }}" class="card-img-top" alt="Card 2">
                    <div class="card-body">
                        <h5 class="card-title">Students</h5>
                        <p class="card-text">Browse and manage students offered by your organization.</p>
                        <a href="{{ url('/students') }}" class="btn btn-primary">Add Student</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/librarian.jpg') }}" class="card-img-top" alt="Card 3">
                    <div class="card-body">
                        <h5 class="card-title">Librarians</h5>
                        <p class="card-text">Manage all librarian information efficiently with ease.</p>
                        <a href="{{ url('/librarians') }}" class="btn btn-primary">Add Librarian</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="container newsletter-section">
        <h2>Sign Up For Our Newsletter</h2>
        <p>Subscribe to get updates on author interviews, and book club specials.</p>
        <input type="email" placeholder="Email Address" class="form-control">
        <button class="newsletter-btn">Sign Up</button>
    </div>

    <!-- Blog Section -->
    <div class="container blog-section">
        <h2>Recently on the Blog</h2>
        <p>Use the navigation menu to explore Students, Books, and Librarians.</p>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 School Library</p>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>