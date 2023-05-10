<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);


    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {

        $salt = 'unique string';
        $hash = crypt($password, '$2y$07$' . $salt . '$');


        $sql = "SELECT * FROM users WHERE name = '$uname' and password = '$hash' ";

        $result = $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_name'] = $row['name'];

            header("Location: home.php");
            exit();
        } else {
            header("Location: index.php?error=Incorect username or password");
            exit();
        }
    }
} else {

    //header("Location: index.php");
    exit();
}
