
<?php

session_start();
require_once('db_connection.php');


// Check if the form is submitted

var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected answer from the form
  $selectedAnswer = $_POST["answer"];
    $correctAnswer = $_POST["id"];
    echo "primera: " . $selectedAnswer;
    echo "<br>segona: " . $correctAnswer;
    

    // Check if the selected answer is correct
    if ($selectedAnswer == $correctAnswer) {
        $_SESSION['message'] = "Congratulations! Your answer is correct.";
        echo $_SESSION['seat'];
        $sql = "UPDATE Player SET score = (score + 1) WHERE seat = ". intval($_SESSION['seat']);
	$result = $conn->query($sql);

    } else {
    	
        $_SESSION['message']  = "Sorry, your answer is incorrect.";
    }
}


//header('Location: ./Ranking.php');
exit();
?>
