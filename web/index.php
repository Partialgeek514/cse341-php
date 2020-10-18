<?php

  //Home Controller

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
else if (isset($_POST['action'])) {
  $action = $_POST['action'];
}
else {
  $action = '';
}

switch ($action) {
  case "assignments":
    include "views/assignments.php";
  break; 
  case "assignW03":
    header('Location: ./w03Shop');
  break;
  case "project1":
    header("Location: ./GoodGames");
  break;
  default:
    include "views/ocHome.php";
  break;
}

?>