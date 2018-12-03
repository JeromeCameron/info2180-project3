<?php
session_start();   
   
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';


$email=$_POST["email"];
$password = password_hash(clean_input($_POST['password']));

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//Why not use on query to pull both the password and email...Less lines

$stmt2 = $conn->prepare('SELECT email FROM users WHERE  email :email');
$email = '%' . filter_input(INPUT_GET, 'email', FILTER_SANITIZE_STRING) . '%'; // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.
$stmt2->bindParam(':email', $email, PDO::PARAM_STR); // <-- Automatically sanitized for SQL by PDO
$stmt2->execute();
//$stmt2 = $conn->query('SELECT email FROM users ');
//$stmt = $conn->query('SELECT password FROM users ');
$stmt = $conn->prepare('SELECT password FROM users WHERE password :password');
$password = '%' . filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING) . '%'; // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.
$stmt->bindParam(':password', $password, PDO::PARAM_STR); // <-- Automatically sanitized for SQL by PDO
$stmt->execute();

$msg = '';
            
            if (!empty($_POST['email'])  && !empty($_POST['password'])) {
				
               if ($_POST['email'] === $stmt2 && $_POST['password'] == $stmt) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $_POST['email'];
                  
                  
                  echo 'You have entered valid use name and password';
                  header("location: index.php");
               }else {
                  echo $msg = 'Wrong username or password';
               }
            }


?>