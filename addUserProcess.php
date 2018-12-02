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
          
          switch(true){
            
            case (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}/", $password)):
              echo "<p>Password is not valid!</p>"; //error message sent to form
              break;
              
            case (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $telephone)):
              echo "<p>Telephone # is not valid! Format must be for eg 876-555-7896</p>"; //error message sent to form
              break;
            
            case (!filter_var($email, FILTER_VALIDATE_EMAIL)):
              echo "<p>Email is not valid!</p>"; //error message sent to form
              break;
            
            default:
              $password = password_hash(clean_input($_POST['password']),PASSWORD_DEFAULT);
              $stmt->execute();
              echo "<p>New user details successfully added!</p>"; //success message sent to form 
          }
  
    }
  }
  
  //santitize all data inputs from form
  function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      
?>