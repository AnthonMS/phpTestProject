<?php
session_start();
?>
<html>
<head>
    <title>My First HTML</title>
    <meta charset="UTF-8">
</head>
<body>

<center>
    <?php
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "Cat";
    echo "Session variables are set... <br>";
    ?>

    <a href="sessionTest2.php">Test variables</a>
</center>

</body>
</html>