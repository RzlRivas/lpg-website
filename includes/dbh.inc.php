<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "lpg_website";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}