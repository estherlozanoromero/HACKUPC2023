
<?php
//background image of plane
session_start();
if(!isset($_SESSION['Auth']) || $_SESSION['Auth'] == "No"){
	header('Location: ./login.php');
}
require_once('db_connection.php');


// Check if the form is submitted


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected answer from the form
    $selectedAnswer = $_POST["answer"];
    $correctAnswer = $_POST["id"];


    // Check if the selected answer is correct
    if ($selectedAnswer == $correctAnswer) {
        $_SESSION['message'] = "Congratulations! Your answer is correct.";

        $sql1 = "UPDATE Player SET score = (score + 1) WHERE seat = ". intval($_SESSION['seat']);
	$result1 = $conn->query($sql1);
	
	
	

    } else {
    	
        $_SESSION['message']  = "Sorry, your answer is incorrect.";
    }
    $sql2 = "UPDATE Player SET total_ans = (total_ans + 1) WHERE seat = ". intval($_SESSION['seat']);
	$result2 = $conn->query($sql2);
}


echo "<script type='text/javascript'>";
echo "alert('" . $_SESSION['message'] . "', 'Result');";
echo "window.location.href = './Ranking.php';";
echo "</script>";
exit();
?>
