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

  <title>Register</title>

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




<!-- <head>
    <title>Register</title>
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
</head> -->
<html>
<head>
    <title>Magic Survey</title>
</head>
<body>
<div class="form-container">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                    <h2>Please register here</h2>
    <form action="register.php" method="post">
        </div>
                <p>Username:</p>
                <p><input type="text" id="username" name="username" size="30"></p>
    </div>
            <p>
                <td>Password:</p>
                <td><input type="password" id="pass" name="pass" size="30"></p>
    </p>
            <p>
                <p>First Name:</p>
                <p><input type="text" id="firstname" name="firstname" size="30"></p>
    </p>
            <p>
                <p>Last Name:</p>
                <p><input type="text" id="lastname" name="lastname" size="30"></p>
    </p>
            <p>
                <td>Phone Number:</p>
                <p><input type="text" id="phone" name="phone" size="30"></p>
    </p>
            <p>
                <p>Email:</p>
                <p><input type="text" id="email" name="email" size="30"></p>
    </p>
            <p>
                <p colspan="2" align="center"><input type="submit" name="btn_submit" value="Register"></p>
    </p>
    </form>
</div>

</body>
</html>
