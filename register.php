<html>
<head>
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
    $mailExist = false;
    $nameExist = false;

    $registerErr = "";
    $nameErrReg = $mailErrReg = $passErrReg = "";
    $nameReg = $mailReg = $passReg = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["usernameReg"]))
        {
            $nameErrReg = "Name is required";
        } else {
            $nameReg = checkInput($_POST["usernameReg"]);
        }

        if (empty($_POST["emailReg"]))
        {
            $mailErrReg = "Email is required";
        } else {
            $mailReg = checkInput($_POST["emailReg"]);
        }

        if (empty($_POST["passwordReg"]))
        {
            $passErrReg = "Password is required";
        } else {
            $passReg = checkInput($_POST["passwordReg"]);
        }


        if (!empty($nameReg) && !empty($mailReg) && !empty($passReg))
        {
            // none of the variables are empty
            // Protect against sql injection
            $nameReg = mysqli_real_escape_string($connect, $nameReg);
            $mailReg = mysqli_real_escape_string($connect, $mailReg);
            $passReg = mysqli_real_escape_string($connect, $passReg);
            // Use SHA256 to encrypt the password
            $passReg = hash("sha256", $passReg);

            $sql = "SELECT name, mail FROM users";
            $result = $connect->query($sql);
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    // get output of the desired rows
                    if ($row["name"] == $nameReg)
                    {
                        // username exists in db
                        $nameExist = true;
                    }
                    if ($row["mail"] == $mailReg)
                    {
                        $mailExist = true;
                    }
                }
            }

            if ($nameExist == false)
            {
                // name does not exist
                if ($mailExist == false)
                {
                    // mail does not exist, we can create the user.
                    $sql = "INSERT INTO users (uid, name, mail, pass) VALUES (NULL, '$nameReg', '$mailReg', '$passReg')";

                    if ($connect->query($sql) === TRUE)
                    {
                        $registerErr = "Successfully registered user!" . "<br />"
                            . "Username: <b>" . $nameReg . "</b> <br />"
                            . "Email: <b>" . $mailReg . "</b> <br />"
                            . "Password: <b>***********</b> <br />";
                    } else {
                        $registerErr = "ERROR: " . $sql . "<br>" . $connect->error;
                    }
                } else {
                    $registerErr = "ERROR: " . $mailReg . " already exist in the database";
                }
            } else {
                $registerErr = "ERROR: " . $nameReg . " already exist in the database";
            }



        } // closing check if the name, mail and pass are empty
        else {
            $registerErr = "ERROR: empty field(s)";
        }
    } // closing checking if it is a POST method

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>



    <h2><u>Register</u></h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="0">
            <tr>
                <td>Username: </td>
                <td><input class="login" id="usernameReg" type="text" name="usernameReg"></td>
                <td class="error">* <?php echo $nameErrReg ?></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input class="login" id="emailReg" type="email" name="emailReg"></td>
                <td class="error">* <?php echo $emailErrReg ?></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input class="login" id="passwordReg" type="password" name="passwordReg"></td>
                <td class="error">* <?php echo $passErrReg ?></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="registerBtn" name="register" value="register"> <a href="index.php">Or login</a></td>
                <td> </td>
            </tr>
        </table>
    </form>

    <h3 class="error"><?php echo $registerErr ?></h3>



</center>


</body>
</html>