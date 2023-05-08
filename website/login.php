<?php
require_once("lib/connection.php");

// Check if the user is already authenticated
session_start();
if (isset($_SESSION['user_id'])) {
    // User is already logged in, redirect to the desired page
    header('Location: homepage.php');
    exit;
}

if (isset($_POST["btn_submit"])) {
    if (isset($_POST["username"]) && isset($_POST["pass"])) {
        $username = $_POST["username"];
        $password = $_POST["pass"];

        $username = strip_tags($username);
        $username = addslashes($username);
        $password = strip_tags($password);
        $password = addslashes($password);

        if ($username == "" || $password == "") {
            echo "Username or password is not empty!";
        } else {
            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();

            $numRows = $stmt->rowCount();

            if ($numRows == 0) {
                echo "Username or password is not correct!";
            } else {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                // Store user information in session variables
                $_SESSION["user_id"] = $data["id"];
                $_SESSION['username'] = $data["username"];
                $_SESSION["email"] = $data["email"];
                $_SESSION["phone"] = $data["phone"];
                $_SESSION["firstname"] = $data["firstname"];
                $_SESSION["lastname"] = $data["lastname"];
                $_SESSION["is_block"] = $data["is_block"];
                $_SESSION["permission"] = $data["permission"];
                
                // Successful login, redirect to the homepage
                header("Location: homepage.php");
                exit;
            }
        }
        .form-container h2 {
            text-align: center;
        }
    </style>
</head>
<html>
<head>
    <title>Magic Survey</title>
</head>
<body>
<div class="form-container">
    <h2>Please register here!</h2>
    <form action="register.php" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" id="username" name="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="pass" name="pass"></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" id="firstname" name="firstname"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" id="lastname" name="lastname"></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" id="phone" name="phone"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" id="email" name="email"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Register"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>