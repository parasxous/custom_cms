<?php
    include_once("config.php");
    session_start();


    $title = $_POST["title"];
    $description = $_POST["description"];
    $trailer = $_POST["trailer"];
    $target_dir = "../images/";
    $target_file = $target_dir.basename($_FILES["image"]["name"]);
    $dbDir = "images/".basename($_FILES["image"]["name"]);
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    $insertposts = "INSERT INTO posts (title, descriptions, trailer_url, icon, user_id ) VALUES ('$title', '$description', '$trailer','$dbDir','$_SESSION[username]' ) ";
    $query = mysqli_query($conn, $insertposts);
    header("Location: ../index.php");
    if (!$query) {
        echo mysqli_error($conn);
    } 
    

    

}





    

?>