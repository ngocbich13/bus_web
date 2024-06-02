<?php
//database.php
session_start();
$connect = new mysqli('localhost', 'root', '', 'bus_routes');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>
