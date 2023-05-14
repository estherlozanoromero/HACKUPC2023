<?php
// Connect to your database
// You'll need to modify this code to fit your specific database schema
require_once('db_connection.php');

// Get the selected question ID from the command-line arguments
$questionId = $argv[1];

// Update the current question for all users
$sql = "UPDATE current_question1 SET question_id = ".intval($questionId)." WHERE id = 1";

$conn->query($sql);

// Exit the script
exit(0);
?>
