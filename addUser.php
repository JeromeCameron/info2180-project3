<?php

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt = $conn->prepare("INSERT INTO users(firstname,lastname,password,telephone,email,date_joined) 
VALUES(:firstname,:lastname,:password,:telephone,:email,:ddate)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':telephone', $telephone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':ddate', $ddate);


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$ddate = date("Y-m-d");
$stmt->execute();

?>