<?php
session_start();

if (isset($_POST['item_index'])) {
    $itemIndex = $_POST['item_index'];

    if (isset($_SESSION['cart'][$itemIndex])) {
        unset($_SESSION['cart'][$itemIndex]);
        $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array
    }
}

header('Location: ../shop/cart.php');
exit();
?>
