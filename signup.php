<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up | Auth System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(120deg, #6610f2, #20c997);
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
      <h3 class="text-center mb-4 text-success">📝 Sign Up</h3>
      <form method="post">
        <input type="text" name="username" class="form-control mb-3" placeholder="👤 Choose a username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="🔒 Choose a password" required>
        <button class="btn btn-success w-100">Create Account</button>
        <div class="text-center mt-3">
          <a href="login.php">Already have an account? Login</a>
        </div>
      </form>

<?php

      if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = trim($_POST['username']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Check if the username already exists
  $checkStmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
  $checkStmt->bind_param("s", $username);
  $checkStmt->execute();
  $checkStmt->store_result();

  if ($checkStmt->num_rows > 0) {
    echo '<div class="alert alert-danger mt-3">❌ That username is already taken. Try another one.</div>';
  } else {
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
      $_SESSION['username'] = $username;
      header("Location: dashboard.php");
    } else {
      echo '<div class="alert alert-danger mt-3">❌ Something went wrong while creating the account.</div>';
    }
  }

  $checkStmt->close();
}
?>

      
    </div>
  </div>
</body>
</html>
