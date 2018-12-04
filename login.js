// JavaScript File
window.onload = function(){
var attempt = 3; // Variable to count number of attempts.
// Below function Executes on click of login button.
var username = document.getElementById("email");
var password = document.getElementById("password");
var button =document.getElementById("login");

button.addEventListener("click",login);
function login() {
    // body...
   /* if ( username.value == "" && password.value == ""){
         document.getElementById("loginArea").innerHTML="No email or password entered";
         document.getElementById("loginArea").style.border="2px";
               return;
}*/
var url = "login.php?email="+username.value;
var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
             
             console.log(this.responsetext);
            
    
            }
          };
            xhttp.open("POST", url, true);
            xhttp.send(null);
            
            alert("works 2");
         }
/*function validate(){




if ( username ===  && password == "formget#123"){
alert ("Login successfully");
window.location = "dashboard.html"; // Redirecting to other page.
return false;
}
else{
attempt --;// Decrementing by one.
alert("You have left "+attempt+" attempt;");
// Disabling fields after 3 attempts.
if( attempt == 0){
document.getElementById("email").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("login").disabled = true;
return false;
}
}
}*/
}