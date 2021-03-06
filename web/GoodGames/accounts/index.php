<?php
//GoodGames Accounts Controller
/*if ($_ENV['MEMCACHIER_USERNAME']) {
    ini_set('session.save_handler', 'memcached');
    ini_set('session.save_path', getenv('MEMCACHIER_SERVERS'));
    ini_set('memcached.sess_persistent', "On");
    ini_set('memcached.sess_binary_protocol', 1);
    ini_set('memcached.sess_sasl_username', getenv('MEMCACHIER_USERNAME'));
    ini_set('memcached.sess_sasl_password', getenv('MEMCACHIER_PASSWORD'));
}*/
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
       // echo "loginUser";
         //   exit;
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $loginSuccess = loginUser($username, $password);
        if ($loginSuccess == true) {
            $_SESSION['message'] = "Welcome $_SESSION[username]";
          //  echo $_SESSION['message'];
            //exit;
            header("Location: /GoodGames");
        }
        else {
            $_SESSION['message'] = "Login Failed";
          //  echo $_SESSION['message'];
            //exit;
            include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/login.php';
        }
    break;
    case 'logout':
        session_unset();
        header('Location: /GoodGames');
    break;
    case 'signUpPage':
        include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/signUp.php';
    break;
    case 'signUpUser':
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $birthday = filter_input(INPUT_POST, 'birthday', FILTER_SANITIZE_STRING);
        $rowCount = signUpUser($username, $password, $birthday);
        if ($rowCount == 1) {
            $_SESSION['message'] = 'Account Creation Successful. Please Login.';
            header("Location: /GoodGames/accounts/index.php?action=loginPage");
        }
        else {
            $_SESSION['message'] = 'Account Creation Error. Please Try Again.';
            header("Location: /GoodGames/accounts/index.php?action=signUpPage");
        }
    break;
    default:
        //var_dump($_POST);
        //exit;
        header('Location: /GoodGames');
    break;
}