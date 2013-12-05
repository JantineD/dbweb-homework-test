<?php

	$questions = array(
		"Is red a color?", 
		"Is Green a color?", 
		"Is Blue a color?", 
		"Is Black a color?"
	);
	
	$answers = array(
		"yes",
		"yes",
		"yes",
		"no"
	);
	
	// controleer of er evenveel antwoorden als vragen zijn
	if(count($answers) != count($questions)){
		echo 'Answer and question count is not the same';
		exit();
	}
	
	if($_POST['question'] > 0){
		$question = $_POST['question'];
	}else{
		$question = 0;
	}
	
	echo $questions[$question];
?>
<form action="index.php" method="post" name="form" action="">
  <label><input type="radio" name="answer" value="yes"> Yes</label><br />
  <label><input type="radio" name="answer" value="no"> No</label><br />
  <input name="question" type="hidden" value="<?php echo $question + 1; ?>">
  <?php 
		if(count($questions) == $question){ 
			echo 'There are no further questions';
		}else{
	?>
  <input type="submit" name="submit" value="submit">
  <?php
		}
	?>
>>>>>>> multi
</form>
<?php
	if(isset($_REQUEST['submit'])){
		
		if($_POST['answer'] == $answers[$question - 1]){
			echo "<br /><br />The answer was correct!";
		}else{
			echo "<br /><br />False answer you dumb &^%#!";
		}
				
	}
?>