<?php

// Function to remove a survey
function removeSurvey($surveyId)
{
    // Get the database connection details from environment variables
    $host = getenv('DB_HOST');
    $dbName = getenv('DB_NAME');
    $username = getenv('DB_USERNAME');
    $password = getenv('DB_PASSWORD');
    
    try {
        // Create a new PDO instance
        $db = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        
        // Set PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare the SQL statement to update the survey's status
        $stmt = $db->prepare("
            UPDATE Surveys
            SET is_closed = 1 -- Assuming is_closed=1 indicates the survey is removed
            WHERE survey_id = :surveyId
        ");
        
        // Bind the survey ID to the parameter in the query
        $stmt->bindValue(':surveyId', $surveyId, PDO::PARAM_INT);
        
        // Execute the query
        $stmt->execute();
        
        // Close the database connection
        $db = null;
        
        return true; // Survey removed successfully
    } catch (PDOException $e) {
        echo "Error removing survey: " . $e->getMessage();
        return false;
    }
}

// Example usage:
$surveyId = 123; // Replace with the ID of the survey you want to remove
$result = removeSurvey($surveyId);

if ($result) {
    echo "Survey removed successfully.";
} else {
    echo "Error removing survey.";
}