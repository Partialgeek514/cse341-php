<?php
//GoodGames Main Controller
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
    var_dump($_ENV['MEMCACHIER_USERNAME']);
    exit;
}
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
