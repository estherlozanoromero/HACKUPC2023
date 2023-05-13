<?php
session_start();
if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == "SI"){
header('Location: ./Ranking.php');
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected answer from the form
    $username = $_POST["username"];
    $seat = $_POST["seat"];
	$_SESSION['Auth'] = "Si";
	$_SESSION['username'] = $username;
	$_SESSION['seat'] = $seat;
}
header('Location: ./Ranking.php');
?>



