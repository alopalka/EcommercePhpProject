<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $email = $_POST['email'];
    $user_password = $_POST['password'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    include "../includes/open_con.php";

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $userResult = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($userResult);
    mysqli_close($conn);

    $user_id_db = $row['id'];
    $pass_db = $row['password'];

    if ($user_password === $pass_db) {
        session_start();

        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];

        header('Location: index.php');
        exit();
    } else {
        $loginError = 'Incorrect login or password';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/main_style.css">
    <link rel="stylesheet" href="../resources/css/authorization.css">
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

        <?php if (isset($loginError)) : ?>
        <p><?php echo $loginError; ?></p>
        <?php endif; ?>
    </div>
</main>

<footer>
    <p>&copy; 2023 My E-commerce Store. All rights reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy
            Policy</a></p>
</footer>
</body>
</html>
