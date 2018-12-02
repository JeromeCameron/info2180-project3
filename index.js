// JavaScript File
$(document).ready(function(){
   
   $('#main').load("dashboard.html");
    
    $('#add_user').click(function(){
        $('#main').load("addUser.php");
    });
});
