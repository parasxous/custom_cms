
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    
    <title>MOVIES BLOG</title>
</head>
<body>
   <nav >
  <a href="index.php"><img id="logo" src="images/logo.png" alt="img" ></a> 
        <ul>
        <?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            echo '<li><a href="addPost.php">Add Post</a></li>';
            echo '<li><a href="includes/dologout.php">Hello, '.$_SESSION["username"].' Logout</a></li>';
        }else{
            echo '<li><a href="sign_in.php"> Login</a></li>';
            echo '<li><a href="sign_up.php">Sign up</a></li>';
        }
        ?>
                   
        </ul>
    </nav>
    <h1>MOVIES BLOG</h1>
        