<?php
$host = 'localhost';
$dbname = 'truperonce';
$user = 'dev_user';
$pass = 'Dev*2026';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
