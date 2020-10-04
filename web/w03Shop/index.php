<?php

  //W03 Controller

session_start();
if (!isset($_SESSION['cartList'])) {
    $_SESSION['cartList'] = array();
}

include '../functions.php';

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
else if (isset($_POST['action'])) {
  $action = $_POST['action'];
}

switch ($action) {
  case "assignments":
    include "../views/assignments.php";
  break; 
  case "addToCart":
    $item = $_GET['item'];
    array_push($_SESSION['cartList'], $item);
    $message = "Item added to cart";
    include "../views/sdShop.php";
  break;
  case 'seeCart':
    include "../views/sdCart.php";
  break;
  case 'emptyCart':
    $_SESSION['cartList'] = array();
    $message = "Cart Emptied";
    include "../views/sdShop.php";
  break;
  case 'removeFromCart':
    removeFromCart($_GET['item']);
    $message = "Item Removed";
    include "../views/sdCart.php";
  break;
  case 'checkout':
    include '../views/sdCheckout.php';
  break;
  default:
    include '../views/sdShop.php';
  break;
}