<html>
<head>
    <title>My First HTML</title>
    <meta charset="UTF-8">
</head>
<body>

    <?php
    //include ("includes/connect.php");
    ?>

    <?php
    $username = $_SESSION["username"];
    $noteTitle = $noteBody = "";
    $userID = $_SESSION['userID'];

    $submitNoteMessage = "";

    // checking if it is a POST call or just opene notes.php site.
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!empty($_POST["noteTitle"]))
        {
            // note title is not empty
            $noteTitle = checkInput($_POST["noteTitle"]);
        }
        if (!empty($_POST["noteBody"]))
        {
            // note body is not empty
            $noteBody = checkInput($_POST["noteBody"]);
        }

        if (!empty($noteTitle) && !empty($noteBody))
        {
            // no empty fields
            $noteTitle = mysqli_real_escape_string($connect, $noteTitle);
            $noteBody = mysqli_real_escape_string($connect, $noteBody);

            // get the userID from the currrent logged in user
            $sql = "INSERT INTO notes (noteID, userid, noteTitle, noteBody) VALUES (NULL, '$userID', '$noteTitle', '$noteBody')";

            if ($connect->query($sql) === TRUE)
            {
                // successfully added note to notes
                $submitNoteMessage = "Successfully saved note!";
            } else {
                // unsuccessful...
                $submitNoteMessage = "Unsuccessful in saving note. <br> Please try again.";
            }
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

    <h1>Hello from Notes!</h1>
    <h1><u>Notes</u></h1>

    <form method="post" action="main.php?page=notes">
        <table border="0">
            <tr>
                <td>Title: </td>
                <td><input class="noteInput" id="noteTitle" type="text" name="noteTitle"></td>
            </tr>
            <tr>
                <td>Input:</td>
            </tr>
            <tr>
                <td colspan="2"><textarea class="noteInput" id="noteBody" name="noteBody"></textarea> </td>
            </tr>
            <tr>
                <td><input type="submit" class="submitNoteBtn" class="submitNote" name="submitNote" value="Submit Note"></td>
            </tr>
        </table>
    </form>

    <h3 class="error"> <?php echo $submitNoteMessage; ?> </h3>




</body>
</html>