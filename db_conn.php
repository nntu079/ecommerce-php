<?php


$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "week7";      // Khai báo database


// Kết nối database tintuc
$conn = mysqli_connect($server, $username, $password, $dbname);


if (!$conn) {
    echo "Connection fail";
}
