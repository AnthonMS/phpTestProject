<html>
<head>
    <title>My First HTML</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php
//include ("includes/connect.php");
include ("includes/navBar.php");
?>

<?php
//session_start();
//$_SESSION['username'] = "AnthonTest";

?>


<?php
if (!isset($_GET["page"])) {
    include("includes/home.php");
}
else {
    switch ($_GET["page"])
    {
        case "home":

            include("includes/home.php");
            break;
        case "notes":
            include("includes/notes.php");
            break;
        case "showNote":
            include ("includes/showNote.php");
            break;
        case "notes2":
            include ("includes/notes2.php");
            break;
        case "user":
            include ("includes/home.php");
            break;
        case "about":
            include("includes/about.php");
            break;
        default:
            include("includes/home.php");
    };
}
?>




</body>
</html>