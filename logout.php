<?php

session_start();
//session_unset();
unset($_SESSION['uid']);
session_destroy();

echo "<script> window.location.href='index.php';  </script>";

?>