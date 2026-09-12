<!DOCTYPE html>
<html>
<head>
    <title>Travel Planner - Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f3ff;
        }

        .container {
            width: 900px;
            margin: 50px auto;
            background-color: white;
            display: flex;
            border-radius: 20px;
            overflow: hidden;
        }

        .left {
            width: 50%;
            background-image: url("{{ asset('images/login-bg.jpeg') }}");
            background-size: cover;
            background-position: center;
            padding: 40px;
            box-sizing: border-box;
            min-height: 650px;
            position: relative;
        }

        .logo {
            width: 120px;
            position: absolute;
            top: 30px;
            left: 30px;
        }

        .left h2 {
            margin-top: 150px;
            font-size: 30px;
        }

        .left p {
            font-size: 16px;
        }

        .right {
            width: 50%;
            padding: 70px 45px;
            box-sizing: border-box;
        }

        .right h1 {
            font-size: 28px;
        }

        input {
            width: 100%;
            padding: 14px;
            margin-top: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        button {
            width: 100%;
            padding: 14px;
            margin-top: 20px;
            background-color: #7546e8;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        label {
            font-weight: bold;
        }
        .register-link {
    text-align: center;
    margin-top: 20px;
}

.register-link a {
    color: #7546e8;
    text-decoration: none;
    font-weight: bold;
}
    </style>
</head>

<body>

<div class="container">

    <div class="left">

        <img src="{{ asset('images/logo.png') }}" class="logo">

        <h2>Welcome back!</h2>

        <p>
            Log in to continue planning<br>
            your next adventure
        </p>

    </div>

    <div class="right">

        <h1>Login to your account</h1>

        <p>Enter your credentials to access your account.</p>

        <form action="/login" method="POST">

            @csrf

            <label>Email address</label>
            <input type="email" name="email" placeholder="Enter your email">

            <br><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">

            <button type="submit">Login</button>
            <p class="register-link">
    Don't have an account?
    <a href="/register">Register</a>
</p>

        </form>

    </div>

</div>

</body>
</html>