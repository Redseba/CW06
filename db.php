<?php
$host = "localhost";
$user = "jmorales32";
$pass = "jmorales32";
$db   = "jmorales32";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}