<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "paper";

/*$servername = "localhost";
$username = "ssprinte_sabuj";
$password = "!@#sabuj#@!";
$db = "ssprinte_paper";*/

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);
mysqli_set_charset($con,"utf8");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>