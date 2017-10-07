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
    <a class="topnavBtns" href="?page=home">Home</a>
    <a class="topnavBtns" href="?page=notes">Notes</a>
    <a class="topnavBtns" href="?page=notes2">Notes 2</a>
    <a class="topnavBtns" href="?page=about">About</a>
    <a id="nameButton" href="?page=user"><?php echo $name ?></a>
</div>



<center>

</center>



</body>
</html>