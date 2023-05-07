<html>
<head>
    <title>Magic Survey</title>
</head>
<body>
<?php
require_once("lib/connection.php");

function validate_password($password)
{
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
    return preg_match($pattern, $password);
}

if (isset($_POST["btn_submit"])) {

    $username = $_POST["username"];
    $password = $_POST["pass"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    if ($username == "" || $password == "" || $firstname == "" || $lastname == "" || $phone == "" || $email == "") {
        echo "Please enter all the required information!";
    } else {
        if (!validate_password($password)) {
            echo "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character";
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo "Username already exists. Please try with another one.";
            } else {
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "Email already exists. Please try with another one.";
                } else {
                    $stmt = $conn->prepare("INSERT INTO users(username, password, firstname, lastname, phone, email) VALUES (:username, :password, :firstname, :lastname, :phone, :email)");
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->execute();

                    header('Location: index.php');
                    exit;
                }
            }
        }
    }
}
?>
	<form action="register.php" method="post">
		<table>
			<!-- <tr>
				<td colspan="2">All users must sign up before creating surveys</td>
			</tr>	 -->
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
	</body>
	</html>