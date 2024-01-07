<?php

$server = "localhost";
$user = "root";
$pass = "root";
$database = "EduVulca";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>