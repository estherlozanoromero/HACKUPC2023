<?php
session_start();
if(!isset($_SESSION['Auth']) || !$_SESSION['Auth'] == "SI"){
	header('Location: ./login.php');
}
?>


<!DOCTYPE html>

<html>
<head>
    <title>Question Page</title>
    <style>
        /* Define styles for responsiveness */
        @media (max-width: 600px) {
            /* Styles for smaller devices */
            .question-container {
                width: 90%;
            }
        }

        @media (min-width: 601px) {
            /* Styles for larger devices */
            .question-container {
                width: 60%;
            }
        }
    </style>
</head>
<body>
    <div class="question-container">
        <h2>Question:</h2>
        <img src="image.jpg" alt="Question Image" width="100%">

        <form action="check_answer.php" method="post">
            <h3>Select the correct answer:</h3>

            <input type="radio" name="answer" value="option1">
            <label for="option1">Option 1</label><br>

            <input type="radio" name="answer" value="option2">
            <label for="option2">Option 2</label><br>

            <input type="radio" name="answer" value="option3">
            <label for="option3">Option 3</label><br>

            <input type="radio" name="answer" value="option4">
            <label for="option4">Option 4</label><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

