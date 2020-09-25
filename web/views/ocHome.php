<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/myOCsStyle.css">
    <title>My OCs</title>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <h1>My OCs</h1>
        <a <?php echo "href='/index.php?action=assignments'"; ?>>Assignments</a>
    </header>
    <main>
        <p id="description">These are my OCs! (Original Characters)</p>
        <div id="OCpics">
            <img id="imgPhoenix" class="clickModel" src="../images/Phoenix with Ladybugs by AmyGamy.jpg" alt="Phoenix Gleam">
            <img id="imgSilver" class="clickModel" src="../images/Silverbelle Smug.png" alt="Silverbelle">
            <img id="imgCotton" class="clickModel" src="../images/Cotton Stream.PNG">
            <img id="imgNeon" class="clickModel" src="../images/Neon by Neondromeda.jpg" alt="Neon">
        </div>
        <!-- This image "model" design is based heavily on the one given on
        https://www.w3schools.com/howto/howto_css_modal_images.asp -->
        <div id="model" class="modelContainer">
            <span id="closeButton">&times;</span>
            <img id="modelImg" src="../images/Phoenix with Ladybugs by AmyGamy.jpg" alt="Phoenix Gleam">
            <div id="caption"></div>
        </div>
    </main>
    <script src="../js/myOCsScript.js"></script>
</body>
</html>