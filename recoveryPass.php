<?php 
include("includes/header.php");
// check if isset pass and new pass
if (isset($_POST['newPassword']) && $_POST['pass_confirm']) {
    include_once("includes/config.php");
    //get recovery from url 
    $random = $_GET["recovery"];
    // post md5 new passwords
    $pass = md5($_POST['newPassword']);
    $passCon = md5($_POST["pass_confirm"]);
    //check if pass ==  pass con
    if ($pass == $passCon) {
        //update password
        $updatepwd = "UPDATE users  SET passwords = '$pass', forgot_pass = NULL WHERE forgot_pass='$random'";
        //update query
        $update = mysqli_query($conn, $updatepwd);
        if ($update) {
            echo "<h1>Password updated</h1>";
        }

    } else {
        echo "<h1>password dont match</h1>";
    }

//close conection
    mysqli_close($conn);

}

?>
    <h1>PASSWORD RECOVERY</h1>
    <form action="" method="POST">
        <input type="password" name="newPassword" placeholder="New password" required><br>
        <span class="validity"></span>
        <input type="password" name="pass_confirm" placeholder= "Password confirm" required><br>
        <span class="validity"></span>
        <button type="submit">Confirm</button>
    </form>
    <span id="left"> <a href="sign_in.php"> Login!</a></span>
    <span id="right"> <a href="sign_up.php"> Sign Up!</a></span>



<?php 
include("/includes/footer.php");
?>
