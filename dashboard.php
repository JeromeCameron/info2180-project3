<?php
//pulls jobs from database

session_start();

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'hireme';
$new = "New";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$stmt = $conn->query("SELECT * FROM jobs ORDER BY date_posted DESC LIMIT 5");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


echo '<h2>Available Jobs</h2>';
echo '<table id = "availableJobs">';
//Column headers
echo '<tr>';
echo '<th>'. "Company" . '</th>';
echo '<th>'. "Job Title" . '</th>';
echo '<th>'. "Category" . '</th>';
echo '<th>'. "Date" . '</th>';
echo '<th></th>';
echo '</tr>';

//prints out top 5 most recent jobs
foreach ($results as $row) {
 
    echo '<tr>';
    echo '<td>' . $row['company_name'] . '</td>';
    echo '<td>' . '<a class = "job" href = "" id =' . $row['id'] . '>' . $row['job_title'] . '</a>' . '</td>';
    echo '<td>' . $row['category'] . '</td>';
    echo '<td>' . $row['date_posted'] . '</td>';
    
    $date = $row['date_posted'];
    list($year,$month,$day) = explode('-',$date);
    $stmt2 = $conn->query("SELECT * FROM jobs WHERE EXISTS(SELECT * FROM jobsAppliedFor WHERE job_id = {$row['id']})");
    $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    
    
    if((date('d')-$day === 0 && date('Y')-$year === 0 && date('m')-$month === 0) && $stmt2->rowCount() === 0){
      echo '<td class = "show" ><mark>'.$new.'</mark></td>';
    }else{
      echo '<td class = "hide" ></td>';
    }
    
    echo '</tr>';
  
}

echo'</table>';

//Code for jobs a particular user applied for. Need to set up sessions to pull user ID for where clause

$stmt = $conn->query("SELECT jobs.id, company_name, job_title, category, date_applied FROM jobs JOIN jobsAppliedFor ON jobs.id = jobsAppliedFor.job_id where jobsAppliedFor.user_id =1"); //$_SESSION['UserID']

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h2>Jobs Applied For</h2>';
echo '<table id = "appliedJobs">';

echo '<tr>';
echo '<th>'. "Company" . '</th>';
echo '<th>'. "Job Title" . '</th>';
echo '<th>'. "Category" . '</th>';
echo '<th>'. "Date" . '</th>';
echo '<th></th>';
echo '</tr>';

foreach ($results as $row) {
  echo '<tr>';
  echo '<td>' . $row['company_name'] . '</td>';
  echo '<td>' . '<a class = "job" href = "jobDetails.html" target="iframe_a" id =' . $row['id'] . '>' . $row['job_title'] . '</a>' . '</td>';
  echo '<td>' . $row['category'] . '</td>';
  echo '<td>' . $row['date_applied'] . '</td>';
  echo '<td></td>';
  echo '</tr>';
}

echo'</table>';


//--------------------------------------------------------------------------------------------------------------------------------------------------------------

?>

