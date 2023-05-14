<?php
session_start();
if(!isset($_SESSION['Auth']) || $_SESSION['Auth'] == "No"){
	header('Location: ./login.php');
}

	require 'functions.php';
	require_once('db_connection.php');
	$currentId = getCurrentQuestionId($conn);

	$question = getQuestion($currentId, $conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Current Question</title>
	<link rel"stylesheet" type="text/css" href="questStyle.css">
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
