<?php
session_start();
if(!session_is_registered(myusername)){
header("location:main_login.php");
}
ob_start();
	
	include 'config.php';
	error_reporting(-1);
	ini_set("display_errors", 1);
	
	if(isset($_COOKIE['question']) && $_COOKIE['question'] > 0){
		$question = $_COOKIE['question'] + 1;
	}else{
		$question = 1; // default start question
		setcookie('question', $question, time()+604800);
	}
	
	if(isset($_POST['submit'])){
		
		setcookie('question', $question, time()+604800);
		
		if($_POST['answer'] == '1'){
			echo "The answer was correct!<br /><br />";
			if(isset($_COOKIE['correctanwers'])) {
				setcookie('correctanwers', $_COOKIE['correctanwers'] + 1, time()+604800); 
			}else{
				setcookie('correctanwers', 1, time()+604800); 
			}
		}else{
			echo "False answer...<br /><br />";
		}
				
	}
	
	if($question == mysql_num_rows(mysql_query("SELECT * FROM question")) + 1){ 
		echo 'There are no further questions<br />';
		echo 'You have answered : ';
		if(isset($_COOKIE['correctanwers'])) {
			echo ($_COOKIE['correctanwers']);
		} else {
			echo '0';
		}
		echo ' of ' . ($question - 1) . ' correctly.';
		setcookie('question', '1', time());	
		setcookie('correctanwers', '0', time());	
		exit();	
	}
?>
<html>
<body>
Login successfully, now awnser some questions!
<a href="logout.php">Logout</a>
<form method="post" name="form" action=""<? $_SERVER['PHP_SELF'] ?>"">
  <?php
	
		echo mysql_result(mysql_query("SELECT Q_TEXT FROM question WHERE Q_NUMBER = '".$question."' LIMIT 1"), 0);
		echo '<br /><br />';
		
		$dbres = mysql_query("SELECT * FROM choice WHERE Q_NUMBER = '".$question."'");
		if(!$dbres){
			echo 'Could not run query: ' . mysql_error();
			exit;
		}
		while($row = mysql_fetch_assoc($dbres)){
			echo '<label><input type="radio" name="answer" value="'.$row['CORRECT'].'"> '.$row['C_TEXT'].'</label><br />';
		}
	?>
  <input name="question" type="hidden" value="<?php echo $question; ?>">
  <input type="submit" name="submit" value="submit">
</form>
</body>
</html>