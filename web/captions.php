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
        echo "Phoenix Gleam (Unicorn/Male)";
    break;
    case "imgSilver":
        echo "Silverbelle (Pegasus/Female)";
    break;
    case "imgCotton":
        echo "Cotton Stream (Griffin/Female)";
    break;
    case "imgNeon":
        echo "Neon (Pegasus/Female)";
    break;
    default:
    echo "(No Caption)";
break;
}

?>