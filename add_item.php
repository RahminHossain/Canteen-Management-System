<!DOCTYPE html>
<html>
<head>
  <title>Add Items to Order - Canteen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .item-card {
        cursor: pointer;
        transition: transform 0.2s;
    }
    .item-card:hover {
        transform: scale(1.05);
    }
  </style>
</head>
<body class="container mt-5">

<?php
// Get order ID safely
if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
} elseif (isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);
} else {
    echo '<div class="alert alert-danger">Order ID not specified.</div>';
    exit();
}

echo "<h2 class='mb-4'>Add Items to Order ID: $order_id</h2>";

// Database connection
$conn = mysqli_connect("localhost", "root", "", "canteen");
if (!$conn) {
    echo '<div class="alert alert-danger mt-3">Database connection failed.</div>';
    exit();
}

// Price list
$prices = [
    "Bun" => 12, "Cake" => 20, "Burger" => 70, "Pizza" => 100,
    "Noodles" => 50, "Coke" => 25, "Water" => 15, "Coffee" => 20
];

// Handle item insertion
if (isset($_POST['item']) && isset($_POST['quantity'])) {
    $item = $_POST['item'];
    $quantity = intval($_POST['quantity']);

    if (isset($prices[$item]) && $quantity > 0) {
        $total_cost = $prices[$item] * $quantity;
        $sql = "INSERT INTO order_items (order_id, item_name, quantity, total_cost)
                VALUES ($order_id, '$item', $quantity, $total_cost)";
        mysqli_query($conn, $sql);
    }
}
?>

<!-- Item selection grid -->
<div class="row">
  <?php foreach ($prices as $name => $price): ?>
    <div class="col-md-3 mb-3">
      <form method="post" action="add_item.php?order_id=<?php echo $order_id; ?>">
        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
        <input type="hidden" name="item" value="<?php echo $name; ?>">
        <div class="card item-card p-3 text-center">
          <h5 class="card-title"><?php echo $name; ?></h5>
          <p class="text-success fw-bold"><?php echo $price; ?> Taka</p>
          <input type="number" name="quantity" class="form-control mb-2" placeholder="Qty" min="1" required>
          <button type="submit" class="btn btn-sm btn-success">Add</button>
        </div>
      </form>
    </div>
  <?php endforeach; ?>
</div>

<hr>

<!-- Current items table -->
<h4>Current Items in Order</h4>
<?php
$result = mysqli_query($conn, "SELECT * FROM order_items WHERE order_id = $order_id");

if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-bordered mt-3'>
            <tr><th>Item</th><th>Quantity</th><th>Total Cost</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['item_name']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['total_cost']} Taka</td>
              </tr>";
    }
    echo "</table>";

    // Finish order button (only if items exist)
    echo "<div class='mt-4'>
            <a href='view_order.php?order_id=$order_id' class='btn btn-primary'>
              Finish Order & View Bill
            </a>
          </div>";
} else {
    echo "<p class='text-muted'>No items added yet.</p>";
}

mysqli_close($conn);
?>

</body>
</html>
