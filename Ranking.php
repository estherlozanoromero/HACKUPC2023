<?php
session_start();
if(!isset($_SESSION['Auth']) || !$_SESSION['Auth'] == "SI"){
	header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ranking Page</title>
</head>
<body>
    <h2>Ranking:</h2>
</body>
</html>

