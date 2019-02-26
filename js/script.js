//general function
function check(value, regularExpression, errorMessage) {
    var returnMessage = "";
    if (!regularExpression.test(value)) {
        returnMessage = errorMessage;
    }
    return returnMessage;
}

//addclass 
function changeClass(id, addClass) {
    document.getElementById(id).className = addClass;
}


//check username
function userNameCheck() {
    var error = check(document.getElementById("username").value, /^[a-zA-Z0-9]+$/, "Wrong username")
    if (error != "") {
        document.getElementById("result1").innerHTML = error;
        changeClass("result1", "secondClass");
    } else {
        document.getElementById("result1").innerHTML = "correct";
        changeClass("result1", "firstClass");

    }
}

// check email
function checkEmail() {
    var error = check(document.getElementById("email").value, /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/, "Wrong Email");
    if (error != "") {
        document.getElementById("result2").innerHTML = error;
        changeClass("result2", "secondClass");
    } else {
        document.getElementById("result2").innerHTML = "correct";
        changeClass("result2", "firstClass");
    }

}
//check pwd
function checkPassword() {
    var error = check(document.getElementById("password").value, /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/, "Minimum eight characters, at least one letter and one number:");
    if (error != "") {
        document.getElementById("result3").innerHTML = error;
        changeClass("result3", "secondClass");
    } else {
        document.getElementById("result3").innerHTML = "correct";
        changeClass("result3", "firstClass");
    }
}
//check pwd
function checkPasswordAgain() {
    var error = check(document.getElementById("pwdcheck").value, /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/, "enter a valid password");
    var pwd1 = document.getElementById("password").value;
    var pwdcheck = document.getElementById("pwdcheck").value;

    if (error != "") {
        document.getElementById("result4").innerHTML = error;
        changeClass("result4", "secondClass");
    } else {
        if (pwd1 != pwdcheck) {
            document.getElementById("result4").innerHTML = "paswords dont match";
            changeClass("result4", "secondClass");
        } else {
            document.getElementById("result4").innerHTML = "correct";
            changeClass("result4", "firstClass");
        }
    }

}
//check name and lastname
function checkNames(InputValue, errorId) {
    var error = check(InputValue, /^[a-zA-Z]+$/, "the field must contains only letters");

    if (error != "") {
        document.getElementById(errorId).innerHTML = error;
        changeClass(errorId, "secondClass");
    } else {
        document.getElementById(errorId).innerHTML = "correct";
        changeClass(errorId, "firstClass");
    }
}


function check2() {
    var errorArray = ["result1", "result2", "result3", "result4", "result5", "result6"];
    var hasError = false;
    var temp = "";
    for (var i = 0; i < errorArray.length; i++) {
        temp = document.getElementById(errorArray[i]).className;

        if (temp == "secondClass") {
            hasError = true;
        }

    }

    if (hasError == true) {
        alert("check fields again!");
    } else {

        document.getElementById("form").submit();
    }
}