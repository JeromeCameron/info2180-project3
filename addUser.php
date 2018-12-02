<?php

//PHP file loads html form to add new user with som validation using html

session_start();

//implemnts session key
$key = hash("sha512", microtime());
$_SESSION['token'] = $key;

?>

<!DOCTYPE html>

<html>
    <head>
        <title>New User Signup</title>
         <link href="forms.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="addUser.js" type="text/javascript"></script>
    </head>
    <body>
        
        <div id = "main">
             <h1>New User</h1>
        
            <form id="userForm" action = "addUserProcess.php" method = "post">
              
                <input id = "token" type = "hidden" name = "token" value = "<?php echo $key; ?>" />
                
                <label class = "formElements" for="firstname">First Name</label><br>
                <input class = "formElements" id="firstname" name = "firstname" type="text" placeholder = "First Name" required /><br>
            
                <label class = "formElements" for="lastname">Last Name</label><br>
                <input class = "formElements" id="lastname" name = "lastname" type="text" placeholder = "Last Name" required /><br>
                
                <label class = "formElements" for="password">Password</label><br>
                <input class = "formElements" id="password" name = "password" type="password" placeholder = "Password" required /><br>
                
                <label class = "formElements" for="email">Email</label><br>
                <input class = "formElements" id="email" name = "email" type="email" placeholder = "eg: name@mail.com" required /><br>
                
                <label class = "formElements" for="telephone">Telephone</label><br>
                <input class = "formElements" id="telephone" name = "telephone" type="tel" pattern="^\d{3}-\d{3}-\d{4}$" placeholder = "eg: 876-555-7777" required /><br>
                
                <input id = "button" type= "submit" name = "submit" value = "submit"> </input>
                
                <div id = "message"></div>
                
            </form>
        </div>
       
    </body>
    
</html>