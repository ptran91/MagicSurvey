<?php

// Function to remove a survey
function removeSurvey($surveyId)
{
    // Get the database connection details from connection.php
    require_once("lib/connection.php");
    
    try {
        $sql = "UPDATE Surveys SET is_closed = 1 -- Assuming is_closed=1 indicates the survey is removed WHERE survey_id = :surveyId";
        
        // Prepare the SQL statement to update the survey's status
        $stmt = $conn->prepare($sql);
        
        // Bind the survey ID to the parameter in the query
        $stmt->bindValue(':surveyId', $surveyId, PDO::PARAM_INT);
        
        // Execute the query
        $stmt->execute();
        
        // Close the database connection
        $db = null;
        
        // Survey removed successfully
        return true; 
    } catch (PDOException $e) {
        echo "Error removing survey: " . $e->getMessage();
        return false;
    }
}

// Example usage:
// $surveyId = 123;
// $result = removeSurvey($surveyId);

if ($result) {
    echo "Survey removed successfully.";
} else {
    echo "Error removing survey.";
}