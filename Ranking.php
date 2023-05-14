<?php
session_start();
if(!isset($_SESSION['Auth']) || !$_SESSION['Auth'] == "SI"){
	header('Location: ./login.php');
}
require_once('db_connection.php');
$country = "Espanya";


        $seat = $_POST["seat"];
	$sql = "SELECT score, username FROM Player ORDER BY score desc";
	$players = array();
	$pos = 1;
	foreach($conn->query($sql) as $row) {
  		array_push($players,array($pos, $row['username'], $row['score']));
  		$pos++;
  		if ($pos >= 11){
  			break;
  		}
	}
	
	$sql = "SELECT id, type_question FROM Question WHERE country = '$country'";
	$result = $conn->query($sql);
	$result = $result->fetch_assoc();
	$id = $result['id'];
	$type = $result['type_question'];                // Iterar sobre los jugadores para mostrarlos en la tabla
	$jugadors = "";
        foreach ($players as $player) {
            $jugadors.= "<tr>";
            
            $jugadors.= "<td>" . $player[0] . "</td>";
            $jugadors.= "<td>" . $player[1] . "</td>";
            $jugadors.= "<td>" . $player[2] . "</td>";
            $jugadors.= "</tr>";
        }
                


?><!DOCTYPE html>
<html>
<head>
    <h1>Ranking of Players</h1>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Position</th>
                    <th>Player&nbsp;&nbsp;</th>
                    <th>Score</th>
                </tr>
                <?php echo $jugadors;?>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        </div>
        <div class="cont">
    <p class="input-group" id = "timer2">Temps fins la següent pregunta:</p>
    <p class="input-group" id = "timer">10</p>
    <button class = "btn" id="redirectButton" style="display: none;">Next Question</button>   
    </div> 
    
    <script>
        // Countdown function
        function startCountdown(duration, display) {
            var timer = duration;
            var countdownInterval = setInterval(function () {
                display.textContent = timer;                if (--timer < 0) {
                    clearInterval(countdownInterval);
                    display.style.display = 'none';
                    document.getElementById('redirectButton').style.display = 'block';
                    display2.style.display = 'none';
                }
            }, 1000);
        }        // Redirect function
        function redirectToURL() {
    // Redirect to a relative URL
    window.location.href = 'index_multiple_questions.php';
}       // Set the countdown duration and start the countdown
        var tenSeconds = 10;
        var display = document.getElementById('timer');
        var display2 = document.getElementById('timer2');
        startCountdown(tenSeconds, display, display2);        // Add a click event listener to the redirect button
        var redirectButton = document.getElementById('redirectButton');
        redirectButton.addEventListener('click', redirectToURL);
    </script>
</body>
</html>
