<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/GoodGames/css/goodGamesStyle.css">
    <title>GoodGames | <?php echo $gameName; ?></title>
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
                echo "<p class='message'>$_SESSION[message]</p>";
                unset($_SESSION['message']);
        } ?>    
        <?php echo $gameDetails; ?>
        <?php if (isset($_SESSION['loggedIn']) and $_SESSION['loggedIn']) {
            include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/snippets/reviewBox.php';
            } ?>
        <?php echo $reviews; ?>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/snippets/footer.php'; ?>
    </footer>
</body>

</html>