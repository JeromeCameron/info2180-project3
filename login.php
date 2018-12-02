<?php
ob_start();
   session_start();
   
   $host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt2 = $conn->prepare('SELECT email,password FROM users WHERE name LIKE :country');
$country = '%' . filter_input(INPUT_GET, 'country', FILTER_SANITIZE_STRING) . '%'; // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.
$stmt2->bindParam(':country', $country, PDO::PARAM_STR); // <-- Automatically sanitized for SQL by PDO
$stmt2->execute();
$results2 = $stmt2;

$msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'tutorialspoint' && 
                  $_POST['password'] == '1234') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  
                  echo 'You have entered valid use name and password';
               }else {
                  $msg = 'Wrong username or password';
               }
            }


?>