<?php

// Function to remove a survey
function removeSurvey($surveyId, $conn)
{
    try {
        $sql = "UPDATE surveys SET UserId = 0 WHERE SurveyCode = :surveyId"; // Assuming UserId = 0 indicates the survey is removed by being assigned to user named removed
        
        // Prepare the SQL statement to update the survey's status
        $stmt = $conn->prepare($sql);
        
        // Bind the survey ID to the parameter in the query
        $stmt->bindValue(':surveyId', $surveyId, PDO::PARAM_INT);
        
        // Execute the query
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error removing survey: " . $e->getMessage();
    }
}

?>
