<?php
  
  session_start();
  
  $host = getenv('IP');
  $username = getenv('C9_USER');
  $password = '';
  $dbname = 'hireme';
  
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
      if(!isset($_SESSION['token']) || $_SESSION['token'] !== $_POST['token']){
          echo "<p>hack detected</p>";
      }else{
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
          
          $stmt = $conn->prepare("INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) 
          VALUES(:firstname,:lastname,:password,:telephone,:email,:ddate)");
          $stmt->bindParam(':firstname', $firstname);
          $stmt->bindParam(':lastname', $lastname);
          $stmt->bindParam(':password', $password);
          $stmt->bindParam(':telephone', $telephone);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':ddate', $ddate);
          
          $firstname = clean_input($_POST['firstname']);
          $lastname = clean_input($_POST['lastname']);
          $password = clean_input($_POST['password']);
          $telephone = clean_input($_POST['telephone']);
          $email = clean_input($_POST['email']);
          $ddate = date("Y-m-d");
          $stmt->execute();
          echo "<p>New user details successfully added!</p>";
      }
    }
  }
  
  function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      
?>