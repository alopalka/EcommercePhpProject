<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../includes/open_con.php";

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perspicacious Store | Main page</title>
    <link rel="stylesheet" href="../resources/css/main_style.css">
</head>
<body>
<header>
    <nav>
        <a href="index.php" class="logo">Perspicacious Store</a>
        <div class="nav-buttons">
            <a class="nav-button" href="login.php" class="nav-button">Login</a>
            <a class="nav-button" href="register.php" class="nav-button">Register</a>
        </div>
        <a href="cart.php" class="cart-icon">Cart</a>
    </nav>
</header>



<main>
    <?php foreach ($items as $item): ?>
        <div class="product">
            <img src="<?php echo $item['image']; ?>" alt="resources/images/default.jpg">
            <h2><?php echo $item['name']; ?></h2>
            <p><?php echo $item['description']; ?></p>
            <p>$<?php echo $item['price']; ?></p>
            <button>Add to Cart</button>
        </div>
    <?php endforeach; ?>
</main>

<footer>
    <p>&copy; 2023 Perspicacious Store. All rights reserved.</p>
</footer>
</body>
</html>
