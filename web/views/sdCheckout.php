<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/myOCsStyle.css">
    <title>SD Shop | Checkout</title>
</head>

<body>
    <header>
        <h1>SD Shop</h1>
        <a <?php echo "href='/w03Shop/index.php?action=seeCart'"; ?>>My Cart</a>
    </header>
    <main>
        <p><?php if (isset($message)) {
                echo $message;
            } ?></p>
        <div class="cartPage">
            <form id="checkoutForm" action="confirmOrder.php" method="POST">
                <label for="name">Name:</label><br>
                <input type="text" name="name" required><br>
                <label for="address1">Address Line 1:</label><br>
                <input class="addressInput" type="text" name="address1" required><br>
                <label for="address2">Address Line 2:</label><br>
                <input class="addressInput" type="text" name="address2"><br>
                <label for="city">City:</label><br>
                <input type="text" name="city" required><br>
                <label for="state">State/Province:</label><br>
                <input type="text" name="state" required><br>
                <label for="pCode">Postal Code:</label><br>
                <input type="text" name="pCode" required><br>
                <label for="country">Country:</label><br>
                <input type="text" name="country" required><br>
                <button class="menuButton" type="submit">Confirm Order</button>
            </form>
            <div id="cartMenu">
                <a class="menuButton" href="/w03Shop/index.php?action=seeCart">Return to Cart</a>
            </div>
        </div>
    </main>
</body>

</html>