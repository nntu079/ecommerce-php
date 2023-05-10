<?php
session_start();
include "../db_conn.php";

header('Content-Type: application/json');


if (isset($_POST['uname']) && isset($_POST['password'])) {

    $name = $_POST['uname'];
    $password = $_POST['password'];

    $salt = 'unique string';
    $hash = crypt($password, '$2y$07$' . $salt . '$');

    $sql = "INSERT INTO users(name, password) 
                VALUES ('$name', '$hash')";

    $result = $result = mysqli_query($conn, $sql);

    if ($result) {
        $posts['response'] = array("success" => "1", "msg" => "Inserted Successfully");

        $_SESSION['user_name'] = $name;
    } else {
        $posts['response'] = array("success" => "0", "msg" => "Not Inserted");
    }
    echo json_encode($posts);
} else {

    //header("Location: index.php");
    exit();
}
