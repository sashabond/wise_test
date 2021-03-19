<?php

$host = "localhost";
$user = "user1";
$password_db = "1234";
$db = "activities";

$link = mysqli_connect($host, $user, $password_db, $db);
if (!$link ) {
    die('Connect Errors: ' . mysqli_connect_error());
}

$select_db = mysqli_select_db($link, $db);
if (!$select_db ) {
    die('Select Errors: ' . mysqli_connect_error());
}
?>