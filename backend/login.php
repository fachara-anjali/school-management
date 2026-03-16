<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
<h2>Login Form</h2>

<form action="login_process.php" method="POST">

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" name="login" class="btn btn-success">
Login
</button>
<button type="submit" name="Create account" class="btn btn-success">
Create account
</button>

</form>
</div>

</body>
</html>