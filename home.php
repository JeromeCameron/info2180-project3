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
        <link href="index.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="index.js" type="text/javascript"></script>
	
    </head>
    
    <body class="container">
        
        <div id="banner">
            <h1>HireMe</h1>
        </div>
        
        <div id="navigation">
            
            <div id = "box1">
                <img src="Images/home.png"></img>
                <img src="Images/addUser.png"></img>
                <img src="Images/addJob.png"></img>
                <img src="Images/logout.png"></img>
            </div>
            
            <div id = "box2">
                <a class= "navLink" id = "dashboard" href="dashboard.html" target="iframe_a">Home</a>
                <a class= "navLink" id = "add_user" href="addUser.php" target="iframe_a">Add User</a>
                <a class= "navLink" id = "add_job" href="addJob.php" target="iframe_a">New Job</a>
                <a class= "navLink" id = "logout" href="logout.php" target="iframe_a">Logout</a>
            </div>
            
        </div>
        
         <!-- Pages load here -->
        <div id = "main">
            <div id = "result">
         </div></div>
    
    </body>
    
</html>