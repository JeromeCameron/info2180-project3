<?php
ob_start();
   session_start();

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
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

?>