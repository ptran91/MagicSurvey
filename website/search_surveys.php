<?php

// Function to search surveys by name or code
function searchSurveys($searchName, $searchID)
{
    // Get the database connection details from connection.php
    require_once("lib/connection.php");
    
    try {
        $sql = "SELECT * FROM surveys WHERE Name LIKE :searchName OR SurveyCode LIKE :searchID";
        
        // Prepare the SQL statement with a parameterized query to prevent SQL injection
        $stmt = $conn->prepare($sql);
        
        // Bind the search term to the parameter in the query
        $stmt->bindValue(':searchName', "%$searchName%", PDO::PARAM_STR);
        $stmt->bindValue(':searchID', "%$searchID%", PDO::PARAM_STR);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch all the matching surveys
        $surveys = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Close the database connection
        $db = null;
        
        // Return the surveys
        return $surveys;
    } catch (PDOException $e) {
        echo "Error searching surveys: " . $e->getMessage();
        return false;
    }
}

// Example usage:
// $searchName = 'ABC';
// $searchID = '1234'
// $result = searchSurveys($searchName, $searchID);

// if ($result) {
//     // Display the search results
//     foreach ($result as $survey) {
//         echo "Survey ID: " . $survey['survey_id'] . "<br>";
//         echo "Name: " . $survey['name'] . "<br>";
//         echo "Code: " . $survey['survey_code'] . "<br>";
//         echo "<br>";
//     }
// } else {
//     echo "No surveys found.";
// }