<?php
session_start();

// Retrieve the cart items from the session
$items = $_SESSION['cart'] ?? [];

// Calculate the total and total quantity
$total = calculateTotal($items);
$totalQuantity = calculateTotalQuantity($items);

// Function to calculate the total price of items in the cart
function calculateTotal($items)
{
    $total = 0;
    foreach ($items as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

function calculateTotalQuantity($items)
{
    $totalQuantity = 0;
    foreach ($items as $item) {
        $totalQuantity += $item['quantity'];
    }
    return $totalQuantity;
}

// Clear the cart after checkout
$_SESSION['cart'] = [];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perspicacious Store | Checkout</title>
    <link rel="stylesheet" href="../resources/css/main_style.css">
    <link rel="stylesheet" href="../resources/css/checkout_style.css">
    <!-- Add any additional CSS stylesheets for the checkout page -->
</head>
<body>
<header>
    <nav>
        <a href="index.php" class="logo">Perspicacious Store</a>
        <div class="nav-buttons">
            <a class="nav-button" href="login.php">Login</a>
            <a class="nav-button" href="register.php">Register</a>
        </div>
        <a href="cart.php" class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            Cart
            <span class="cart-count"><?php echo $totalQuantity; ?></span>
        </a>
    </nav>
</header>

<main>
    <h1 id="checkout_name">Checkout</h1>
    <p id="info">Please provide your shipping information below:</p>

    <form action="order_confirmation.php" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="zip">ZIP Code</label>
            <input type="text" id="zip" name="zip" required>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" id="country" name="country" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>
        </div>

        <h2>Order Summary</h2>
        <table class="order-details">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo $item['price'] * $item['quantity']; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td>FREE Shipping</td>
                <td>0.00</td>
                <td>1</td>
                <td>0.00</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>$<?php echo $total; ?></td>
            </tr>
            </tfoot>
        </table>

        <button type="submit">Place Order</button>
    </form>
</main>

<footer>
    <p>&copy; 2023 Perspicacious Store. All rights reserved.</p>
</footer>
</body>
</html>
