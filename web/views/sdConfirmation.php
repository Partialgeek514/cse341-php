<?php 
$cartList = buildConfirmation();
$_SESSION['cartList'] = array();
$message = "Order Confirmed";
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/myOCsStyle.css">
    <title>SD Shop | Order Confirmation</title>
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
            <div id="cartList">
                <?php echo $cartList; ?>
            </div>
            <div id="confirmedAddress">
                <h2>Order Sent To:</h2>
                <?php echo $address; ?>
                <a class="menuButton" href="/w03Shop/index.php">Back to Store</a>
            </div>
        </div>
    </main>
</body>

</html>