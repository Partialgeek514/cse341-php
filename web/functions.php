<?php

function buildCart() {
    $cartList = '';
    foreach ($_SESSION['cartList'] as $product) {
        switch ($product) {
            case 'product1':
                $cartList .= '<div class="productContainer" id="product1"><img class="productImg" src="/images/SanDiskUltra32GBSDHC.webp" alt="SanDisk SD"><div class="productInfo"><h2>Sandisk Ultra SDHC 32GB</h2><h3>$6.99</h3><p class="productDescription">An amazing SD card for any user! Great for cameras!</p><a class="addCart" href="/w03Shop/index.php?action=removeFromCart&item=product1">Remove from Cart</a></div></div>';
            break;
            case 'product2':
                $cartList .= '<div class="productContainer" id="product2">
                <img class="productImg" src="/images/SanDiskExtreme64GBSDHC.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk Extreme SDHC 64GB</h2>
                    <h3>$25.99</h3>
                    <p class="productDescription">
                        An amazing SD card for any user! Great for cameras and camcorders!
                    </p>
                    <a class="addCart" href="/w03Shop/index.php?action=removeFromCart&item=product2">Remove from Cart</a>
                </div>
                </div>';
            break;
            case 'product3':
                $cartList .= '<div class="productContainer" id="product3">
                <img class="productImg" src="/images/SanDiskExtreme128GBSDHC.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk Extreme SDHC 128GB</h2>
                    <h3>$36.99</h3>
                    <p class="productDescription">
                        A large SD card for high powered users!
                    </p>
                    <a class="addCart" href="/w03Shop/index.php?action=removeFromCart&item=product3">Remove from Cart</a>
                </div>
                </div>';
            break;
            case 'product4':
                $cartList .= '<div class="productContainer" id="product4">
                <img class="productImg" src="/images/SanDisk8GBSDHC.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk SDHC 8GB</h2>
                    <h3>$3.99</h3>
                    <p class="productDescription">
                        An affordable SD card for any user! Great for cameras!
                    </p>
                    <a class="addCart" href="/w03Shop/index.php?action=removeFromCart&item=product4">Remove from Cart</a>
                </div>
                </div>';
            break;
            case 'product5':
                $cartList .= '<div class="productContainer" id="product5">
                <img class="productImg" src="/images/SanDisk2GBSD.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk SD 2GB</h2>
                    <h3>$0.99</h3>
                    <p class="productDescription">
                        On clearance!
                    </p>
                    <a class="addCart" href="/w03Shop/index.php?action=removeFromCart&item=product5">Remove from Cart</a>
                </div>
                </div>';
            break;
            default:
            break;    
        }
    }
    return $cartList;
}

function removeFromCart($item) {
    $counter = 0;
    foreach ($_SESSION['cartList'] as $product) {
        if ($product == $item) {
            unset($_SESSION['cartList'][$counter]);
            $_SESSION['cartList'] = array_values($_SESSION['cartList']);
            break;
        }
        $counter++;
    }
}

function buildConfirmation() {
    $cartList = '';
    foreach ($_SESSION['cartList'] as $product) {
        switch ($product) {
            case 'product1':
                $cartList .= '<div class="productContainer" id="product1"><img class="productImg" src="/images/SanDiskUltra32GBSDHC.webp" alt="SanDisk SD"><div class="productInfo"><h2>Sandisk Ultra SDHC 32GB</h2><h3>$6.99</h3><p class="productDescription">An amazing SD card for any user! Great for cameras!</p></div></div>';
            break;
            case 'product2':
                $cartList .= '<div class="productContainer" id="product2">
                <img class="productImg" src="/images/SanDiskExtreme64GBSDHC.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk Extreme SDHC 64GB</h2>
                    <h3>$25.99</h3>
                    <p class="productDescription">
                        An amazing SD card for any user! Great for cameras and camcorders!
                    </p>
                </div>
                </div>';
            break;
            case 'product3':
                $cartList .= '<div class="productContainer" id="product3">
                <img class="productImg" src="/images/SanDiskExtreme128GBSDHC.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk Extreme SDHC 128GB</h2>
                    <h3>$36.99</h3>
                    <p class="productDescription">
                        A large SD card for high powered users!
                    </p>
                </div>
                </div>';
            break;
            case 'product4':
                $cartList .= '<div class="productContainer" id="product4">
                <img class="productImg" src="/images/SanDisk8GBSDHC.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk SDHC 8GB</h2>
                    <h3>$3.99</h3>
                    <p class="productDescription">
                        An affordable SD card for any user! Great for cameras!
                    </p>
                </div>
                </div>';
            break;
            case 'product5':
                $cartList .= '<div class="productContainer" id="product5">
                <img class="productImg" src="/images/SanDisk2GBSD.webp" alt="SanDisk SD">
                <div class="productInfo">
                    <h2>Sandisk SD 2GB</h2>
                    <h3>$0.99</h3>
                    <p class="productDescription">
                        On clearance!
                    </p>
                </div>
                </div>';
            break;
            default:
            break;    
        }
    }
    return $cartList;
}