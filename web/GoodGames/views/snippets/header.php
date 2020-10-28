<h1 class="logo">GoodGames</h1>
<?php if (isset($funnyQuote)) {echo "<p id='quote'>$funnyQuote</p>";} ?>
<?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        echo "<a href='/GoodGames/accounts?action=logout'>Logout</a>";
    }
    else {
        echo '<a href="/GoodGames/accounts?action=loginPage">Log In</a>';
    }
?>