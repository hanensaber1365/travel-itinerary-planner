<!DOCTYPE html>
<html>
<head>
    <title>Travel Planner - Register</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f3ff;
        }
        .main-reg{
            width: 100%;
            height: 100vh;
        }
        .center-div{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
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
            background-image: url("{{ asset('images/register-bg.jpeg') }}");
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
            padding: 50px 45px;
            box-sizing: border-box;
        }

        .right h1 {
            font-size: 28px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            margin-bottom: 15px;
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

        .error {
            color: red;
            font-size: 13px;
        }
        .login-link {
    text-align: center;
    margin-top: 20px;
}

.login-link a {
    color: #7546e8;
    text-decoration: none;
    font-weight: bold;
}
    </style>
</head>

<body>
<div class="main-reg">
<div class="center-div">
<div class="container">

    <div class="left">

        <img src="{{ asset('images/logo.png') }}" class="logo">

        <h2>Create your account!</h2>

        <p>
            Start planning your next<br>
            adventure with us.
        </p>

    </div>

    <div class="right">

        <h1>Create an account</h1>

        <p>Enter your information to create your account.</p>

        <form action="/login" method="POST">

            @csrf

            <label>Name</label>
            <input class="my-2" type="text" name="name" placeholder="Enter your name"
                   value="{{ old('name') }}">

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <br>

            <label>Email address</label>
            <input class="my-2" type="email" name="email" placeholder="Enter your email"
                   value="{{ old('email') }}">

            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <br>

            <label>Password</label>
            <input class="my-2" type="password" name="password" placeholder="Enter your password">

            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <br>

            <label>Confirm Password</label>
            <input class="my-2" type="password"
                   name="password_confirmation"
                   placeholder="Confirm your password">

            <button type="submit">Create Account</button>
<p class="login-link">
    Already have an account?
    <a class="my-2" href="/login">Login</a>
</p>
        </form>

    </div>

</div>
</div>
</div>
</body>
</html>