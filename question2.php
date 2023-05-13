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
            <h4>Choose the correct answer:</h3>
            	<select name="opcion">
            		<input type = "hidden" name="id" value = "1">
    				<option value="opcion1">Opción 1</option>
   				    <option value="opcion2">Opción 2</option>
   				    <option value="opcion3">Opción 3</option>
 			    </select>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>

