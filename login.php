<?php

 
session_start();   
   
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$login = $_POST['login'];
$email = $_POST['email'];
$Userpassword = $_POST['password'];

if(isset($login)){
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if(!$email=="" || !$Userpassword == ""){


//Why not use on query to pull both the password and email...Less lines

$stmt2 = $conn->prepare('SELECT * FROM users WHERE email= :email');

$email = '%' . filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) . '%'; // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.
$stmt2->bindParam(':email', $email, PDO::PARAM_STR); // <-- Automatically sanitized for SQL by PDO
$stmt2->execute();
$row = $stmt2->fetch();

if ( password_needs_rehash ( $row[2], PASSWORD_DEFAULT ) ) {
     $newHash = password_hash( $row[2], PASSWORD_DEFAULT );
     // UPDATE the user's row in `log_user` to store $newHash 
    $link = mysql_connect( $hostname , $username , $password ) or 
        die("Prosoxi!Provlima stin sundesi me ton server : " . mysql_error());
mysql_select_db($database,$link);

$stmt=mysql_query("UPDATE users  SET password = '".mysql_real_escape_string($newHash)."'WHERE email ='".mysql_real_escape_string($email)."'");
$row =$stmt;


mysql_close($link);
     
   }

$valid =password_verify ( $Userpassword, $row[2] );
 if ( $valid ) {
  $_SESSION["username"]=$email;
  $_SESSION["password"]=$Userpassword;
   /*if ( password_needs_rehash ( $password, PASSWORD_DEFAULT ) ) {
     $newHash = password_hash( $Userpassword, PASSWORD_DEFAULT );
     // UPDATE the user's row in `log_user` to store $newHash 
     $stmt = $conn ->query("INSERT INTO 'users'('password') VALUES (':newHash')");
     $stmt->bindParam(':newHash', $newHash);
     $stmt->execute();
   }
    log the user in, have fun! */
   $query =  $conn->prepare("SELECT id FROM users WHERE email= :email");
   $query->bindParam(':email', $email, PDO::PARAM_STR);
   $query->execute();
   $answer= $query->fetchAll(PDO::FETCH_ASSOC);
   $_SESSION["UserID"] = $answer['id'];
   
   console.log(" Login Success!");
   header("Location:dashboard.html");
 }
 else {
  /* tell the would-be user the username/password combo is invalid */
  
  header("Location:home.php");
  
 }
}}else{
 echo "Something is Wrong";
}
            

// $stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
// $stmt->execute(array($email,$Userpassword));
// $results = $stmt->fetch(PDO::FETCH_BOTH);
// if($stmt->rowCount() == 1){
//   echo "login";
// }

?>