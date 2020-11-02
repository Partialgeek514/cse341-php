<?php

function getNavBar()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $navData = getNavData();
    $navBar = "<ul class='navBar'>";
    $navBar .= "<li class='navItem'><a href='/GoodGames'>Home</a></li>";
    //$navBar .= "<li class='navItem'><a href='/GoodGames/?action=getTopRated'>Top Rated</a></li>";
    foreach ($navData as $data) {
        $navBar .= "<li class='navItem'><a href='/GoodGames/?action=getGenre&genreId=$data[genreid]'>$data[genrename]</a></li>";
    }
    $navBar .= "</ul>";
    return $navBar;
}

function getFeatured()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $features = getFeatures();
    $featured = '';
    foreach ($features as $feature) {
        $featured .= "<div class='feature'>
    <div class='imgBox'>
        <img src='$feature[imgpath]' alt='Game Thumbnail'>
    </div>
        <div class='gameHeader'>
        <a href='/GoodGames?action=details&gameId=$feature[gameid]'><h3 class='gameTitle'>$feature[gametitle]</h3></a>
            <p class='year'>$feature[gameyear]</p>
        </div>
            <p class'gameDescription'>$feature[gamedescription]</p>     
    </div>";
    }
    return $featured;
}

function getGenre($genreId) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $genreName = getGenreName($genreId);
    return $genreName;
}

function getGamesByGenre($genreId)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $gamesData = getGamesDataByGenre($genreId);
    $games = '';
    foreach ($gamesData as $game) {
        $games .= "<div class='gameBrowse'>
    <div class='imgBox'>
        <img src='$game[imgpath]' alt='Game Thumbnail'>
    </div>
        <div class='gameHeader'>
            <a href='/GoodGames?action=details&gameId=$game[gameid]'><h3 class='gameTitle'>$game[gametitle]</h3></a>
            <p class='year'>$game[gameyear]</p>
        </div>
            <p class'gameDescription'>$game[gamedescription]</p>     
    </div>";
    }
    return $games;
}

function getGameName($gameId) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    return getGameNameData($gameId);
}

function getGameDetails($gameId) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $gameData = getGameData($gameId);
    $gamesDetails = "<div class='gameDetails'>
    <div class='imgBox'>
        <img src='$gameData[imgpath]' alt='Game Thumbnail'>
    </div>
        <div class='gameHeader'>
            <h2>$gameData[gametitle]</h2>
            <p class='year'>$gameData[gameyear]</p>
        </div>
            <p class'gameDescription'>$gameData[gamedescription]</p>     
    </div>";
    return $gamesDetails;
}

function loginUser($username, $password) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $userData = getUserData($username);
    if (!password_verify($password, $userData['hashedpassword'])) {
        return false;
    }
    else {
        $_SESSION['loggedIn'] = true;
        $_SESSION['userId'] = $userData['userid'];
        $_SESSION['username'] = $username;
        $_SESSION['birthday'] = $userData['birthday'];
        $_SESSION['adminLevel'] = $userData['adminlevel'];
        return true;
    }
}

function createReview($reviewText, $gameId) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $rowsMade = insertReview($_SESSION['userId'], $gameId, $reviewText);
    if ($rowsMade == 1) {
        return true;
    }
    else {
        return false;
    }
}

function getReviews($gameId) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $reviewData = getReviewData($gameId);
    $reviews = "<div class='review'><h3>Reviews:</h3></div>";
    foreach ($reviewData as $review) {
        $reviews .= "<div class='review'>
                        <p class='name&date'>$review[username] - $review[reviewdate]</p>
                        <p class='reviewText'>$review[reviewcontent]</p>
                     </div>";
    }
    return $reviews;
}

function signUpUser($username, $password, $birthday) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $rowCount = insertNewUser($username, $hashedPassword, $birthday);
    return $rowCount;
}