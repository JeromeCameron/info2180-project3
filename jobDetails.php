<?php

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt = $conn->query("SELECT * FROM jobs WHERE id = 1 ");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) {
    echo '<h1>' . $row['job_title'] . '</h1>';
    echo '<p>' . $row['date_posted'] . '</p>';
    echo '<p>' . $row['category'] . '</p>';
    echo '<h3>' . $row['company_name'] . '</h3>';
    echo '<h3>' . $row['company_location'] . '</h3>';
    echo '<h2>' . "Job Description". '</h2>';
    echo '<p>' . $row['job_description'] . '</p>';
}
?>