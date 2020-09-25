<?php

  //Home Controller

if (isset($_GET['character'])) {
  $character = $_GET['character'];
}
else if (isset($_POST['character'])) {
  $character = $_POST['character'];
}

switch ($character) {
    case "imgPhoenix":
        echo "Phoenix Gleam";
    break;
    case "imgSilver":
        echo "Silverbelle";
    break;
    case "imgCotton":
        echo "Cotton Stream";
    break;
    case "imgNeon":
        echo "Neon";
    break;
    default:
    echo "(No Caption)";
break;
}

?>