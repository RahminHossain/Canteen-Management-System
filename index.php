<!DOCTYPE html>
<html>
<head>
  <title>Canteen Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .hero {
      background: linear-gradient(120deg, #ff7e5f, #feb47b);
      color: white;
      padding: 60px 20px;
      text-align: center;
    }
    .hero img {
      max-width: 180px;
      margin-bottom: 20px;
    }
    .features {
      padding: 40px 20px;
    }
    .feature-box {
      background: #f8f9fa;
      border-radius: 8px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }
    .feature-box:hover {
      transform: translateY(-5px);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Canteen System</a>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero">
  <img src="https://cdn-icons-png.flaticon.com/512/2921/2921822.png" alt="Canteen Icon">
  <h1 class="fw-bold">Welcome to the Canteen Management System</h1>
  <p class="lead">Order food easily, track your orders, and get instant bills.</p>
  <a href="start_order.php" class="btn btn-light btn-lg mt-3">Start New Order</a>
</div>

<!-- Features Section -->
<div class="container features">
  <h2 class="text-center mb-5">Why Use Our System?</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="feature-box">
        <h4>🍔 Easy Ordering</h4>
        <p>Quickly select your favorite items and place your order in seconds.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-box">
        <h4>📊 Digital Records</h4>
        <p>All your orders are saved in the system for future reference.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-box">
        <h4>🧾 Instant Bills</h4>
        <p>Get a clear, automatically generated receipt for every order.</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
