<?php
//GoodGames Accounts Controller
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
    case 'loginPage':
        include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/login.php';
    break;
    case 'loginUser':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $loginSuccess = loginUser($username, $password);
        if ($loginSuccess == true) {
            $_SESSION['message'] = "Welcome $_SESSION[username]";
            header("Location: /GoodGames");
        }
        else {
            $_SESSION['message'] = "Login Failed";
            include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/login.php';
        }
    break;
    case 'logout':
        session_unset();
        header('Location: /GoodGames');
    break;
    default:
        header('Location: /GoodGames');
    break;
}