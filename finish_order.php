<!DOCTYPE html>
<html>
<head>
  <title>Finish Order - Canteen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; }
    .finish-card {
      max-width: 600px;
      margin: 100px auto;
      background: #fff;
      border-radius: 12px;
      padding: 40px;
      text-align: center;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    }
    .finish-card h2 {
      color: #28a745;
      font-weight: bold;
    }
    .finish-card p {
      font-size: 1.2rem;
      margin: 20px 0;
    }
    .btn-custom { margin: 10px; border-radius: 6px; }
  </style>
</head>
<body>

<div class="finish-card">
<?php
if (!isset($_GET['order_id'])) {
    echo "<div class='alert alert-danger'>Order ID missing.</div>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "canteen");
if (!$conn) {
    die("<div class='alert alert-danger'>Database connection failed.</div>");
}

$order_id = intval($_GET['order_id']);
?>

  <h2>✅ Order Completed</h2>
  <p>Your Order ID: <strong>#<?php echo $order_id; ?></strong> has been successfully saved.</p>
  <div>
    <a href="index.php" class="btn btn-dark btn-custom">🏠 Back to Home</a>
    <a href="view_order.php?order_id=<?php echo $order_id; ?>" class="btn btn-primary btn-custom">📄 View Order</a>
  </div>

<?php mysqli_close($conn); ?>
</div>

</body>
</html>

