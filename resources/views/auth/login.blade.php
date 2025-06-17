<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 40px;
            width: 360px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            color: #fff;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 24px;
            color: #ffffff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border-radius: 8px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        input::placeholder {
            color: #eee;
        }

        .login-button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 24px;
            background-color: #6EC1E4; /* pastel blue */
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-button:hover {
            background-color: #5ab1d6;
        }

        .login-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 12px;
            font-size: 14px;
        }

        .login-footer a {
            color: #d0eaff;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Welcome</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <button class="login-button" type="submit">LOGIN</button>

            <div class="login-footer">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                <a href="{{ route('register') }}">Sign Up</a>
            </div>
        </form>
    </div>
</body>
</html>
