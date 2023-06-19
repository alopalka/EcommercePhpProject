<?php
// Include the database configuration
require_once 'config.php';

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve items from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Store the retrieved items in an array
$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perspicacious Store | Main page</title>
    <link rel="stylesheet" href="resources/css/main_style.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">Perspicacious Store</div>
        <div class="cart-icon">Cart</div>
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
