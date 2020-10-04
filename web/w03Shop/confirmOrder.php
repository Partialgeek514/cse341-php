<?php

//Order Confirmation
session_start();
include '../functions.php';

$userName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$userAdd1 = filter_input(INPUT_POST, 'address1', FILTER_SANITIZE_STRING);
$userAdd2 = filter_input(INPUT_POST, 'address2', FILTER_SANITIZE_STRING);
$userCity = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
$userState = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
$userPostalCode = filter_input(INPUT_POST, 'pCode', FILTER_SANITIZE_STRING);
$userCountry = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);

if (empty($userName) or empty($userAdd1) or empty($userCity) or empty($userState) or empty($userPostalCode)
or empty($userCountry)) {
    header('Location: /w03Shop/index.php?action=checkout');
    exit;
}

$address = "<p id='address'>$userName<br>$userAdd1<br>";
if (!empty($userAdd2)) {
    $address .= "$userAdd2<br>";
}
$address .= "$userCity, $userState<br>$userCountry $userPostalCode</p>";

include "../views/sdConfirmation.php";