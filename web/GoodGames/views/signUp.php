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
        <div class="feature">
            <?php
            if (isset($_SESSION['message'])) {
                echo "<p class='message'>$_SESSION[message]</p>";
                unset($_SESSION['message']);
            } ?>
            <h2>Create Account</h2>
        </div>
        <div class="feature">
            <form action="/GoodGames/accounts/index.php" method="post">
                <label for="username">Username</label><br>
                <input type="text" name="username" required><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" required><br>
                <label for="birthday">Birthday</label><br>
                <input type="date" name="birthday" required><br>
                <input type="hidden" name="action" value="signUpUser">
                <button type="submit">Create Account</button>
            </form>
        </div>
    </main>
    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/GoodGames/views/snippets/footer.php'; ?>
    </footer>
</body>

</html>