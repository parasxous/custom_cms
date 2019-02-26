<?php 
include_once("includes/header.php");
include_once("includes/doSignup.php");
?>
    <form action="" method="POST" id="form">
        <h2>CREATE AN ACCOUNT</h2> 
        <input type="text" id="username" placeholder="Username" name="username" onkeyup="userNameCheck()" maxlength="30"  required>
        <div class="result">
            <span class="error" id="result1"></span>
        </div>

        <input  type="email" id="email" placeholder="Email" onkeyup="checkEmail()" name="Email" required>
       <div class="result">
            <span class="error" id="result2"></span>
        </div>

        <input type="password" id="password" onkeyup="checkPassword()" placeholder="Password" name="password" required>
       <div class="result">
            <span class="error" id="result3"></span>
        </div>

        <input type="password" id="pwdcheck"  placeholder="Password check" onkeyup="checkPasswordAgain()" name="password_config"  required>
        <div class="result">
            <span class="error" id="result4"></span>
        </div>

        <input type="text" id="name" placeholder="Name" onkeyup="checkNames(this.value,'result5')" name="Name" required>
       <div class="result">
            <span class="error" id="result5"></span>
        </div>

        <input type="text" id="lastname" placeholder="Last Name" onkeyup="checkNames(this.value,'result6')"name="lastName" required>
        <div class="result">
            <span class="error" id="result6"></span>
        </div>

        <button type="button" onclick="check2()">Sign Up</button>
        <p> <?php echo $error; ?>  </p>
        <p>You have alreary account: <a href="sign_in.php">Sign in! </a></p>

    </form>

<?php include_once("includes/footer.php") ?>

