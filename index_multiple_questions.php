<?php
	require 'functions.php';
	require_once('db_connection.php');
	$currentId = getCurrentQuestionId($conn);
	//echo($conn);
	//echo($currentId);
	$question = getQuestion($currentId, $conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Current Question</title>
</head>
<body>
	<h1>Current Question</h1>
	<?php 
	if ($question['type_question'] == 1) {
		displayMultipleChoiceQuestion($question, $conn);
	} else if ($question['type_question'] == 2) {
		displayTrueFalseQuestion($question);
	} else {
		echo "Unknown question type";
	}
	?>

</body>
</html>
