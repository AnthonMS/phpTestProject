<!DOCTYPE html>
<html>
<body id="connectBody">
<center>

    <?php
    $serverName = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "usersystemdemo";

    $connect = new mysqli($serverName, $username, $password, $dbName);

    if ($connect->connect_error)
    {
        //die("Connection failed... " + $connect->connect_error);
    }
    //echo "Connection succesful";
    ?>

</center>
</body>

</html>
