<?php
require_once("lib/connection.php");
session_start();

if (isset($_POST["btn_submit"])) {
    $code = $_POST["SurveyCode"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $startDateTime = $_POST["StartDateTime"];
    $endDateTime = $_POST["EndDateTime"];
    $userId = $_SESSION["user_id"];

    // Create survey status
    $statusData = array(
        'statusName' => 'Active',
        'statusTimeStamp' => date('Y-m-d H:i:s')
    );

    $statusId = create_status($conn, $statusData['statusName'], $statusData['statusTimeStamp']);

    // Validate the form data

    $questions = [];

    $questionCount = $_POST["question_count"];
    for ($i = 1; $i <= $questionCount; $i++) {
        $questionName = $_POST["question_name_" . $i];
        $questionDescription = $_POST["question_description_" . $i];
        $questionType = $_POST["question_type_" . $i];

        // Validate the question data

        $questions[] = [
            "name" => $questionName,
            "description" => $questionDescription,
            "type" => $questionType
        ];
    }

    create_survey($conn, $code, $name, $description, $startDateTime, $endDateTime, $questions, $userId, $statusId);
}

function create_status($conn, $statusName, $statusTimeStamp)
{
    try {
        $stmt = $conn->prepare("INSERT INTO statuses (Name, timestamp_date) VALUES (?, ?)");
        $stmt->execute([$statusName, $statusTimeStamp]);

        return $conn->lastInsertId();
    } catch (PDOException $e) {
        // Handle the exception here
        echo "Error creating status: " . $e->getMessage();
        exit();
    }
}


function create_survey($conn, $code, $name, $description, $startDateTime, $endDateTime, $questions, $userId, $statusId)
{
    try {
        $stmt = $conn->prepare("INSERT INTO surveys (SurveyCode, name, description, StartDateTime, EndDateTime, UserId, StatusId) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$code, $name, $description, $startDateTime, $endDateTime, $userId, $statusId]);

        $surveyId = $conn->lastInsertId();

        foreach ($questions as $position => $question) {
            $questionName = $question['name'];
            $questionDescription = $question['description'];
            $questionType = $question['type'];

            $stmt = $conn->prepare("INSERT INTO questions (survey_id, name, description, type, position) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$surveyId, $questionName, $questionDescription, $questionType, $position]);
        }

        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // Handle the exception here
        echo "Error creating survey: " . $e->getMessage();
        exit();
    }
}
?>