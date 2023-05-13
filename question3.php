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
        <h3>Do the Question?</h3>
		
        <form action="check_answer.php" method="post">
       		<p>True or false</p>
       			<input type = "hidden" name="id" value = "1">
  				<input type="radio" name="acuerdo" value="true"> True
  				<input type="radio" name="acuerdo" value="false"> False
  				<input type="submit" value="Enviar">
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
