<?php
$dsn = 'mysql:host=localhost;dbname=user;';
$user = 'user';
$password = 'user';
$dbh = new PDO($dsn, $user, $password);
$select = $dbh->query("select name, score, time from results ORDER by score DESC, time ASC");
$result = $select->fetchAll(PDO::FETCH_ASSOC);
$db = null;
$page_title = "results";
$image = '<link rel="icon" type="image/x-icon" href="images/results.png">';
include 'header.html';
echo '<table style="padding:10px;">
 <thead>
 <tr>
 <th style="padding: 10px;">Name</th>
 <th style="padding: 10px;">score</th>
 <th style="padding: 10px;">time (seconds)</th>
 </tr>
 </thead>
 <tbody>';
foreach($result as $row){
 echo '<tr><td style="padding-left: 10px; padding-right: 10px;">'.$row['name'].'</td><td style="padding-left: 10px; padding-right: 10px;">' .$row['score'].'</td><td style="padding-left: 10px; padding-right: 10px;">' .$row['time']. '</td>';
}
echo '</tbody></table>';
if ($conn->connect_error) {
 die("Database connection failed: " . $conn->connect_error);
}

include 'footer.html';
?>