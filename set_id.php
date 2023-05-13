<?php
// Connect to your database
// You'll need to modify this code to fit your specific database schema
$db = new PDO('mysql:host=localhost;dbname=hack11', 'user', 'password');

// Get the selected question ID from the command-line arguments
$questionId = $argv[1];

// Update the current question for all users
$stmt = $db->prepare('UPDATE current_question SET question_id = :questionId');
$stmt->bindValue(':questionId', $questionId, PDO::PARAM_INT);
$stmt->execute();

// Exit the script
exit(0);
?>
