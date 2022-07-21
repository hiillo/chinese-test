<?php
$page_title = "START THE TEST!";
$image = '<link rel="icon" type="image/x-icon" href="images/question-intro.png">';
include 'header.html';
?>
<h1> WELCOME! This is the start of a new test.</h1>
<p1>Test your skills and compete for the highest scores. <br> The test matters on your speed and accuracy of your knowledge. <br> have fun and try and get to the top of the leader boards!</p1>
<form action="questions.php" method="post">
 <fieldset><legend>ENTER YOUR NAME:</legend>
  <p><label>Name: <input type="text" name="name" size="20" maxlength="20"></label></p>
  <p><input type="submit" name="submit" value="Start the Test ^-^"></p>
 </fieldset>
</form>


<?php
include 'footer.html';
?>