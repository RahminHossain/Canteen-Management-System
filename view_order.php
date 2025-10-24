<!DOCTYPE html>
<html>
<head>
  <title>View Order - Canteen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Arial, sans-serif; background: #f8f9fa; }
    .container { margin-top: 50px; }
    .bill-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      padding: 25px;
    }
    .bill-title {
      text-align: center;
      margin-bottom: 20px;
      font-weight: bold;
      color: #343a40;
    }
    .btn-custom {
      border-radius: 6px;
      margin: 5px;
    }
  </style>
</head>
<body>

<div class="container">
<?php
if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
} else {
    echo '<div class="alert alert-danger">Order ID not specified.</div>';
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "canteen");
if (!$conn) {
    echo '<div class="alert alert-danger">Database connection failed.</div>';
    exit();
}

$check = mysqli_query($conn, "SELECT * FROM orders WHERE order_id = $order_id");
if (mysqli_num_rows($check) == 0) {
    echo '<div class="alert alert-danger">Order not found. It may have been finished already.</div>';
    exit();
}

$sql = "SELECT * FROM order_items WHERE order_id = $order_id";
$result = mysqli_query($conn, $sql);
?>

<div class="bill-card">
  <h2 class="bill-title">Bill for Order #<?php echo $order_id; ?></h2>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-hover table-bordered text-center'>
            <thead class='table-dark'>
              <tr><th>Item</th><th>Quantity</th><th>Total</th></tr>
            </thead><tbody>";
    $grand_total = 0;

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['item_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['total_cost']} Taka</td>
              </tr>";
        $grand_total += $row['total_cost'];
    }

    echo "</tbody></table>";
    echo "<div class='alert alert-success fs-5 text-center'>
            <strong>Total Bill: </strong> $grand_total Taka
          </div>";

    echo "<div class='text-center'>
            <a href='add_item.php?order_id=$order_id' class='btn btn-primary btn-custom'>➕ Add More Items</a>
            <a href='finish_order.php?order_id=$order_id' class='btn btn-success mt-3'>Finish Order</a>
          </div>";
} else {
    echo '<div class="alert alert-warning text-center">No items found in this order.</div>';
}
mysqli_close($conn);
?>
</div>
</div>

</body>
</html>