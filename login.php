<?php
session_start();
if(isset($_SESSION['Auth']) && $_SESSION['Auth'] == "SI"){
	header('Location: ./Ranking.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <h1>Vueling Adventures</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <form method="POST" action="login_res.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="seat">Seat location</label>
                <input type="text" id="seat" name="seat" required>
            </div>
            <div class="input-group">
                <input type="submit" class="btn" value="Login">
            </div>
        </form>
    </div>
</body>
</html>

