<?php
require 'config.php';
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 1rem;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">📊 My Dashboard</a>
      <div class="d-flex">
        <span class="navbar-text text-white me-3">
          Welcome, <?= htmlspecialchars($_SESSION['username']) ?>
        </span>
        <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>📁 Overview</h5>
          <p>Quick summary of your user activity.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>📊 Stats</h5>
          <p>Performance metrics and login history.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>⚙️ Settings</h5>
          <p>Manage profile and preferences.</p>
        </div>
        <div class="col-md-4">        
      </div>
    </div>
  </div>

  
  <div class="container py-4">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>📈 Overview</h5>
          <p>Track your progress and view key metrics at a glance.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>📱 Stats</h5>
          <p>View detailed analytics and usage statistics on your mobile device.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm p-3">
          <h5>🔧 Settings</h5>
          <p>Configure your account settings and customize your experience.</p>
        </div>
        <div class="col-md-4">        
      </div>
    </div>
  </div>
</body>
</html>
