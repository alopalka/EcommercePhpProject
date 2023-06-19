<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="main_style.css">
</head>
<body>
<header>
    <nav>
        <div class="logo">My E-commerce Store</div>
    </nav>
</header>

<main>
    <h1>Register</h1>

    <form action="register.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</main>

<footer>
    <p>&copy; 2023 My E-commerce Store. All rights reserved. | <a href="#">Terms of Service</a> | <a href="#">Privacy Policy</a></p>
</footer>
</body>
</html>
