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
        echo "Phoenix Gleam (Unicorn/Male)<br>Art by <a href='https://www.deviantart.com/amy-gamy'>Amy-Gamy</a>";
    break;
    case "imgSilver":
        echo "Silverbelle (Pegasus/Female)<br>Art by <a href='https://www.deviantart.com/kimjoman'>Kimjoman</a>";
    break;
    case "imgCotton":
        echo "Cotton Stream (Griffin/Female)<br>Art by <a href='https://twitter.com/_HarlowPuppy_'>Harlow</a>";
    break;
    case "imgNeon":
        echo "Neon (Pegasus/Female)<br>Art by <a href='https://twitter.com/MLPNeondromeda'>Neondromeda</a>";
    break;
    default:
    echo "(No Caption)";
break;
}

?>