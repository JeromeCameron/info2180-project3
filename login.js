// JavaScript File
/*global $*/
/*window.onload = function(){

$('#loginArea').submit(function(e) {
    e.preventDefault();
    var username = $('input#email').val();
    var password = $('input#password').val();

    if(password == ""){
       alert("Please enter a Password");
       $('#password').focus();
       return false;
    }

    if(username == ""){
       alert("Please enter a Email");
       $('#email').focus();
       return false;
    }

    if(username != '' && password != '') {
        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: {
                username: username,
                password: password
            },
            success: function(data) {
                console.log(data);
                // It looks like the page that handles the form returns JSON
                // Parse the JSON
                var obj = JSON.parse(data);

                if(obj.result != 'invalid') {
                    alert("Login succeeded");
                    // You should redirect the user too
                    window.location.href = 'dashboard.html';
                }else{
                    alert("Login failed");
                    window.location.href = 'index.html'
                }                    
            }
        });
    } 
}); 
}*/