<?php
$servername = "localhost";
$username = "user";
$password = "user";
$dbname = "user";
$conn = new mysqli($servername, $username, $password, $dbname);
$page_title = "uploading data!";
$image = '<link rel="icon" type="image/x-icon" href="images/miothumbs.gif">';
include 'header.html';

//variable carry
 session_start();
$_REQUEST['submit'];
$name = $_SESSION['name'];
$time_start = $_SESSION['time'];
$mark = $_SESSION['mark'];
$update = $_SESION['update'];
$score = 0;

for($i =0; $i<count($mark); $i++){
 $user_answers[] = $_REQUEST[$i];
}
//decline and accept
if (!empty($name) && !empty($time_start) && !empty($mark) && $update == false){
 $time_end = microtime(true);
 $time = $time_end -$time_start;
 $time = round($time);
 for($i =0; $i<count($mark); $i++){
  if($mark[$i] == $user_answers[$i]){
   if(strval($mark[$i]) == strval($user_answers[$i])){
    $score = $score +1;
   }
  }
 }
 $temp = round($score/count($mark)*100);
 if($temp >= 90 ){
  $new = round($temp*(15*count($mark)/$time));
  if($new > 0){
   $score = $new;
  }
 }
 if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
 }
 $sql = "INSERT INTO results (name, score, time) VALUES (". '\'' .strval($name). '\'' .", $score, $time)";
 if ($conn->query($sql) === TRUE) {
  echo "
  <h1>New record created successfully</h1>
  <p>showing record of: ".$name."</p>". "<p>score: " . $score ."</p><p>Time: " . $time." seconds. </p>";
  $sql = "INSERT INTO results (name, score, time) VALUES (". '\'' .strval($name). '\'' .", $score, $time)";
 } else {
  echo "Error: " . $sql . "<br>" . $conn->error;
 }
 session_unset();
} else {
 $name = null;
 echo "<p>There was an interuption with updating your data to the leaderboards or submiting. <br> <strong> - if you refreshed the page this is a normal occurance to stop spam results. head to the results page to see if your name is on the top 100.</strong> <br> - else go redo the test and if it keeps on happening contact 170406@cloud.rangitoto.school.nz and report the issue of the blockage of submission. any other feedback will be gladly be taken.</p>";
};
echo '<a href="results.php"><p>click here to go to results</p></a>'

?>
  <script src="script.js"></script>
<?php
include 'footer.html';
?>