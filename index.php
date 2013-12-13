<?php
	ob_start();
	// start session
	session_start();
	
	include 'config.php';
	error_reporting(-1);
	ini_set("display_errors", 1);
	
	//set cookie
	if(isset($_COOKIE['time'])) {
		$_SESSION['question'] = $_COOKIE['time'];
		$question = $_SESSION['question'];
	} else {
		setcookie("time", 1, time() + 604800);
		$_COOKIE['time'] = 1;
	}
	//Check if session is set
	if(isset($_SESSION['question']) && $_SESSION['question'] > 0){
		//$question = $_SESSION['question'] + 1;
		$cookje = $_COOKIE['time'] + 1;
		$question++;
		echo $question;
	}else{
		$question = 1; // default start question
		//setcookie('question', $question, time()+604800);
		$_SESSION['question'] = $question - 1;
	}
	
	if(isset($_POST['submit'])){
		
		setcookie('time', $cookje, time()+604800);
		
		if($_POST['answer'] == '1'){
			echo "The answer was correct!<br /><br />";
			if(isset($_SESSION['correctanwers'])) {
				$_SESSION['correctanwers']++; 
				$question = $_SESSION['question'] + 1;
				
			}else{
				$_SESSION['correctanwers'] = 1; 
			}
		}else{
			echo "False answer...<br /><br />";
		}
				
	}
	
	
	
	
	
	
	
	
	
	
	
	
	if($question == mysql_num_rows(mysql_query("SELECT * FROM question")) + 1){ 
		echo 'There are no further questions<br />';
		echo 'You have answered : ';
		if(isset($_SESSION['correctanwers'])) {
			echo ($_SESSION['correctanwers']);
		} else {
			echo '0';
		}
		echo ' of ' . ($question - 1) . ' correctly.';
		setcookie('time', '1', time());	
		$_SESSION['question'] = 1;
		$_SESSION['correctanwers'] = 0;
		exit();	
	}
?>
<form action="index.php" method="post" name="form" action="">
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