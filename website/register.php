<head>
    <title>Magic Survey</title>
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