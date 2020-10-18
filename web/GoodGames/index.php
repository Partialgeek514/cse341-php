<?php
//GoodGames Main Controller
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/functions.php';

if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}
elseif (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
}
else {
    $action = '';
}

$navBar = getNavBar();

switch ($action) {
    default:
        $features = getFeatured();
        include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/home.php';
        break;
}