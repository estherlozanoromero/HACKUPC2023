<?php
session_start();
if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == "SI"){
	header('Location: ./Ranking.php');
}
echo "pre require<br>";
require_once('db_connection.php');
echo "post require<br>";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	echo "entrem post<br>";
    // Get the selected answer from the form
    $username = $_POST["username"];
    $seat = $_POST["seat"];
    $sql = "SELECT seat, username FROM Player WHERE seat = '$seat'";
	$result = $conn->query($sql);
	echo "Primera consulta<br>";
	
	if ($result->num_rows > 0) {
	echo "Hi ha files <br>";
  	// output data of each row
  	if ($result['username'] == $username){
  		$_SESSION['Auth'] = "Si";
		$_SESSION['username'] = $username;
		$_SESSION['seat'] = $seat;
  	}
  	else{
  		$_SESSION['Auth'] = "No";
  		$_SESSION['error'] = "Wrong username";
  	}
	} 	
	
	else {
  		$_SESSION['Auth'] = "Si";
		$_SESSION['username'] = $username;
		$_SESSION['seat'] = $seat;
		$sql2 = "INSERT INTO Player (seat, username)VALUES ($seat, $username); ";
		$result2 = $conn->query($sql2);
		
	}

}
mysqli_close($conn);
header('Location: ./Ranking.php');
exit();
?>



