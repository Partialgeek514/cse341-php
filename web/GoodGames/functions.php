<?php

function getNavBar()
{
    require_once $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/models/connections.php';
    $navData = getNavData();
    $navBar = "<ul class='navBar'>";
    $navBar .= "<li class='navItem'><a href='/GoodGames'>Home</a></li>";
    $navBar .= "<li class='navItem'><a href='/GoodGames/?action=getTopRated'>Top Rated</a></li>";
    foreach ($navData as $data) {
        $navBar .= "<li class='navItem'><a href='/GoodGames/?action=getGenre&genre=get$data[genreid]'>$data[genrename]</a></li>";
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
            <h3 class='gameTitle'>$feature[gametitle]</h3>
            <p class='year'>$feature[gameyear]</p>
        </div>
            <p class'gameDescription'>$feature[gamedescription]</p>     
    </div>";
    }
    return $featured;
}
