<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

    <form action="login.php" method="POST">
        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error">
                <?php
                echo $_GET['error'];
                ?>
            </p>
        <?php } ?>




        <labe>User name</labe>
        <input type="text" name="uname" placeholder="Nhập username" />

        <labe>Password</labe>
        <input type="password" name="password" placeholder="Nhập password" />

        <button type="submit">Login</button>
        <button id="register" type="button">Register</button>

    </form>


    <script>
        document.getElementById("register").addEventListener("click", () => {
            document.location = 'view/register.php';
        })
    </script>

</body>

</html>