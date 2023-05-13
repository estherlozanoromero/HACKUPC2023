<?php
// Define the correct answer
$correctAnswer = "option1";
session_start();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected answer from the form
    $selectedAnswer = $_POST["answer"];

    // Check if the selected answer is correct
    if ($selectedAnswer === $correctAnswer) {
    	
        $_SESSION['message'] = "Congratulations! Your answer is correct.";
    } else {
        $_SESSION['message']  = "Sorry, your answer is incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Answer Page</title>
</head>
<body>
    <h2>Result:</h2>
    <p><?php echo $_SESSION['message']; ?></p>
</body>
</html>

