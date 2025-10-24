<?php
// Connect to database
$conn = mysqli_connect("localhost", "root", "", "canteen");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Insert new order
$sql = "INSERT INTO orders (order_date) VALUES (NOW())";
if (mysqli_query($conn, $sql)) {
    $new_order_id = mysqli_insert_id($conn);
    // Redirect to add items page
    header("Location: add_item.php?order_id=" . $new_order_id);
    exit();
} else {
    echo "Error creating order: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
