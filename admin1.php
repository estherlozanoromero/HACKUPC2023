<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        <h1>Select a question to display:</h1>
        <?php
        // Connect to your database and retrieve the list of questions
        // You'll need to modify this code to fit your specific database schema
        $db = new PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $stmt = $db->query('SELECT id, question FROM questions');
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display a dropdown list of the available questions
        echo '<form method="POST" action="update_question.php">';
        echo '<select name="question_id">';
        foreach ($questions as $question) {
            echo '<option value="' . $question['id'] . '">' . $question['question'] . '</option>';
        }
        echo '</select>';
        echo '<input type="submit" value="Select">';
        echo '</form>';
        ?>
    </body>
</html>
