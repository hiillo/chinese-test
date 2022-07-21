<?php
$dsn = 'mysql:host=localhost;dbname=user;';
$user = 'user';
$password = 'user';
$dbh = new PDO($dsn, $user, $password);
$select = $dbh->query("select * from questions");
$result = $select->fetchAll(PDO::FETCH_ASSOC);
$db = null;
$page_title = "questions";
$image = '<link rel="icon" type="image/x-icon" href="images/questions.jpg">';
include 'header.html';

//variable carry
 session_start();
$name = $_REQUEST['name'];
$_REQUEST['submit'];
$_SESSION['name'] = $name;

//decline and accept
if (!empty($_REQUEST['name'])){
 echo "<p> Your name is: <strong>$name</strong></p>";
 echo "<p></p>";
$count = 0;
foreach($result as $row){
  $sub = [$row[q], $row[q1], $row[q2], $row[q3], $row[a]];
  $array[] = [$sub, 0];
  $temp = 0;
  /*
  //array testing
  while($temp <6){
   echo $array[$count][0][$temp] . "<br>";
   $temp = $temp+1;
  }
  */
  $count = $count + 1;
}

function check($array, $count){
 $count1 = 0;
 for($i = 0; $i<$count; $i++){
  if($array[$i][1] > 0){
   $count1 = $count1 + 1;
  }
 }
 if($count1 >= $count){
  return true;
 }else{return false;}
}

function create($input, $count){
 $temp = [0, 0, 0, 0];
 $temp2 = [0, 0, 0, 0];
 $question = $input[0];
 $wrong1 = $input[1];
 $wrong2 = $input[2];
 $wrong3 = $input[3];
 $answer = $input[4];
 //asign the positions
 
 for($i = 0; $i<4; $i++){
  $bool = false;
  while($bool !=true){
   $random = rand(0,3);
   if($temp[$random] == 0){
    if($i == 3){
     $temp[$random] = 1;
     $temp2[$random] = $input[$i+1];
     echo '<fieldset><legend>'.$question.'</legend>';
     for($ia=0; $ia<4; $ia++){
      echo '<input type="button" value="'.$temp2[$ia].'">';
     }echo '</fieldset>';
     $bool = true;
     return $random;
    }else{
     $temp[$random] = 1;
     $temp2[$random] =$input[$i+1];
     $bool = true;
    }
   }
  }
 }
}

echo '<form id="form" action="finish.php" method="post">';
$counting = 0;
for($i = 0; $i<$count; $i++){
 while(check($array, $count) !=true){
  $random = rand(0, $count-1);
  if($array[$random][1] == 0){
   $answers[] = create($array[$random][0], $counting);
   $counting = $counting + 1;
   $array[$random][1] = 1;
  }
 }
}
echo "<br>";

echo'<input type="submit" name="submit" value="FINISH TEST!, (CANNOT GO BACK TO CHANGE ANSWERS)"></form><br>';

$time_start = microtime(true);
$_SESSION['time'] = $time_start;
$_SESSION['mark'] = $answers;
$_SESSION['update'] = false;
$answers;

} else {
 $name = null;
 echo '<p> you forgot yor name! <strong><a href="question-intro.php">click here<a></strong> to go back.<p>';
};

// GLOBAL VARS
//$array
//------------------------------reduce chunk of comments----------------------------------------
//----THE FOLLOWING DID NOT WORK, dont know how to wait for response (EDIT: can do it (i think) but everytime page loads takes forever)---
/*$count2 = 0;

function check($array, $count){
 $count1 = 0;
 for($i = 0; $i<$count; $i++){
  if($array[$i][1] > 1){
   $count1 = $count1 + 1;
   echo "<div>" . $i . " has been answered amount answered: ". $count1. "/" . $count . "</div>";
  }
 }
 if($count1 >= $count){
  echo "<div>the user has answered all questions</div>";
  return true;
 }else{return false;}
}
function display(&$input, &$count){
 $temp = [0, 0, 0, 0];
 $question = $input[0][0];
 $wrong1 = $input[0][1];
 $wrong2 = $input[0][2];
 $wrong3 = $input[0][3];
 $answer = $input[0][4];
 //asign the positions
 $temp[rand(0, 3)] = $wrong1;
 $temp1 = false;
 while($temp1 != true){if($temp[rand(0, 3)] == 0){
  $temp[rand(0, 3)] = $wrong2;
  $temp1 = true;
 }}
 $temp1 = false;
 while($temp1 != true){if($temp[rand(0, 3)] == 0){
  $temp[rand(0, 3)] = $wrong3;
  $temp1 = true;
 }}
 $temp1 = false;
 while($temp1 != true){if($temp[rand(0, 3)] == 0){
  $temp[rand(0, 3)] = $answer;
  $temp1 = true;
 }}
 
 //combine:
 echo '
  <form action="questions.php" method="post">
   <fieldset><legend>'.$question.'</legend>
    <input type="submit" name="4" value="'.$wrong1.'">
    <input type="submit" name="3" value="'.$wrong2.'">
    <input type="submit" name="2" value="'.$wrong3.'">
    <input type="submit" name="1" value="'.$answer.'">
    <input type="hidden" name="thingy" value="'.$count2.'">
    <input type="hidden" name="response" value ="1">
   </fieldset>
  </form>';
}

while(check($array, $count) != true){
 
 $random = rand(0, $count-1);
 if($array[$random][1] > 1){echo $random ." has been answered. <br>";}
 else{
  $count2 = $count2 + 1;
  display($array[$random], $count2);
  $response = false;
  while($respone == false){
   if ($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['response']==1){
     $count = $count +1;
     $array[$random][1] = $array[$random][1]+2;
     $respone == true;
    }
    else{$array[$random][1]+1; $respone == true;}
   }
  }
 }
 echo $array[$random][1];
}*/


if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}
?>
  <script src="script.js"></script>
<?php
include 'footer.html';
?>