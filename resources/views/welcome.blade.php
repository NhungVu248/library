<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            background-color: #ffffff;
        }

        .navbar {
            width: 100%;
            padding: 20px 100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #007BFF;
        }

        .navbar .auth-links a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .navbar .auth-links a:first-child {
            background-color: #007BFF;
            color: #fff;
        }

        .navbar .auth-links a:first-child:hover {
            background-color: #0056b3;
        }

        .navbar .auth-links a:last-child {
            color: #00b894;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 140px 100px 80px;
            height: 100vh;
        }

        .left {
            max-width: 40%;
        }

        .left h1 {
            font-size: 48px;
            color: #000;
            margin-bottom: 20px;
        }

        .left h1 span {
            color: #00b894;
        }

        .left p {
            font-size: 16px;
            color: #555;
            margin-bottom: 40px;
            max-width: 400px;
        }

        .right {
            max-width: 60%;
        }

        .right img {
            width: 130%;
            height: auto;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 40px 100px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            color: #333;
        }

        .footer .footer-section {
            flex: 1;
            margin-right: 20px;
        }

        .footer .footer-section h3 {
            font-size: 18px;
            font-weight: bold;
            color: #007BFF;
            margin-bottom: 15px;
        }

        .footer .footer-section p,
        .footer .footer-section a {
            font-size: 14px;
            color: #555;
            text-decoration: none;
            margin-bottom: 10px;
            display: block;
        }

        .footer .footer-section a:hover {
            color: #00b894;
        }

        .footer .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            margin-top: 20px;
            width: 100%;
            font-size: 14px;
            color: #555;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                text-align: center;
                padding: 120px 20px 40px;
            }

            .left, .right {
                max-width: 100%;
            }

            .right {
                margin-top: 30px;
            }

            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }

            .navbar .auth-links {
                margin-top: 10px;
            }

            .footer {
                flex-direction: column;
                padding: 20px;
                text-align: center;
            }

            .footer .footer-section {
                margin-bottom: 20px;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>

    <div class="navbar">
        <div class="logo">📚 Library</div>
        <div class="auth-links">
            @if (Route::has('login'))
                <a href="{{ route('login') }}">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endif
        </div>
    </div>

    <div class="container">
        <div class="left">
            <h1>Welcome Back! <br><span>Library-Management</span></h1>
            <p>Hệ thống quản lý thư viện trực tuyến giúp bạn tra cứu, mượn sách và quản lý tài liệu một cách dễ dàng và hiệu quả.</p>
        </div>
        <div class="right">
            <img src="/images/Home.png" alt="Illustration">
        </div>
    </div>

    <footer class="footer">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>Online Library Management System provides easy access to books and resources.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">Browse Books</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="footer-section">
            <h3>Contact</h3>
            <p>Email: support@library.com</p>
            <p>Phone: +84 123 456 789</p>
            <p>Address: 123 Library St, Hanoi</p>
        </div>
        <div class="footer-bottom">
            &copy; 2025 Online Library. All rights reserved.
        </div>
    </footer>
</body>
</html>