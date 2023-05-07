<?php
require_once("lib/connection.php");

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

                $_SESSION["user_id"] = $data["id"];
                $_SESSION['username'] = $data["username"];
                $_SESSION["email"] = $data["email"];
                $_SESSION["phone"] = $data["phone"];
                $_SESSION["firstname"] = $data["firstname"];
                $_SESSION["lastname"] = $data["lastname"];
                $_SESSION["is_block"] = $data["is_block"];
                $_SESSION["permision"] = $data["permision"];

                header('Location: index.php');
                exit;
            }
        }
    } else {
        echo "Username or password is not set!";
    }
}
?>

<form method="POST" action="login.php">
    <fieldset>
        <legend>Log in</legend>
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
    </fieldset>
</form>