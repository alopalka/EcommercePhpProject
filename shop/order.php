<!DOCTYPE html>
<html>
<head>
    <title>My E-commerce Store - Orders</title>
    <link rel="stylesheet" href="../resources/css/main_style.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">My E-commerce Store</div>
        <div class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">3</span>
        </div>
    </nav>
</header>

<main>
    <h1>My Orders</h1>

    <?php if ($isLoggedIn): ?>
        <?php if (!empty($orders)): ?>
            <table class="order-table">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['product']; ?></td>
                        <td>$<?php echo $order['price']; ?></td>
                        <td><?php echo $order['status']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No orders found.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Please log in to view your orders.</p>
    <?php endif; ?>

</main>

<footer>
    <p>&copy; 2023 My E-commerce Store. All rights reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
</footer>
</body>
</html>
