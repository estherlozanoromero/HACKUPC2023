 <?php
$servername = "localhost";
$username = "example_user";
$password = "password";
$dbname = "VuelingQuizz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
/*
$sql = "SELECT content FROM todo_list";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["content"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();*/
?> 






