<!DOCTYPE html>
<html>
<head>
  <title>View Cart</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    h2 {
      background-color: #ceec0b;
      color: white;
      padding: 10px;
    }

    .cart-table {
      margin: 20px;
      padding: 10px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .cart-table th,
    .cart-table td {
      padding: 5px;
      border: 1px solid #ccc;
    }

    .cart-table th {
      background-color: #eee;
    }

    .cart-table a {
      color: #007BFF;
      text-decoration: none;
    }

    .cart-table a:hover {
      text-decoration: underline;
    }

    button {
      background-color: #007BFF;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1.2rem;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <h2>View Cart</h2>

  <?php

  // Connect to the database
  $db = new PDO('mysql:host=localhost;dbname=pet', 'root', 'siddhant123');

  // Get the items in the cart
  $sql = 'SELECT * FROM cart';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $cartItems = $stmt->fetchAll();

  // Display the cart items
  if (count($cartItems) > 0) {
    echo '<table class="cart-table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Product Name</th>';
    echo '<th>Price</th>';
    echo '<th>Quantity</th>';
    echo '<th>Total</th>';
    echo '<th>Remove</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($cartItems as $cartItem) {
      echo '<tr>';
      echo '<td>' . $cartItem['product_name'] . '</td>';
      echo '<td>$' . $cartItem['price'] . '</td>';
      echo '<td>' . $cartItem['quantity'] . '</td>';
      echo '<td>$' . ($cartItem['price'] * $cartItem['quantity']) . '</td>';
      echo '<td><a href="remove_from_cart.php?id=' . $cartItem['id'] . '">Remove</a></td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p>Your cart is empty.</p>';
  }

  // Display a checkout button if there are items in the cart
  if (count($cartItems) > 0) {
    echo '<button onclick="checkout()">Checkout</button>';
  }

  ?>

  <script>
    function checkout() {
      window.location.href = 'checkout.php';
    }
  </script>
</body>
</html>
