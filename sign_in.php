<?php 
include("includes/header.php");

?>
    <form action="" method="POST">
            <h2>LOGIN</h2>
        <input type="text" name="username" placeholder="Username" id="username"><br>
        <input type="password" name="password" placeholder= "Password" id="password">
        <p id="errorMessage"></p>
        <button type="button" id="btnLogin">Login</button>
    <p id="left"> <a href="sendMail.php"> Forgot your password!</a></p>
    <p id="right"> <a href="sign_up.php"> Sign Up!</a></p>
    </form>



<?php 
include("includes/footer.php");
?>