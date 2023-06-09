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

  <title>Surveys</title>

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




<?php 
    session_start();
    $username = "";
    if(isset($_SESSION["username"]) && !empty($_SESSION["username"])){
        $username = $_SESSION["username"];
    }
?>

<html>
<head>
    <title>Magic Survey</title>
</head>
<body>
<div class="form-container">
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>Welcome </h2>
    <form method="POST" action="homepage.php">
  </p>
        <?php echo $username ?> <a href="logout.php">log out</a>
  </p>
</div class="innertube">
				<ul>
          <li><a href="survey_form.php">Create Survey</a></li>
				</ul>
				<ul>
          <li><a href="surveyview.php">View Surveys</a></li>
				</ul>
        <ul>
          <li><a href="surveyremove.php">Remove Surveys</li>
        </ul>
			</div>
		</nav>
    </form>