<?php
// Include the connection file and any other necessary dependencies
require_once("lib/connection.php");

// Retrieve the form data
$statusId = $_POST["statusId"];
$statusName = $_POST["statusName"];
$statusTimeStamp = $_POST["statusTimeStamp"];

// Call the create_status function passing the form data
create_status($conn, $statusId, $statusName, $statusTimeStamp);

function create_status($conn, $statusId, $statusName, $statusTimeStamp)
{
    try {
        // Insert status details into the database
        $stmt = $conn->prepare("INSERT INTO statuses (StatusId, Name, TimeStamp) VALUES (?, ?, ?)");
        $stmt->execute([$statusId, $statusName, $statusTimeStamp]);

        // Redirect to a success page or do any additional processing if needed
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        // Handle the exception here, such as displaying an error message
        echo "Error: " . $e->getMessage();
    }
}
?>
