<html>
<body>

<center>

    <?php
    include ("includes/connect.php");
    ?>

    <h2><u>Login or Register</u></h2>

    <form action="login.php" method="post">
        <table border="0">
            <tr>
                <td>Username: </td>
                <td><input class="login" id="username" type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input class="login" id="password" type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="loginBtn" name="login" value="Login"></td>
            </tr>
        </table>
    </form>

    <form action="register.php" method="post">
        <table border="0">
            <tr>
                <td>Username: </td>
                <td><input class="login" id="username" type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input class="login" id="password" type="password" name="password"></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input class="login" id="email" type="email" name="email"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="registerBtn" name="register" value="Register"></td>
            </tr>
        </table>
    </form>

</center>



</body>
</html>