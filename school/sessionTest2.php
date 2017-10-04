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
    echo "Favorite color: " . $_SESSION["favcolor"] . "<br>";
    echo "Favorite animal: " . $_SESSION["favanimal"];
    ?>

    <?php
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    ?>
</center>

</body>
</html>