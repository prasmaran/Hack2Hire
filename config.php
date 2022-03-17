<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "inventory";

$mysqli = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error($dbName));
}
