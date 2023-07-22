<?php

session_start();

$con = mysqli_connect('localhost','root','','dbmovies');
if(!$con){
    die('cannot established DB');
}
?>