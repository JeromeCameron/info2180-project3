<?php

session_start();

//$_SESSION['userId'] = 1;

// if(!isset($_SESSION['userId'])){
//     header('Location: index.html');
// }

?>

<!DOCTYPE html>

<html>
    <head>
        <title>Dashboard</title>
        <link href="home.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="home.js" type="text/javascript"></script>
	
    </head>
    
    <body class="container">
        
        <div id="banner">
            <h1>HireMe</h1>
        </div>
        
        <div id="navigation">
            
            <div id = "box1">
                <img class = "icons" src="Images/home.png"></img>
                <img class = "icons" src="Images/addUser.png"></img>
                <img class = "icons" src="Images/addJob.png"></img>
                <img class = "icons" src="Images/logout.png"></img>
            </div>
            
            <div id = "box2">
                <a class= "navLink" id = "dashboard" href="">Home</a>
                <a class= "navLink" id = "add_user" href="" >Add User</a>
                <a class= "navLink" id = "add_job" href="" >New Job</a>
                <a class= "navLink" id = "logout" href="">Logout</a>
            </div>
            
        </div>
        
         <!-- Pages load here -->
        <div id = "home_main">
            <div id = "home_result">
         </div></div>
    
    </body>
    
</html>