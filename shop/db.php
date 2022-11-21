<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "dbgadget";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($mysql_database, $bd) or die("Could not select database");
?>