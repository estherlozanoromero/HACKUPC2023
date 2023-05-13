<?php


function getCurrentQuestionId() {
	// code to retrieve current question ID from database
	$db = new PDO('mysql:host=localhost;dbname=hack11;charset=utf8', 'user', 'password');

	$stmt = $db->query('SELECT question_id FROM current_question WHERE id = 1');
        $currentQuestionId = $stmt->fetch(PDO::FETCH_COLUMN);
	//echo($currentQuestionId);

	return $currentQuestionId;
	
}

function getQuestion($id) {
	// code to retrieve question from database based on $id
	echo($id);
	$db = new PDO('mysql:host=localhost;dbname=hack11;charset=utf8', 'user', 'password');
	
	$sql = "SELECT * FROM questions WHERE id = $id";
	//$sql->bindValue(':questionId', $id, PDO::PARAM_INT);
	echo($sql);
	$stmt = $db->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);	
        print_r($row);
        //$question = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
	
        //echo($question);
	//return [
	//	'text' => 'What is the capital of France?',
	//	'type' => 'multiple_choice',
	//	'options' => [
	//		'A' => 'Paris',
	//		'B' => 'London',
	//		'C' => 'New York',
	//		'D' => 'Tokyo'
	//	],
	//	'correct_answer' => 'A'
	//];
}

function displayMultipleChoiceQuestion($question) {
	echo "<h2>Multiple Choice Question</h2>";
	echo "<ul>";
	//foreach ($question['options'] as $option => $text) {
	//	echo "<li>$option. $text</li>";
	//}
	echo "</ul>";
}

function displayTrueFalseQuestion($question) {
	echo "<h2>True/False Question</h2>";
	echo "<ul>";
	echo "<li>True</li>";
	echo "<li>False</li>";
	echo "</ul>";
}
?>
