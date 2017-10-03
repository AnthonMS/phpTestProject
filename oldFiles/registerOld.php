<html>
<body>

<center>

    <?php
    include ("includes/connect.php");
    ?>

    <?php
    $mailExist = false;
    $nameExist = false;

    $loginErr = "";
    $nameErr = $mailErr = $passErr = "";
    $name = $mail = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]))
        {
            $nameErr = "Name is required";
        } else {
            $name = checkInput($_POST["username"]);
        }

        if (empty($_POST["email"]))
        {
            $mailErr = "Email is required";
        } else {
            $mail = checkInput($_POST["email"]);
        }

        if (empty($_POST["password"]))
        {
            $passErr = "Password is required";
        } else {
            $pass = checkInput($_POST["password"]);
        }
    }


    /*$username = $_POST["username"];
    $mail = $_POST["email"];
    $pass = $_POST["password"];

    $username = stripslashes($username);
    $username = strip_tags($username);
    $username = mysqli_real_escape_string($connect, $username);

    $mail = stripslashes($mail);
    $mail = strip_tags($mail);
    $mail = mysqli_real_escape_string($connect, $mail);

    $pass = stripslashes($pass);
    $pass = strip_tags($pass);
    $pass = mysqli_real_escape_string($connect, $pass);
    $pass = hash("sha256", $pass);*/

    // Now check if the username and email address is already in the database
    // If it is already a user, it should not be able to create another.
    $sql = "SELECT name, mail FROM users";
    $result = $connect->query($sql);
    if ($result->num_rows > 0)
    {
        // If there are data in the desired database table
        while ($row = $result->fetch_assoc())
        {
            // get output data of each row
            if ($row["name"] == $username)
            {
                // There is a row in the database with that name
                $nameExist = true;
                //echo "Error: " . $username . " is already taken...";
            }
            if ($row["mail"] == $mail)
            {
                // mail already exist in database
                $mailExist = true;
                //echo "Error: " - $mail . " is already registered...";
            }
        }
    }

    if ($nameExist == false)
    {
        // name does not exist
        if ($mailExist == false)
        {
            // mail does not exist
            if ($username != "" &&
                $_POST["password"] != "" && $mail != "")
            {
                // None of the variables are empty, we can register the user here.
                // The Username, password and mail has all been stripped for characters that could be a potential sqlinjection attempt.
                // This is probably not the best way to keep it secure,
                // this is probably just a quick way to keep the script kiddies away.
                // Hardcore hackers would most likely get through it easily.

                //echo "Welcome " . $username . "<br />";
                //echo "Your password is: " . $pass . "<br />";
                //echo "Your email is: " . $mail;

                $sql = "INSERT INTO users (uid, name, mail, pass) VALUES (NULL, '$username', '$mail', '$pass')";

                if ($connect->query($sql) === TRUE)
                {
                    echo "<h3><u>Successfully registered user!</u></h3>";
                    echo "<p>Username: <b>" . $username . "</b></p>";
                    echo "<p>Password: <b>************</b></p>";
                    echo "<p>Email: <b>" . $mail . "</b></p>";
                }
                else
                {
                    //echo "Error in registering user...";
                    echo "ERROR: " . $sql . "<br />" . $connect->error;
                }
            }

        } // close mailExist
        else {
            // mail exist
            echo "Error: " . $mail . " is already registered...";
        }
    } // close if nameExist
    else {
        // name exist
        echo "Error: " . $username . " is already taken...";
    }

    ?>



    <h2><u>Register</u></h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="0">
            <tr>
                <td>Username: </td>
                <td><input class="login" id="username" type="text" name="username"></td>
                <td class="error">* <?php echo $nameErr ?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input class="login" id="email" type="email" name="email"></td>
                <td class="error">* <?php echo $emailErr ?></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input class="login" id="password" type="password" name="password"></td>
                <td class="error">* <?php echo $passErr ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="registerBtn" name="register" value="register"> <a href="index.php">Or login</a></td>
                <td> </td>
            </tr>
        </table>
    </form>

    <h3 class="error"><?php echo $loginErr ?></h3>



</center>


</body>
</html>