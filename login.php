<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate and sanitize the input data
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
            header('Location: index.php');
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password!";
        }
    } else {
        // User with the provided email doesn't exist
        echo "User not found!";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="resources/css/main_style.css">
    <link rel="stylesheet" href="resources/css/authorization.css">
    <title>Perspicacious Store | Login</title>
</head>
<body>
<header>
    <nav>
        <div class="logo">Perspicacious Store</div>
        <a href="cart.php" class="cart-icon">Cart</a>
    </nav>
</header>

<main>
    <div class="login-content">
        <h1>Login</h1>

        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2023 My E-commerce Store. All rights reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy
            Policy</a></p>
</footer>
</body>
</html>
