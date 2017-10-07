<html>
<head>
    <title>My First HTML</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/styleNavBar.css">
</head>
<body>

<?php
include ("connect.php");

session_start();
//$_SESSION['username'] = "AnthonTest";
$name = $_SESSION['username'];
?>


<div class="topnav" id="myTopnav">
    <a href="?page=home">Home</a>
    <a href="?page=notes">Notes</a>
    <a href="?page=user"><?php echo $name ?></a>
    <a href="?page=about">About</a>
</div>

<center>

</center>



</body>
</html>