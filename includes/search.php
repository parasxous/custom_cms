<?php
//database include
include_once("config.php");
$search = $_GET['search'];
// checks all letters or numbers on database one by one on key up
$search_query = "SELECT * FROM posts WHERE title LIKE '%$search%' ";
$search = mysqli_query($conn, $search_query);
//loop  
if (mysqli_num_rows($search) > 0) {
    while ($row = mysqli_fetch_assoc($search)) {
//shows results in a span 
        echo "<span><a  id='ena'  href= #".$row['title'].">  TITLE: ".$row['title']."<br>"."POSTED BY:".$row["insertDate"]. "</a></span>";
    }
} else {
//error
    echo "<span> doesnt exist </span> ";
}

?>