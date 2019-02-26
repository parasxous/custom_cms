<?php 
//start a session
session_start();
include("includes/functions.php");
include_once("includes/header.php");
?>
    <div id="container">
          <h2>* UPCOMING MOVIES 2018 *</h2>
      <div class='slider'>
            <div class='slide1'></div>
            <div class='slide2'></div>
            <div class='slide3'></div>
            <div class='slide4'></div>
      </div>
             <h2>* MOVIES BLOG *</h2>
         <div id="searchbox">
             <input id="search" type="text" name="search"  placeholder="Search Movie" onkeyup="liveSearch(this.value)">
            <div id="result" name="result">
                <span id="show"></span>
            </div>
        </div>
     
          <?php 
            doPosts();
           ?>
           
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form id="modal-form">
            <h2>LOGIN</h2>
        <input type="text" name="username" placeholder="Username" id="username">
        <input type="password" name="password" placeholder= "Password" id="password">
        <p id="errorMessage"></p>
        <button type="button" id="btnLogin">Login</button>
    </form>
        </div>
        <div class="modal-footer">
          <button  type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
<?php 
include("includes/footer.php");
?>