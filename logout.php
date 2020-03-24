<?php
session_start();
header("Location:index.php");
unset($_SESSION["uname"]);
echo "Logged out as ".$_SESSION["uname"];
echo "<script>alert(logged out )</script>";

?>
