$(document).ready(function() {

    $("#btnLogin").click(function() {
        var usernameValue = $("#username").val();
        var passwordValue = $("#password").val();

        $.ajax({
            url: "includes/doSignIn.php",
            method: "POST",
            data: {
                "username": usernameValue,
                "password": passwordValue
            },
            success: function(data) {
                //alert("success"+ data);

                if (data == 'success') {
                    window.location.href = "index.php";
                } else {
                    $("#errorMessage").html(data);
                }
            },
            error: function(data) {
                alert("Error");
            }

        });
    });

});

//live search 
function liveSearch(s) {
    //xml request
    var xmlhttp = new XMLHttpRequest;
    //checks if request work correct
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //add in result the data
                document.getElementById("result").innerHTML = this.responseText;
                //delete all names shows from loop
                if (s.length == 0) {
                    document.getElementById("result").innerHTML = "";
                }

            }
        }
        //get php data
    xmlhttp.open("GET", "includes/search.php?search=" + s, true);
    xmlhttp.send();

}