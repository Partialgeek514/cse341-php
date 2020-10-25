<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/GoodGames/css/goodGamesStyle.css">
    <title>GoodGames | Home</title>
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/snippets/header.php'; ?>
    </header>
    <nav>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/snippets/nav.php'; ?>
    </nav>
    <main>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<div class='feature'><p class='message'>$_SESSION[message]</p></div>";
            unset($_SESSION['message']);
        } ?>
        <div class="feature">
            <h2>Today's Featured Games</h2>
        </div>
        <?php echo $features; ?>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/snippets/footer.php'; ?>
    </footer>
</body>

</html>