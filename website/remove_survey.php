<?php

// Function to remove a survey
function removeSurvey($surveyId)
{
    // Get the database connection details from connection.php
    require_once("lib/connection.php");
    
    try {
        $sql = "UPDATE :surveyId FROM surveys SET UserId = 0 -- Assuming UserId = 0 indicates the survey is removed by being assigned to user named removed";
        
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
