<?php
$servername ="localhost:3306";
$dbuser="root";
$dbpassword ="MelKelVin909$";
$dbname ="rascon_tastes";

$conn = new mysqli($servername, $dbuser, $dbpassword,$dbname);
if (!$conn){
    die("could not connect ");
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>