<!DOCTYPE html>
<html>
<head>
<title>Ecommerce Login</title>
<style>
body{background:#f4f6f9;font-family:sans-serif}
.card{width:350px;margin:100px auto;padding:30px;background:white;border-radius:10px;box-shadow:0 5px 20px #ccc}
input{width:100%;padding:10px;margin:10px 0}
button{background:#007bff;color:white;padding:10px;width:100%;border:none}
</style>
</head>
<body>
<div class="card">
<h2>🛒 Ecommerce Login</h2>
@if(session('error'))
    <div style="color:red;">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div style="color:red;">
        {{ $errors->first() }}
    </div>
@endif
<form method="POST" action="/login">
@csrf
<input type="email" name="email" placeholder="Email">
<input type="password" name="password" placeholder="Password">
<button type="submit">Login</button>
</form>
</div>
</body>
</html>
