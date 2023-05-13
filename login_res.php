<?php
session_start();
if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == "SI"){
	header('Location: ./Ranking.php');
}

require_once('db_connection.php');


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected answer from the form
    $username = $_POST["username"];
    
    $seat = $_POST["seat"];
    $sql = "SELECT seat, username FROM Player WHERE seat = '$seat'";
	$result = $conn->query($sql);

	
	if ($result->num_rows > 0) {
  	// output data of each row
  	$result = $result->fetch_assoc();
  	if ($result['username'] == $username){
  		$_SESSION['Auth'] = "Si";
		$_SESSION['username'] = $username;
		$_SESSION['seat'] = $seat;
  	}
  	else{
  		$_SESSION['Auth'] = "No";
  		$_SESSION['error'] = "Wrong username";
  		mysqli_close($conn);
  		header('Location: ./login.php');
  		exit();
  	}
	} 	
	else {
  		$_SESSION['Auth'] = "Si";
		$_SESSION['username'] = $username;
		$_SESSION['seat'] = $seat;
		$sql2 = "INSERT INTO Player (seat, username, score, time, total_ans, total_correct) VALUES (" . intval($seat) . ", '$username', 0, null, 0, 0)";
		$result2 = $conn->query($sql2);
		
	}

}
mysqli_close($conn);
//header('Location: ./Ranking.php');
exit();
?>



