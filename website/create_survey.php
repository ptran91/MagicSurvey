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
        create_question_type();
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

function get_questionTypeId_by_Name($conn, $questionTypeName) {
    $sql = "SELECT * FROM surveys WHERE Name LIKE :questionTypeName";
        
    // Prepare the SQL statement with a parameterized query to prevent SQL injection
    $stmt = $conn->prepare($sql);
    
    // Bind the search term to the parameter in the query
    $stmt->bindValue(':questionTypeName', $questionTypeName, PDO::PARAM_STR);
    
    // Execute the query
    $stmt->execute();

    return $conn->lastInsertId();
}

function create_survey($conn, $code, $name, $description, $startDateTime, $endDateTime, $questions, $userId, $statusId)
{
    try {
        $stmt = $conn->prepare("INSERT INTO surveys (SurveyCode, name, description, StartDateTime, EndDateTime, UserId, StatusId) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$code, $name, $description, $startDateTime, $endDateTime, $userId, $statusId]);

        foreach ($questions as $position => $question) {
            $questionName = $question['name'];
            $questionDescription = $question['description'];
            $questionTypeId = get_questionTypeId_by_Name($conn, $question['type']);

            $stmt = $conn->prepare("INSERT INTO questions (QuestionId, Name, Description, SurveyCode, QuestionTypeId, timestamp_date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute(['', $questionName, $questionDescription, $code, $questionTypeId, date('Y-m-d H:i:s')]);
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
