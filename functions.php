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

	return $row;
}

function displayMultipleChoiceQuestion($question) {

	echo "<div class='question-container'>";
        	echo "<h2>Question:</h2>";
        	echo "<img src='image.jpg' alt='Question Image' width='100%'>";
	
        	echo "<form action='check_answer.php' method='post'>";
        	echo "<h3>Select the correct answer:</h3>";
        	echo "<input type = 'hidden' name='id' value = '1'>";
	
        	echo "<input type='radio' name='answer' value='option1'>";
        	echo "<label for='option1'>Option 1</label><br>";
	
        	echo "<input type='radio' name='answer' value='option2'>";
        	echo "<label for='option2'>Option 2</label><br>";

        	echo "<input type='radio' name='answer' value='option3'>";
        	echo "<label for='option3'>Option 3</label><br>";

        	echo "<input type='radio' name='answer' value='option4'>";
        	echo "<label for='option4'>Option 4</label><br>";

        	echo "<input type='submit' value='Submit'>";
        	echo "</form>";
    	echo "</div>";
}

function displayTrueFalseQuestion($question) {
	echo "<h2>True/False Question</h2>";
	echo "<ul>";
	echo "<li>True</li>";
	echo "<li>False</li>";
	echo "</ul>";
}
?>
