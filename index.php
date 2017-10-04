<html>
<head>
    <title>My First HTML</title>
    <meta charset="UTF-8">

    <style>
        .error { color: #FF0000;}
    </style>
</head>
<body>

<center>

    <?php
    include ("includes/connect.php");
    ?>

    <?php
    // define variables and set to empty values
    $loginErr = "";
    $nameErr = $passErr = "";
    $name = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]))
        {
            $nameErr = "Name is required";
        } else {
            $name = checkInput($_POST["username"]);
        }

        if (empty($_POST["password"]))
        {
            $passErr = "Password is required";
        } else {
            $pass = checkInput($_POST["password"]);
        }
    }
    // checker chekcer

    if (!empty($name) && !empty($pass))
    {
        //echo "Welcome " . $name . " " . $pass;
        // protect against sql injection (MILD protection)
        $name = mysqli_real_escape_string($connect, $name);
        $pass = mysqli_real_escape_string($connect, $pass);
            // Use SHA256 to encryt the pass
        $pass = hash("sha256", $pass);

        //echo $name . " " . $pass;
        $sql = "SELECT * FROM users WHERE name='$name' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($query);

        if ($rows == 1)
        {
            // username exist
            $rowArray = mysqli_fetch_array($query);
            $dbUsername = $rowArray['name'];
            $dbPassword = $rowArray['pass'];

            if ($dbUsername == $name && $dbPassword == $pass)
            {
                // Username and password match
                session_start();
                $_SESSION['username'] = $name;
                $loginErr = "Logged in successfully!" . "<br>" . "Welcome " . $_SESSION['username'];
            } // closing inner if statement
            else {
                $loginErr = "Login error: Incorrect Username or Password!";
            }
        } // Closing outer if statement
        else {
            $loginErr = "Login error: Incorrect Username or Password!";
        }

    }

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2><u>Login</u></h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="0">
            <tr>
                <td>Username: </td>
                <td><input class="login" id="username" type="text" name="username"></td>
                <td class="error"> <?php echo $nameErr ?></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input class="login" id="password" type="password" name="password"></td>
                <td class="error"> <?php echo $passErr ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="loginBtn" name="login" value="Login"> <a href="register.php">Or register</a></td>
                <td> </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
    </form>

    <h3 class="error"><?php echo $loginErr ?></h3>



</center>



</body>
</html>