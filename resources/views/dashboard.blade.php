<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>
    body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #f4f6f9;
        font-family: Arial, sans-serif;
        background: linear-gradient(to right, #667eea, #764ba2);
    }

    .card {
        background: white;
        padding: 40px;
        width: 350px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card h2 {
        margin-bottom: 25px;
        color: #333;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        margin: 10px 0;
        text-decoration: none;
        color: white;
        border-radius: 5px;
    }

    .btn-foodpanda {
        background: #d70f64;
    }

    .btn-logout {
        background: #333;
    }

    .btn:hover {
        opacity: 0.9;
    }

</style>

</head>
<body>

<div class="card">
    <h2>Welcome {{ session('name') }}</h2>

    <a href="/foodpanda" class="btn btn-foodpanda">
        Go To Foodpanda
    </a>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit" class="btn btn-logout" style="border:none; cursor:pointer;">
            Logout
        </button>
    </form>
</div>

</body>
</html>
