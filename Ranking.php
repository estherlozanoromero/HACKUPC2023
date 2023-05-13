<?php
session_start();
if(!isset($_SESSION['Auth']) || !$_SESSION['Auth'] == "SI"){
	header('Location: ./login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ranking and Timer</title>
  <style>
    /* CSS styles for ranking and timer */
    .ranking {
      float: left;
      width: 50%;
    }
    
    .timer {
      float: right;
      width: 50%;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="ranking">
    <h1>Ranking</h1>
    <ul id="rankingList"></ul>
  </div>
  
  <div class="timer">
    <h1>Timer</h1>
    <p id="timerDisplay">00:10</p>
  </div>

  <script>
    // JavaScript code for timer
    var countdown = 10;
    var timerInterval = setInterval(function() {
      countdown--;
      var timerDisplay = document.getElementById("timerDisplay");
      timerDisplay.innerHTML = "00:" + padZero(countdown);
      
      if (countdown === 0) {
        clearInterval(timerInterval);
        timerDisplay.style.display = "none";
        var button = document.createElement("button");
        button.innerHTML = "Finish";
        button.onclick = function() {
          // Add your logic for the finish button here
          alert("Time's up! Finish button clicked.");
        };
        document.body.appendChild(button);
      }
    }, 1000);

    function padZero(number) {
      return (number < 10 ? "0" : "") + number;
    }

    // JavaScript code for ranking (assuming you retrieve the data from a SQL query)
    var rankingData = [
      { name: "Player 1", score: 100 },
      { name: "Player 2", score: 80 },
      { name: "Player 3", score: 120 },
      { name: "Player 4", score: 90 },
      { name: "Player 5", score: 110 }
    ];

    var rankingList = document.getElementById("rankingList");
    rankingData.sort(function(a, b) {
      return b.score - a.score; // Sort by score in descending order
    });

    for (var i = 0; i < rankingData.length; i++) {
      var listItem = document.createElement("li");
      listItem.innerHTML = rankingData[i].name + " - " + rankingData[i].score;
      rankingList.appendChild(listItem);
    }
  </script>
</body>
</html>



