<?php
include_once("config.php");
include_once("functions.php");
//php mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$error="";
if(isset($_POST ["Name"]) && isset($_POST["lastName"]) &&isset($_POST["Email"]) && isset($_POST["username"]) && isset($_POST["password_config"]) && isset($_POST["password"])){

//posts from sign up
$name = $_POST["Name"];
$lastName = $_POST["lastName"];
$email = $_POST["Email"];
$username = $_POST["username"];
$passwordCheck = md5($_POST["password_config"]);
//encrypt pwd to md5
$pwd = md5($_POST["password"]);


//regex check
$errorName = generalCheck($name, "/^[a-zA-Z]+$/", " invalid name ");
$errorLastName = generalCheck($lastName, "/^[a-zA-Z]+$/", " invalid last name ");
$errorEmail = generalCheck($email, "/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", " invalid email ");
$errorUsername = generalCheck($username, "/^[A-Za-z]{1}[A-Za-z0-9]{5-31}$/", " invalid username ");




//password check 
if ($pwd != $passwordCheck) {
    $errorMessage = "password dont match";
}

if($errorName != "" && $errorLastName !="" && $errorEmail != "" && $errorUsername !=""){
    $error = "One or more fields are wrong , check fields again";
}else{
   




//Checks if username and email allready exist in database
$user_check = "SELECT * FROM users WHERE username='$username' OR Email='$email' LIMIT 1";

$result = mysqli_query($conn, $user_check);
//get data in array from database
$userquery = mysqli_fetch_assoc($result);



//check if username exist 
if ($userquery) { // if user exists
    if ($userquery['username'] === $username) {
        $error= "username exists";
        // echo "<p>username exists<p>";
    }

    // check if email exist
    if ($userquery['email'] === $email) {
        echo "<p>email exists<p>";
    }
} else {

    //insert data to database from sing_up
    $insert = "INSERT INTO users (username, email, passwords, names, lastName) VALUES ('$username', '$email', '$pwd', '$name', '$lastName')";

    $query = mysqli_query($conn, $insert);

    if (!$query) {
        echo mysqli_error($conn);
    } else {
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
      
        //send e mail with php mailer
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "titan.indns.gr";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = true;
        $mail->Username = "info@gendev.eu";
        $mail->Password = "paris1995987654321";
        $mail->setFrom("info@gendev.eu", "Info - Register");
        $mail->AddAddress("$email", "$username");
        $mail->Subject = "Register Complete";
        $mail->msgHTML("<h2>Thank you for your registration </h2>");

        if (!$mail->send()) {
            echo "Mailer error: " . $mail->ErrorInfo;
        } else {
         //redirect to login
            header("location:sign_in.php");
        }
    }
 }
    mysqli_close($conn);

 }

}


 ?>