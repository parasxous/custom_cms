<?php 
session_start();
include("includes/header.php");
if (!isset($_SESSION["username"]) && empty($_SESSION["username"])) {
    header("Location: index.php");
}
 ?>
<form action="includes/doPosts.php" method="POST" enctype="multipart/form-data">
    <input type="text" placeholder="Tittle" name="title"><br>
    <input type="text" placeholder="Trailer example https://www.youtube.com/watch?v=xjDjIWPwcPU" name="trailer"><br>
    <input type="text" placeholder="Description" name="description">
    <input type="file" name="image">
    <button type="submit">POST</button>
</form>

<?php include("includes/footer.php"); ?>
