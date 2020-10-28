<?php
//GoodGames Main Controller
/*if ($_ENV['MEMCACHIER_USERNAME']) {
    ini_set('session.save_handler', 'memcached');
    ini_set('session.save_path', getenv('MEMCACHIER_SERVERS'));
    ini_set('memcached.sess_persistent', "On");
    ini_set('memcached.sess_binary_protocol', 1);
    ini_set('memcached.sess_sasl_username', getenv('MEMCACHIER_USERNAME'));
    ini_set('memcached.sess_sasl_password', getenv('MEMCACHIER_PASSWORD'));
}*/
session_start();
phpinfo();
exit;
/*if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
}
$_SESSION['count']++;

echo "Hello #" . $_SESSION['count'];
exit;*/
include_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/functions.php';

if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
} elseif (isset($_POST['action'])) {
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
} else {
    $action = '';
}

$navBar = getNavBar();

switch ($action) {
    case 'getGenre':
        $genreId = filter_input(INPUT_GET, 'genreId', FILTER_SANITIZE_NUMBER_INT);
        $genre = getGenre($genreId);
        $games = getGamesByGenre($genreId);
        include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/browse.php';
        break;
    case 'details':
        $gameId = filter_input(INPUT_GET, 'gameId', FILTER_SANITIZE_NUMBER_INT);
        $gameName = getGameName($gameId);
        $gameDetails = getGameDetails($gameId);
        $reviews = getReviews($gameId);
        include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/gameDetails.php';
        break;
    case 'createReview':
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $gameId = filter_input(INPUT_POST, 'gameId', FILTER_SANITIZE_NUMBER_INT);
        $reviewSuccess = createReview($reviewText, $gameId);
        if ($reviewSuccess) {
            header("Location: /GoodGames?action=details&gameId=$gameId");
        } else {
            $_SESSION['message'] = "Failed to write review";
            header("Location: /GoodGames?action=details&gameId=$gameId");
        }
        break;
    default:
        $features = getFeatured();
        include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/home.php';
        break;
}
