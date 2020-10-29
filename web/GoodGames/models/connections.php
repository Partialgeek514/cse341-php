<?php

function getConnection()
{
    try {
        $dbUrl = getenv('DATABASE_URL');

        if (empty($dbUrl)) {
            $dbUrl = "postgres://postgres:cangetin@localhost:5432/postgres";
        }

        $dbOpts = parse_url($dbUrl);

        $dbHost = $dbOpts["host"];
        $dbPort = $dbOpts["port"];
        $dbUser = $dbOpts["user"];
        $dbPassword = $dbOpts["pass"];
        $dbName = ltrim($dbOpts["path"], '/');

        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $ex) {
        echo 'Error!: ' . $ex->getMessage();
        die();
    }
}

/*
$db = getConnection();
$result = $db->query("SELECT table_name
FROM information_schema.tables
WHERE table_schema = 'public'
ORDER BY table_name;");
var_dump($result->fetchAll());
*/
//phpinfo();

function getNavData() {
    $dbConn = getConnection();
    $navData = $dbConn->query('SELECT * FROM genres;');
    return $navData;
}

function getFeatures() {
    $dbConn = getConnection();
    $features = $dbConn->query("SELECT * 
                                FROM games
                                INNER JOIN gameImages ON games.gameId=gameImages.gameId 
                                WHERE gameTitle 
                                IN ('The Legend of Zelda: Breath of the Wild', 'MarioKart 8 Deluxe');");
    return $features;
}

function getGenreName($genreId) {
    $dbConn = getConnection();
    $genreName = $dbConn->query("SELECT genreName
                                 FROM genres
                                 WHERE genreId = $genreId;");
    return ($genreName->fetchAll())[0]['genrename'];
}

function getGamesDataByGenre($genreId) {
    $dbConn = getConnection();
    $games = $dbConn->query("SELECT * 
                            FROM games
                            INNER JOIN gameImages ON games.gameId=gameImages.gameId 
                            WHERE genreId = $genreId;");
    return $games;
}

function getGameData($gameId) {
    $dbConn = getConnection();
    $gameData = $dbConn->query("SELECT * 
                                FROM games
                                INNER JOIN gameImages ON games.gameId=gameImages.gameId 
                                WHERE games.gameId = $gameId;");
    return $gameData->fetch();
}

function getGameNameData($gameId) {
    $dbConn = getConnection();
    $gameData = $dbConn->query("SELECT gameTitle 
                                FROM games 
                                WHERE gameId = $gameId;");
    return ($gameData->fetch())['gametitle'];
}

function getUserData($username) {
    $dbConn = getConnection();
    $userData = $dbConn->query("SELECT *
                                FROM accounts
                                WHERE username = '$username';");
    return $userData->fetch();
}

function insertReview($userId, $gameId, $reviewText) {
    $dbConn = getConnection();
    $result = $dbConn->query("INSERT INTO reviews (reviewContent, gameId, userId)
                              VALUES ('$reviewText', $gameId, $userId);");
    return $result->rowCount();
}

function getReviewData($gameId) {
    $dbConn = getConnection();
    $reviewData = $dbConn->query("SELECT reviewContent, reviewDate, username 
                                  FROM reviews
                                  INNER JOIN accounts
                                  ON reviews.userId = accounts.userId
                                  WHERE gameId = $gameId");
    return $reviewData->fetchAll();
}