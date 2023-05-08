<?php
// Include the connection file and any other necessary dependencies
require_once("lib/connection.php");

// Check if the form is submitted
if (isset($_POST["btn_submit"])) {
    // Retrieve the form data
    $statusId = $_POST["statusId"];
    $statusName = $_POST["statusName"];
    $statusTimeStamp = $_POST["statusTimeStamp"];

    // Call the create_status function passing the form data
    create_status($conn, $statusId, $statusName, $statusTimeStamp);
}

function create_status($conn, $statusId, $statusName, $statusTimeStamp)
{
    // Insert status details into the database
    $stmt = $conn->prepare("INSERT INTO statuses (StatusId, Name, TimeStamp) VALUES (?, ?, ?)");
    $stmt->execute([$statusId, $statusName, $statusTimeStamp]);

    // Get the ID of the newly inserted survey
    $statusId = $conn->lastInsertId();

    // Redirect to a success page or do any additional processing if needed
    header("Location: index.php");
    exit();
}
?>