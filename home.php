<?php
session_start();

if (isset($_SESSION['user_name'])) {
    setcookie("user_name", $_SESSION['user_name'], time() + (86400 * 30), "/"); // 86400 = 1 day
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
        <a href="logout.php">Logout</a>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>