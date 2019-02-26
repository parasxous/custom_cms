<?php 
include("includes/header.php");
session_start();
//php mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/PHPMailer/src/Exception.php';
require 'includes/PHPMailer/src/PHPMailer.php';
require 'includes/PHPMailer/src/SMTP.php';
//check if isset email
if (isset($_POST["email"])) {
//inlude config
    include_once("includes/config.php");

    $email = $_POST["email"];
  //randomstring function
    function generateRandomString($length = 12)
    {
        $characters = '23456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ!@#$%^&*()_-';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
  //pass function into variable 
    $random = generateRandomString($length = 12);
 //set randomstring function where e mail is same as $email
    $updaterecover = "UPDATE users  SET forgot_pass = '$random' WHERE email= '$email'";
  //select pass recovery from database when email is same as $email
    $selectRecover = "SELECT forgot_pass FROM users WHERE email ='$email'";
  //update query
    $updateRec = mysqli_query($conn, $updaterecover);
  //select recovery query
    $SelectRec = mysqli_query($conn, $selectRecover);
  //Fetch a result row as an  array
    $rowRec = mysqli_fetch_assoc($SelectRec);
  //if rowRec_pass recovery send e mail 
    if ($rowRec['forgot_pass']) {
  //php mailer
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "titan.indns.gr";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = true;
        $mail->Username = "info@gendev.eu";
        $mail->Password = "paris1995987654321";
        $mail->setFrom("info@gendev.eu", "Info - Recovery");
        $mail->AddAddress("$email");
        $mail->Subject = "Password recovery";
        $mail->msgHTML("<a href='http://localhost/CMS/recoveryPass.php?recovery={$rowRec['forgot_pass']}'>reset your password</a>");
    //get errors if mail dont send
        if (!$mail->send()) {
            echo "Mailer error: " . $mail->ErrorInfo;
        } else {
      //check your email
            echo "<h1> recovery link send check your email</h1>";
        }
    } else {
    // if email doesnt exist in database show this
        echo "<h1>Email is not exist</h1>";
    }

}
?>

    <form action="" method="post" >
      <p>Enter Email Address To Send Password Link</p>
      <input type="text" name="email">
      <button type="submit" name="submit_email">SEND!</button>
    </form>

<?php 
include("includes/footer.php");
?>

