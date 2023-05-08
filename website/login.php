<style>
    body {
        background-image: url('free/images/hero-bg.jpg');
        background-size: cover;
        background-repeat: no-repeat;
    }
    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        width: 500px;
        margin: auto;
    }
    .form-container h2 {
        text-align: center;
    }
</style>

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
    } else {
        echo "Username or password is not set!";
    }
}
?>

<html>
<head>
    <title>Magic Survey</title>
</head>
<body>
<div class="form-container">
    <h2>
        Please log in here!
    </h2>
    <form method="POST" action="login.php">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" size="30"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" size="30"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Log in"></td>
            </tr>
        </table>
    </form>
</div>