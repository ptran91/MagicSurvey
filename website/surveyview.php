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

  <title>Find Surveys</title>

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
    include "search_surveys.php";
    session_start();
    $message = "";
    $result = [];
    if(isset($_POST["btn_search"])) {
        if(isset($_POST["id_search"]) && isset($_POST["name_search"])) {
            $search_id = $_POST["id_search"];
            $search_name = $_POST["name_search"];

            $search_id = strip_tags($search_id);
            $search_id = addslashes($search_id);
            $search_name = strip_tags($search_name);
            $search_name = addslashes($search_name);
            
            if($search_id == "" && $search_name == "") {
                $message = "There are no search terms!";
            } else if($search_id == "") {
                $message = "Surveys with name $search_name";
                $result = searchSurveys($search_name, $search_id);
            } else if($search_name == "") {
                $message = "Surveys with ID $search_id";
                $result = searchSurveys($search_name, $search_id);
            } else {
                $message = "Surveys with ID $search_id or name $search_name:";
                $result = searchSurveys($search_name, $search_id);
            }
        }
    }
?>
    <form method="POST" action="surveyview.php">
        <fieldset>
            <legend>Find Surveys</legend>
                <table>
                    <tr>
                        <td>Search by ID</td>
                        <td><input type="search" name="id_search" size="30"></td>
                    </tr>
                    <tr>
                        <td>Search By Name</td>
                        <td><input type="search" name="name_search" size="30"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"> <input type="submit" name="btn_search" value="Search"></td>
                    </tr>
                </table>
        </fieldset>

        <fieldset>
            <legend>Results</legend>
                <?php echo $message ?>
                <table>
                    <ul>
                        <?php if($result) { ?>
                            
                            <?php foreach($result as $survey) { ?>
                                <li><a href="index.php"><?php $survey['name'] ?> (link goes back to index)</a></li>
                            <?php } ?>
                        <?php } else { ?>
                            <li><a href="index.php">Test Link (goes back to index, also no results lol)</a></li>
                        <?php } ?>
                    </ul>
                </table>
        </fieldset>
    </form>