<?php

  //Home Controller

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
else if (isset($_POST['action'])) {
  $action = $_POST['action'];
}

switch ($action) {
  case "assignments":
    include "views/assignments.php";
  break; 
  default:
    include "views/ocHome.php";
  break;
}

?>