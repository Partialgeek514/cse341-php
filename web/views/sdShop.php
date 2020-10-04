<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/myOCsStyle.css">
    <title>SD Shop</title>
</head>

<body>
    <header>
        <h1>SD Shop</h1>
        <a <?php echo "href='/w03Shop/index.php?action=seeCart'"; ?>>My Cart</a>
    </header>
    <main>
        <p><?php if (isset($message)) {echo $message;} ?></p>
        <div class="productContainer" id="product1">
            <img class="productImg" src="/images/SanDiskUltra32GBSDHC.webp" alt="SanDisk SD">
            <div class="productInfo">
                <h2>Sandisk Ultra SDHC 32GB</h2>
                <h3>$6.99</h3>
                <p class="productDescription">
                    An amazing SD card for any user! Great for cameras!
                </p>
                <a class="addCart" href="/w03Shop/index.php?action=addToCart&item=product1">Add to Cart</a>
            </div>
        </div>
        <div class="productContainer" id="product2">
            <img class="productImg" src="/images/SanDiskExtreme64GBSDHC.webp" alt="SanDisk SD">
            <div class="productInfo">
                <h2>Sandisk Extreme SDHC 64GB</h2>
                <h3>$25.99</h3>
                <p class="productDescription">
                    An amazing SD card for any user! Great for cameras and camcorders!
                </p>
                <a class="addCart" href="/w03Shop/index.php?action=addToCart&item=product2">Add to Cart</a>
            </div>
        </div>
        <div class="productContainer" id="product3">
            <img class="productImg" src="/images/SanDiskExtreme128GBSDHC.webp" alt="SanDisk SD">
            <div class="productInfo">
                <h2>Sandisk Extreme SDHC 128GB</h2>
                <h3>$36.99</h3>
                <p class="productDescription">
                    A large SD card for high powered users!
                </p>
                <a class="addCart" href="/w03Shop/index.php?action=addToCart&item=product3">Add to Cart</a>
            </div>
        </div>
        <div class="productContainer" id="product4">
            <img class="productImg" src="/images/SanDisk8GBSDHC.webp" alt="SanDisk SD">
            <div class="productInfo">
                <h2>Sandisk SDHC 8GB</h2>
                <h3>$3.99</h3>
                <p class="productDescription">
                    An affordable SD card for any user! Great for cameras!
                </p>
                <a class="addCart" href="/w03Shop/index.php?action=addToCart&item=product4">Add to Cart</a>
            </div>
        </div>
        <div class="productContainer" id="product5">
            <img class="productImg" src="/images/SanDisk2GBSD.webp" alt="SanDisk SD">
            <div class="productInfo">
                <h2>Sandisk SD 2GB</h2>
                <h3>$0.99</h3>
                <p class="productDescription">
                    On clearance!
                </p>
                <a class="addCart" href="/w03Shop/index.php?action=addToCart&item=product5">Add to Cart</a>
            </div>
        </div>
    </main>
</body>

</html>