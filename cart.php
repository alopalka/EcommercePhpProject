<!DOCTYPE html>
<html>
<head>
    <title>My E-commerce Store - Cart</title>
    <link rel="stylesheet" href="resources/css/main_style.css">
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
    <h1>Your Cart</h1>

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
        <tr>
            <td>Product 1</td>
            <td>$19.99</td>
            <td>2</td>
            <td>$39.98</td>
        </tr>
        <tr>
            <td>Product 2</td>
            <td>$24.99</td>
            <td>1</td>
            <td>$24.99</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">Total</td>
            <td>$64.97</td>
        </tr>
        </tfoot>
    </table>

    <div class="checkout-button">
        <button>Checkout</button>
    </div>
</main>

<footer>
    <p>&copy; 2023 My E-commerce Store. All rights reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
</footer>
</body>
</html>
