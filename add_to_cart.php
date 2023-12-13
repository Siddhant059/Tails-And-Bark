<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=pet', 'root', 'siddhant123');

// Add the item to the cart
$sql = 'INSERT INTO cart (product_name, price, quantity, total) VALUES (?, ?, ?, ?)';
$stmt = $db->prepare($sql);
$stmt->bindParam(1, $productName);
$stmt->bindParam(2, $price);
$stmt->bindParam(3, $quantity);
$stmt->bindParam(4, $total);
$stmt->execute();
header('Location: viewcart.php');

?>
