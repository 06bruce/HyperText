<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Auth System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(120deg, #007bff, #6610f2);
      height: 100vh;
    }
    .card {
      border-radius: 1rem;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="min-width: 350px;">
      <h3 class="text-center mb-4 text-primary">🔐 Login</h3>
      <form method="post">
        <input type="text" name="username" class="form-control mb-3" placeholder="👤 Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="🔒 Password" required>
        <button class="btn btn-primary w-100">Login</button>
        <div class="text-center mt-3">
          <a href="signup.php">Don't have an account? Sign up</a>
        </div>
      </form>
      <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
          $username = $_POST['username'];
          $password = $_POST['password'];
          $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
          $stmt->bind_param("s", $username);
          $stmt->execute();
          $user = $stmt->get_result()->fetch_assoc();
          if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
          } else {
            echo '<div class="alert alert-danger mt-3">❌ Incorrect username or password.</div>';
          }
        }
      ?>
    </div>
  </div>
</body>
</html>
