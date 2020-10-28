<?php
//GoodGames Main Controller
session_start();
if($_ENV['REDIS_URL']) {
    $redisUrlParts = parse_url($_ENV['REDIS_URL']);
    ini_set('session.save_handler','redis');
    ini_set('session.save_path',"tcp://$redisUrlParts[host]:$redisUrlParts[port]?auth=$redisUrlParts[pass]");
    var_dump($_ENV['REDIS_URL']);
    exit;
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
        }
        else {
            $_SESSION['message'] = "Failed to write review";
            header("Location: /GoodGames?action=details&gameId=$gameId");
        }
    break;
    default:
        $features = getFeatured();
        include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/home.php';
    break;
}