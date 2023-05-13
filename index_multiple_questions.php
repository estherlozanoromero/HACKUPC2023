<?php
	require 'functions.php';
	$currentId = getCurrentQuestionId();
	//echo("AAA");
	//echo($currentId);
	$question = getQuestion($currentId);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Current Question</title>
</head>
<body>
	<h1>Current Question</h1>
	<?php 
	if ($question['type'] == 1) {
		displayMultipleChoiceQuestion($question);
	} else if ($question['type'] == 2) {
		displayTrueFalseQuestion($question);
	} else {
		echo "Unknown question type";
	}
	?>

</body>
</html>
