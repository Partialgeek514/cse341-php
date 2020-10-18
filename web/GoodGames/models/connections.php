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