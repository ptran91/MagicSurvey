<?php
// Include the connection file and any other necessary dependencies
require_once("lib/connection.php");

// Check if the form is submitted
if (isset($_POST["btn_submit"])) {
    // Retrieve the form data
    $code = $_POST["SurveyCode"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $startDateTime = $_POST["StartDateTime"];
    $endDateTime = $_POST["EndDateTime"];
    $userId = $_POST["userId"];
    $statusId = $_POST["statusId"];

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
    create_survey($conn, $code, $name, $description, $startDateTime, $endDateTime, $questions, $userId, $statusId);
}

function create_survey($conn, $code, $name, $description, $startDateTime, $endDateTime, $questions, $userId, $statusId)
{
    // Insert survey details into the database
    $stmt = $conn->prepare("INSERT INTO surveys (SurveyCode, name, description, StartDateTime, EndDateTime, UserId, StatusId) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$code, $name, $description, $startDateTime, $endDateTime, $userId, $statusId]);

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

    // Redirect to a success page or do any additional processing if needed
    header("Location: index.php");
    exit();
}
?>
