<!DOCTYPE html>
<html>
<head>
    <title>Travel Planner - Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f3ff;
        }

        .navbar {
            background-color: white;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 90px;
        }

        .logout {
            background-color: #7546e8;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }

        .content {
            text-align: center;
            margin-top: 100px;
        }

        .content h1 {
            font-size: 35px;
        }

        .content p {
            font-size: 18px;
        }
    </style>
</head>

<body>

<div class="navbar">

    <img src="{{ asset('images/logo.png') }}" class="logo">

    <a href="/logout" class="logout">Logout</a>

</div>

<div class="content">

    <h1>Welcome, {{ $user->name }}! ✈️</h1>

    <p>Welcome to your Travel Planner.</p>

</div>

</body>
</html>