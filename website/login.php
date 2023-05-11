<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Login</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />


  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="free/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="free/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="free/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand mr-5" href="index.php">
            <img src="free/images/logo.png" alt="">
            <span>
              Team Blue
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About Us </a>
                </li>
              </ul>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


<!-- <style>
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
</style> -->

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
                $_SESSION["user_id"] = $data["UserId"];
                $_SESSION['username'] = $data["username"];
                $_SESSION["email"] = $data["email"];
                $_SESSION["phone"] = $data["phone"];
                $_SESSION["firstname"] = $data["FirstName"];
                $_SESSION["lastname"] = $data["LastName"];
                // $_SESSION["is_block"] = $data["is_block"];
                // $_SESSION["permission"] = $data["permission"];
                
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
    <title>Login</title>
</head>
<body>
        <div class="form-container">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>Please login here</h2>
    <form method="POST" action="login.php">
        </div>
                <p>Username:</p>
                <p><input type="text" name="username" size="30"></p>
            </div>
            <p>
                <p>Password:</p>
                <p><input type="password" name="pass" size="30"></p>
            </p>
            <p>
                <p colspan="2" align="center"><input type="submit" name="btn_submit" value="Log in"></p>
            </p>
    </form>
</div>
</div>
</body>
</html>
