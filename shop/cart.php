<?php
session_start();

// Check if the cart session variable exists
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    // Cart is empty
    $items = [];
    $total = 0;
} else {
    // Cart is not empty
    $items = $_SESSION['cart'];
    $total = calculateTotal($items);
}

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

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perspicacious Store | Cart</title>
    <link rel="stylesheet" href="../resources/css/main_style.css">
    <link rel="stylesheet" href="../resources/css/cart_style.css">
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
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <span class="cart-count"><?php echo calculateTotalQuantity($_SESSION['cart']); ?></span>
            <?php endif; ?>
        </a>
    </nav>
</header>


<main>
    <h1>Your Cart</h1>

    <?php if (empty($items)): ?>
        <p class="empty-cart-message">Cart is empty.</p>
    <?php else: ?>
        <table class="cart-items">
            <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $key => $item): ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td>$<?php echo $item['price']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo $item['price'] * $item['quantity']; ?></td>
                    <td>
                        <form action="../includes/remove_item.php" method="POST">
                            <input type="hidden" name="item_index" value="<?php echo $key; ?>">
                            <button type="submit" class="delete-button">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>$<?php echo $total; ?></td>
            </tr>
            </tfoot>
        </table>

        <div class="checkout-button">
            <a href="checkout.php"><button>Checkout</button></a>
        </div>
    <?php endif; ?>
</main>

<footer>
    <p>&copy; 2023 Perspicacious Store. All rights reserved.</p>
</footer>
</body>
</html>
