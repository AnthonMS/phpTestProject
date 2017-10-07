<html>
<head>
    <title>My First HTML</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <?php
    //include ("includes/connect.php");
    ?>

    <h1></h1>
    <h1><u>Home</u></h1>

    <h3>Hello <?php echo $_SESSION['username']; ?></h3>

    <?php

    $username = $_SESSION["username"];
    $userID = $_SESSION["userID"];

    // get the notes from the currently logged in user
    $sql = "SELECT * FROM notes WHERE userid='$userID'";
    //$query = mysqli_query($connect, $sql);
    //$rows = mysqli_num_rows($query);
    $result = $connect->query($sql);

    echo "<ul>";

    if ($result->num_rows > 0)
    {
        // output data of each row
        while ($row = $result->fetch_assoc())
        {
            /*echo "noteID: " . $row["noteID"] .
                " - userID: " . $row["userid"] .
                " - NoteTitle: " . $row["noteTitle"] .
                " - NoteBody: " . $row["noteBody"] .
                "<br>";*/
            echo "<li><a href='main.php?page=showNote'>" . $row["noteTitle"] . "</a></li>";
        }
    }
    else {
        echo "<li>0 results</li>";
    }

    echo "</ul>"

    ?>




</body>
</html>