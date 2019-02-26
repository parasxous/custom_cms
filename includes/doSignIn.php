<?php

$errorMessage = "";
$username = "";
$password = "";
$pwd = "";


//check if isset username and password
if (isset($_POST["username"]) && isset($_POST["password"])) {
    include_once("config.php");
//post username and pwd
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwd = md5($_POST["password"]);
//select from db
    $queryuser = "SELECT passwords FROM users WHERE username = '$username' ";
//use query 
    $user = mysqli_query($conn, $queryuser);
//Fetch a result row as an  array
    $count = mysqli_num_rows($user);
    $row = mysqli_fetch_assoc($user);

//if row isnt empty checck first if name is exist and password is correct 
    if ($count == 1) {

        if ($row["passwords"] == $pwd) {
            session_start();
            $_SESSION["username"] = $username;
            $errorMessage="success";
        } else {
            $errorMessage = "wrong passsword";
        }

    } else {
        $errorMessage = "wrong username";
    }
    echo $errorMessage;
    mysqli_close($conn);
}



?>