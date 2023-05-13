<?php
session_start();
if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == "SI"){
header('Location: ./Ranking.php');
}
else{
header('Location: ./login.php');
}
?>
