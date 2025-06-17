<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: url('{{ asset('images/background.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            max-width: 400px;
            width: 90%;
            margin: 80px auto;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            color: #fff;
        }

        .overlay h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #ffffff;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        input::placeholder {
            color: #e0f7fa;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #4dd0e1;
            color: #fff;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #00acc1;
        }

        .link {
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            color: #b2ebf2;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ffcccb;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h2>Register</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus autocomplete="name">
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="username">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <input type="password" name="password" placeholder="Password" required autocomplete="new-password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn">Register</button>
        </form>

        <div class="link">
            <a href="{{ route('login') }}">Already registered?</a>
        </div>
    </div>
</body>
</html>
