<html>
<body>

<center>

    <?php
    include ("includes/connect.php");


    $username = $_POST["username"];
    $pass = $_POST["password"];

    $username = stripslashes($username);
    $username = strip_tags($username);
    $username = mysqli_real_escape_string($connect, $username);

    $pass = stripslashes($pass);
    $pass = strip_tags($pass);
    $pass = mysqli_real_escape_string($connect, $pass);
    $pass = hash("sha256", $pass);

    $sql = "SELECT * FROM users WHERE name='$username' LIMIT 1";
    $query = mysqli_query($connect, $sql);
    $rows = mysqli_num_rows($query);

    if ($rows == 1)
    {
        // User exist in the database
        $rowArray = mysqli_fetch_array($query);
        $dbUsername = $rowArray['name'];

        $dbPassword = $rowArray['pass'];
        if ($dbUsername == $username && $dbPassword == $pass)
        {
            // Username and password is correct
            session_start();
            $_SESSION['username'] = $username;
            echo "Logged in succesfully!!!";
        }
        else {
            echo "Login error: Incorrect Username or Password";
        }
    }
    else {
        echo "Login error: Incorrect Username or Password";
    }

    ?>

</center>


</body>
</html>