<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "moviesblog";

$conn = mysqli_connect($host,$username,$password,$db);

if (!$conn) {
    die("Error establishing database connection. Error:" . mysqli_connect_error());
}



?>