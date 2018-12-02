<?php

session_start();

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $stmt = $conn->prepare("INSERT INTO jobsAppliedFor(job_id,user_id,date_applied) 
    VALUES(:job_id,:user_id,:ddate)");
    $stmt->bindParam(':job_id', $job_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':ddate', $ddate);
    
    $title = $_POST['job_id'];
    $jobInfo = $_SESSION['user_id'];
    $ddate = date("Y-m-d");
    
    $stmt->execute();
    
    echo "<p>Job application successfully added!</p>";
    
}

?>