<?php
function getCurrentQuestionId($conn) {

	$sql = "SELECT question_id FROM current_question1 WHERE id = 1";
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();
	$currentQuestionId = $result['question_id'];


	return $currentQuestionId;
	
}

function getQuestion($id, $conn) {
	// code to retrieve question from database based on $id
	
	$sql = "SELECT * FROM Question WHERE id = $id";
	
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();
	
	return $result;

}

function getAnswer($id, $conn){

	
	$sql = "SELECT answer FROM Answer WHERE id = $id";
	
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();
	
	return $result;
}

function getRestAnswer($id, $category, $conn){
	$sql = "SELECT answer, id FROM Answer WHERE id != $id AND category = $category";
	
	$arr = array();

    	foreach($conn->query($sql) as $row) {

  		array_push($arr, array($row['answer'], $row['id']));
  	}

	shuffle($arr);

	$arr = array_slice( $arr, 0, 3);
	
	return $arr;

}

function displayMultipleChoiceQuestion($question, $conn) {
	$answer = getAnswer($question['id_correct_answer'], $conn);
	$arr = array($answer['answer'], $question['id_correct_answer']);
	echo $arr[0];
	echo $array;
    	$other_answer = getRestAnswer($question['id_correct_answer'], $question['category'], $conn);
    	
    	//echo $answer['answer'];
    	
    	//foreach($ohter_answer as $row){
    	array_push($other_answer, $arr);
 	
    	
    	
    	shuffle($other_answer);

	echo "<div class='question-container'>";
		echo "<h1>" . $question['country'] . "</h1>";
        	echo "<h2>" . $question['question'] . ":</h2>";
        	echo "<img src='image.jpg' alt='Question Image' width='100%'>";
	
        	echo "<form action='check_answer.php' method='post'>";
        	echo "<h3>Select the correct answer:</h3>";
        	echo "<input type = 'hidden' name='id' value = '" . $question['id_correct_answer'] . " '>";
        	echo $other_answer[0][1];
	
        	echo "<input type='radio' name='answer' value='".$other_answer[0][1]."'>";
        	echo "<label for='option1'>". $other_answer[0][0] ."</label><br>";
	
        	echo "<input type='radio' name='answer' value='".$other_answer[1][1]."'>";
        	echo "<label for='option2'>". $other_answer[1][0] ."</label><br>";

        	echo "<input type='radio' name='answer' value='".$other_answer[2][1]."'>";
        	echo "<label for='option3'>". $other_answer[2][0] ."</label><br>";

        	echo "<input type='radio' name='answer' value='".$other_answer[3][1]."'>";
        	echo "<label for='option4'>". $other_answer[3][0] ."</label><br>";

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
