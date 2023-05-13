<!DOCTYPE html>
<html>
<head>
    <title>Current Question</title>
    <style>
        /* Define styles for responsiveness */
        @media (max-width: 600px) {
            /* Styles for smaller devices */
            .question-container {
                width: 90%;
            }
        }

        @media (min-width: 601px) {
            /* Styles for larger devices */
            .question-container {
                width: 60%;
            }
        }
    </style>
</head>
<body>
    <?php
        // Connect to the database
        $db = new PDO('mysql:host=localhost;dbname=hack11;charset=utf8', 'user', 'password');

        // Retrieve the current question ID from the current_question table
        $stmt = $db->query('SELECT question_id FROM current_question WHERE id = 1');
        $currentQuestionId = $stmt->fetch(PDO::FETCH_COLUMN);

        // Retrieve the question text for the current question ID from the questions table
        $stmt = $db->prepare('SELECT content FROM questions WHERE id = :questionId');
        $stmt->bindValue(':questionId', $currentQuestionId, PDO::PARAM_INT);
        $stmt->execute();
        $questionText = $stmt->fetch(PDO::FETCH_COLUMN);

        // Display the question text
        echo '<h1>' . $questionText . '</h1>';
    ?>
</body>
</html>
