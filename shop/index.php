<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "../includes/open_con.php";

// Check if the Add to Cart button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    // Get the product ID
    $product_id = $_POST['product_id'];

    // Check if the product is already in the cart
    if (isset($_SESSION['cart'][$product_id])) {
        // Increment the quantity if the product is already in the cart
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        // Add the product to the cart
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['cart'][$product_id] = [
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' => 1
            ];
        }
    }
}

// Retrieve items from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
mysqli_close($conn);

// Store the retrieved items in an array
$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

// Display the cart items if the cart is not empty
// DEBUGGING
//if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
//    echo "<pre>";
//    print_r($_SESSION['cart']);
//    echo "</pre>";
//} else {
//    echo "Cart is empty.";
//}

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perspicacious Store | Main page</title>
    <link rel="stylesheet" href="../resources/css/main_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<header>
    <nav>
        <a href="index.php" class="logo">Perspicacious Store</a>
        <div class="nav-buttons">
            <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['email'])): ?>
                <span class="greeting">Hi, <?php echo $_SESSION['email']; ?></span>
                <a class="nav-button" href="../includes/logout.php">Logout</a>
            <?php else: ?>
                <a class="nav-button" href="login.php">Login</a>
                <a class="nav-button" href="register.php">Register</a>
            <?php endif; ?>
        </div>
        <a href="cart.php" class="cart-icon">
            <span class="bi bi-cart"></span>
            Cart
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <span class="cart-count"><?php echo calculateTotalQuantity($_SESSION['cart']); ?></span>
            <?php endif; ?>
        </a>
    </nav>
</header>

<main>
    <?php foreach ($items as $item): ?>
        <div class="product">
            <?php if (file_exists($item['image'])): ?>
                <img src="<?php echo $item['image']; ?>" alt="Product Image">
            <?php else: ?>
                <img src="../resources/images/default.jpg" alt="Default Image">
            <?php endif; ?>
            <h2><?php echo $item['name']; ?></h2>
            <p><?php echo $item['description']; ?></p>
            <p>$<?php echo $item['price']; ?></p>
            <form action="index.php" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
    <?php endforeach; ?>
</main>


<footer>
    <p>&copy; 2023 Perspicacious Store. All rights reserved.</p>
</footer>
</body>
</html>
