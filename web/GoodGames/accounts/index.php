<?php
//GoodGames Accounts Controller
session_start();
if ($_ENV['MEMCACHIER_USERNAME']) {
    ini_set('session.save_handler', 'memcached');
    ini_set('session.save_path', getenv('MEMCACHIER_SERVERS'));
    if (version_compare(phpversion('memcached'), '3', '>=')) {
        ini_set('memcached.sess_persistent', 1);
        ini_set('memcached.sess_binary_protocol', 1);
    } else {
        ini_set('session.save_path', 'PERSISTENT=myapp_session ' . ini_get('session.save_path'));
        ini_set('memcached.sess_binary', 1);
    }
    ini_set('memcached.sess_sasl_username', getenv('MEMCACHIER_USERNAME'));
    ini_set('memcached.sess_sasl_password', getenv('MEMCACHIER_PASSWORD'));
}
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