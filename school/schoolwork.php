<html>
<head>
    <title>My First HTML</title>
    <meta charset="UTF-8">
</head>
<body>

<center>

    <?php
    $name = $pass = "";
    $nameMatch = $passMatch = false;

    for ($i = 1; $i <= 10; $i++)
    {
        echo $i . " | ";
    }
    ?>

    <h3>Example with Nested loops</h3>

    <?php
    for ($i = 1; $i <=10; $i++)
    {
        for ($j = 1; $j <= 10; $j++)
        {
            echo $i * $j . " | ";
        }
        echo "<br>";
    }
    ?>

    <h3>Example with GET method</h3>

    <?php
    print_r($_GET);
    ?>

    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="0">
            <tr>
                <td>Name: </td>
                <td><input class="login" id="name" type="text" name="name"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="submitBtn" name="submit" value="ClickHere"> </td>
            </tr>
        </table>
    </form>

    <?php
    echo "Welcome " . $_GET["name"];
    //$name = $_GET["name"];
    ?>

    <h3>Example with POST method</h3>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="0">
            <tr>
                <td>Name: </td>
                <td><input class="login" id="name2" type="text" name="name2"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="submitBtn2" name="submit2" value="ClickHere2"> </td>
            </tr>
        </table>
    </form>

    <?php
    echo "Welcome " . $_POST["name2"];
    //$name = $_POST["name2"];
    ?>

    <h3>Example with Multidimensional Array</h3>

    <?php
    $users = array
    (
        array("Anthon", "kode123"),
        array("Mads", "123kode"),
        array("Jonas", "kode2345"),
        array("Noah", "TestKode")
    );

    $name = $_POST["name3"];
    $pass = $_POST["password"];
    $arrayName = "";

    for ($row = 0; $row < count($users); $row++)
    {
        $arrayName = $users[$row][0];
        //echo "<br>" . $arrayName;
        if ($arrayName == $name)
        {
            // name matches
            $nameMatch = true;
            $arrayPass = $users[$row][1];
            //echo "Name: " . $name . " Pass: " . $pass . " ArrayPass: " . $arrayPass;
            if ($arrayPass == $pass)
            {
                // both the password and name match data in array
                $passMatch = true;
                //echo "Successfully logged in with " . $name;
            }
        }
    }

    if($nameMatch && $passMatch)
    {
        echo "Successfully logged in with... " . $name;
    } else {
        echo "Please enter valid userinformation";
    }



    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="0">
            <tr>
                <td>Username: </td>
                <td><input class="login" id="name3" type="text" name="name3"></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input class="login" id="password" type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class="submitBtn3" name="submit3" value="ClickHere3"> </td>
            </tr>
        </table>
    </form>


</center>

</body>
</html>