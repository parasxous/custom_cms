<?php

include_once("config.php");

//general check function
function generalCheck($value, $regularExpression, $errorMessage){
    $returnMessage = "";
    if (!preg_match($regularExpression, $value)) {
        $returnMessage = $errorMessage;
    }
      return $returnMessage;
}


function doPosts(){
    $resultMessage = "";
    global $conn;
    $sql = "SELECT title,descriptions,trailer_url,user_id,insertDate,icon,id FROM posts";
    $result = mysqli_query($conn, $sql);

    while($row= mysqli_fetch_assoc($result)){
        $resultMessage .= '<div id="addmovie" class="row">';        
        $resultMessage .= '<div class="offset-md-1 col-md-4 postimg">';
        $resultMessage .= "<img  class='imgpost' src=".$row["icon"]." "."alt='img'>";
        $resultMessage .= '</div>';
        $resultMessage .= '<div class="col-md-5 title">';
        $resultMessage .= "<h3><a id=".$row['title'].">TITTLE: ".$row['title']."</a></h3>";       

        if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
            $resultMessage .= '<span class="trailer">DESCRIPTION:</span>';
            $resultMessage .= '<p class="description">' . $row['descriptions'] . '</p>';
            $resultMessage .= '<button type="button" class="read"><a href='.$row["trailer_url"].' target="blank">WatchTrailer</a></button><br>';
        }else{
            $resultMessage .= '<span class="trailer">DESCRIPTION:</span>';
            $resultMessage .= '<p class="description">' .$row['descriptions']. '</p>';
            $resultMessage .= '<button type="button" class="read" data-toggle="modal" data-target="#myModal">WatchTrailer</button><br/>';

        }
        $resultMessage .= '<span class="trailer">POSTED BY: '.$row["user_id"]." ".$row["insertDate"].'</span>';

        $resultMessage .= '</div> </div>';
    }
    echo $resultMessage;
}

