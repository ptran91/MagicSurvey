<?php

// Function to search surveys by name or code
function searchSurveys($searchName, $searchID)
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
        
        // Prepare the SQL statement with a parameterized query to prevent SQL injection
        $stmt = $db->prepare("
            SELECT *
            FROM Surveys
            WHERE name LIKE :searchName
            OR survey_code LIKE :searchID
        ");
        
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