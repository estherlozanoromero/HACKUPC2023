<?php
session_start();
if(!isset($_SESSION['Auth']) || !$_SESSION['Auth'] == "SI"){
	header('Location: ./login.php');
}
require_once('db_connection.php');
$country = "Espanya";
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
                    <th>Player&nbsp;&nbsp;</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $seat = $_POST["seat"];
    		$sql = "SELECT score, username FROM Player ORDER BY score desc";
    		$players = array();
    		foreach($conn->query($sql) as $row) {
  		array_push($players,array($row['username'], $row['score']));
  		}
  		
  		$sql = "SELECT id, type_question FROM Question WHERE country = '$country'";
  		$result = $conn->query($sql);
  		$result = $result->fetch_assoc();
		$id = $result['id'];
		$type = $result['type_question'];                // Iterar sobre los jugadores para mostrarlos en la tabla
                foreach ($players as $player) {
                    echo "<tr>";
                    echo "<td>" . $player[0] . "</td>";
                    echo "<td>" . $player[1] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
        <div class="cont">
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
                }
            }, 1000);
        }        // Redirect function
        function redirectToURL() {
            // Replace 'https://example.com' with the URL you want to redirect the user to
            window.location.href = 'https://index_multiple_questions.php.com';
        }        // Set the countdown duration and start the countdown
        var tenSeconds = 10;
        var display = document.getElementById('timer');
        startCountdown(tenSeconds, display);        // Add a click event listener to the redirect button
        var redirectButton = document.getElementById('redirectButton');
        redirectButton.addEventListener('click', redirectToURL);
    </script>
</body>
</html>
