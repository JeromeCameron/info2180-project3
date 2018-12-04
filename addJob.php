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
        <title>Add Job</title>
         <link href="forms.css" type="text/css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="addJob.js" type="text/javascript"></script>
    </head>
    <body>
        
        <div id = "main">
             <h1>New Job</h1>
        
            <form id="jobForm" action = "addJobProcess.php" method = "post">
                
                <input id = "token" type = "hidden" name = "token" value = "<?php echo $key; ?>" />
                
                <label class = "formElements" for="jobTitle">Job Title</label><br>
                <input class = "formElements" id="jobTitle" name = "title" type="text" placeholder = "e.g product manager" required><br>
            
                <label class = "formElements" for="jobInfo">Job Description</label><br>
                <textarea class = "formElements" id="jobInfo" rows="5" cols="50" name="jobInfo" form="jobForm" required ></textarea><br>
                
                <label class = "formElements" for="category">Category</label><br>
                <input class = "formElements" id="category" name = "category" type="text" placeholder = "Graphic Design" required /><br>
                
                <label class = "formElements" for="company">Company</label><br>
                <input class = "formElements" id="company" name = "company" type="text" placeholder = "Google Inc." required /><br>
                
                <label class = "formElements" for="location">Job Location</label><br>
                <input class = "formElements" id="location" name = "location" type="text" placeholder = "e.g Kingston, Jamaica" required /><br>
                
               <input id = "button" type= "submit" name = "submit" value = "submit"><br>
               
               <div id = "message"></div>
                
            </form>
        </div>
       
    </body>
    
</html>