<?php
$host = "localhost";
$user = "khushi1";
$pass = "khushi1";
$db = "college_portal";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
