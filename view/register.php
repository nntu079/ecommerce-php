<?php
session_start();

setcookie("user_name", $_SESSION['user_name'], time() + (86400 * 30), "/"); // 86400 = 1 day

?>
<form action="../controller/register.php" method="POST" id="register">
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

    <button type="submit">Register</button>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    const form = document.getElementById("register")

    form.addEventListener("submit", (e) => {

        e.preventDefault();

        const formData = new FormData(e.target);
        const formProps = Object.fromEntries(formData);


        $.ajax({
            type: "POST",
            url: "../controller/register.php",
            data: formProps,
            success: function(msg) {

                document.location = '../home.php';
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('data is not valid')
            }
        });



    })
</script>