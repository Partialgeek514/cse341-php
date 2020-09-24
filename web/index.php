<?php

  //Home Controller

if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
else if (isset($_POST['action'])) {
  $action = $_POST['action'];
}

switch ($action) {
    default:
    include "views/ocHome.php";
break;
}

?>