<?php

//Reuest and sends job detail for a particular job

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$job_id = $_POST['job_id'];
echo $job_id;

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $stmt = $conn->query("SELECT * FROM jobs WHERE id = 3 ");//{$job_id}

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($results as $row) {
        echo '<h1>' . $row['job_title'] . '</h1>';
        echo '<p>' ."Posted " . $row['date_posted'] . '</p>';
        echo '<p>' . $row['category'] . '</p>';
        echo '<h3>' . $row['company_name'] . '</h3>';
        echo '<h3>' . $row['company_location'] . '</h3>';
        echo '<h2>' . "Job Description". '</h2>';
        echo '<p>' . $row['job_description'] . '</p>';
        echo '<p id = "job_id">' . $row['id'] . '</p>';
    }
}

?>

