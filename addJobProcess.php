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
    
    $stmt = $conn->prepare("INSERT INTO jobs(job_title,job_description,category,company_name,company_location,date_posted) 
    VALUES(:title,:jobInfo,:category,:company,:location,:ddate)");
    
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':jobInfo', $jobInfo);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':company', $company);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':ddate', $ddate);
    
    $title = clean_input($_POST['title']);
    $jobInfo = clean_input($_POST['jobInfo']);
    $category = clean_input($_POST['category']);
    $company = clean_input($_POST['company']);
    $location = clean_input($_POST['location']);
    $ddate = date("Y-m-d");
    $stmt->execute();
    echo "<p>New job details successfully added!</p>";
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

