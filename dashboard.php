<?php

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$stmt = $conn->query("SELECT * FROM jobs");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h2>Available Jobs</h2>';
echo '<table>';

echo '<tr>';
echo '<th>'. "Company" . '</th>';
echo '<th>'. "Job Title" . '</th>';
echo '<th>'. "Category" . '</th>';
echo '<th>'. "Date" . '</th>';
echo '</tr>';
foreach ($results as $row) {
  echo '<tr>';
  echo '<td>' . $row['company_name'] . '</td>';
  echo '<td>' . '<a href = "jobDetails.html">' . $row['job_title'] . '</a>' . '</td>';
  echo '<td>' . $row['category'] . '</td>';
  echo '<td>' . $row['date_posted'] . '</td>';
  echo '</tr>';
}

echo'</table>';

//Code for jobs a particular user applied for. Need to set up sessions to pull user ID for where clause

$stmt = $conn->query("SELECT company_name, job_title, category, date_applied FROM jobs JOIN jobsAppliedFor ON jobs.id = jobsAppliedFor.job_id where jobsAppliedFor.user_id = 3");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h2>Jobs Applied For</h2>';
echo '<table>';

echo '<tr>';
echo '<th>'. "Company" . '</th>';
echo '<th>'. "Job Title" . '</th>';
echo '<th>'. "Category" . '</th>';
echo '<th>'. "Date" . '</th>';
echo '</tr>';
foreach ($results as $row) {
  echo '<tr>';
  echo '<td>' . $row['company_name'] . '</td>';
  echo '<td>' . '<a href = "jobDetails.html">' . $row['job_title'] . '</a>' . '</td>';
  echo '<td>' . $row['category'] . '</td>';
  echo '<td>' . $row['date_applied'] . '</td>';
  echo '</tr>';
}

echo'</table>';

?>