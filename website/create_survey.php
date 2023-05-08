<?php
// Include the connection file and any other necessary dependencies
require_once("lib/connection.php");

// Check if the form is submitted
if (isset($_POST["btn_submit"])) {
    // Retrieve the form data
    $code = $_POST["code"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $startDateTime = $_POST["start_datetime"];
    $endDateTime = $_POST["end_datetime"];

    // Validate the form data (perform any necessary validation checks)

    // Create an array to hold the questions
    $questions = [];

    // Retrieve the question data from the form
    $questionCount = $_POST["question_count"];
    for ($i = 1; $i <= $questionCount; $i++) {
        $questionName = $_POST["question_name_" . $i];
        $questionDescription = $_POST["question_description_" . $i];
        $questionType = $_POST["question_type_" . $i];

        // Validate the question data (perform any necessary validation checks)

        // Add the question to the questions array
        $questions[] = [
            "name" => $questionName,
            "description" => $questionDescription,
            "type" => $questionType
        ];
    }

    // Call the create_survey function passing the form data
    create_survey($conn, $code, $name, $description, $startDateTime, $endDateTime, $questions);
}

function create_survey($conn, $code, $name, $description, $startDateTime, $endDateTime, $questions)
{
    // Insert survey details into the database
    $stmt = $conn->prepare("INSERT INTO surveys (code, name, description, start_datetime, end_datetime) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$code, $name, $description, $startDateTime, $endDateTime]);

    // Get the ID of the newly inserted survey
    $surveyId = $conn->lastInsertId();

    // Insert questions into the database
    foreach ($questions as $position => $question) {
        $questionName = $question['name'];
        $questionDescription = $question['description'];
        $questionType = $question['type'];

        // Execute SQL query to insert the question
        $stmt = $conn->prepare("INSERT INTO questions (survey_id, name, description, type, position) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$surveyId, $questionName, $questionDescription, $questionType, $position]);
    }

    return true;
}
?>

<!-- HTML form to collect survey data -->
<form method="POST" action="create_survey.php">
    <!-- Survey details -->
    <label for="code">Code:</label>
    <input type="text" name="code" required><br>

    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <label for="start_datetime">Start Date and Time:</label>
    <input type="datetime-local" name="start_datetime" required><br>

    <label for="end_datetime">End Date and Time:</label>
    <input type="datetime-local" name="end_datetime" required><br>

    <!-- Questions -->
    <label for="question_count">Number of Questions:</label>
    <input type="number" name="question_count" min="1" required><br>

    <h3>Questions:</h3>

    <?php
    // Generate input fields for each question
    for ($i = 1; $i <= $questionCount; $i++) {
        echo '<h4>Question ' . $i . '</h4>';
        echo '<label for="question_name_' . $i . '">Question Name:</label>';
        echo '<input type="text" name="question_name_' . $i . '" required><br>';

        echo '<label for="question_description_' . $i . '">Question Description:</label>';
        echo '<textarea name="question_description_' . $i . '" required></textarea><br>';

        echo '<label for="question_type_' . $i . '">Question Type:</label>';
        echo '<select name="question_type_' . $i . '" required>';
        echo '<option value="text">Text</option>';
        echo '<option value="radio">Radio</option>';
        echo '<option value="checkbox">Checkbox</option>';
        echo '</select><br>';
    }
    ?>

    <input type="submit" name="btn_submit" value="Create Survey">
</form>