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
    include "remove_survey.php";
    session_start();
    // Get the database connection details from connection.php
    require_once("lib/connection.php");
    
    try {
        $sql = "SELECT * FROM surveys WHERE UserId LIKE :currentUser";
        
        // Prepare the SQL statement to update the survey's status
        $stmt = $conn->prepare($sql);
        
        // Bind the survey ID to the parameter in the query
        $stmt->bindValue(':currentUser', $_SESSION["user_id"], PDO::PARAM_INT);
        
        // Execute the query
        $stmt->execute();
        
        // Survey removed successfully
        return true; 
    } catch (PDOException $e) {
        echo "Error removing survey: " . $e->getMessage();
        return false;
    }
    
?>
    <form method="POST" action="surveyremove.php">
        <fieldset>
            <legend>Your Surveys (click to remove)</legend>
                <table>
                    <ul>
                        <?php if($result) { ?>
                            <?php foreach($result as $survey) { ?>
                                <td colspan="2" align="center"> <input type="submit" name="btn_remove" value="<?php $survey["Name"]?>" onclick="document.write('<?php removeSurvey($survey['SurveyCode']) ?>');" ></td>
                            <?php } ?>
                        <?php } else { ?>
                            <li>No Results</li>
                        <?php } ?>
                    </ul>
                </table>
        </fieldset>

        <fieldset>
            <legend>Results</legend>
                <?php echo $message ?>
                <table>
                    <ul>
                        <?php if($result) { ?>
                            
                            <?php foreach($result as $survey) { ?>
                                <li><a href="index.php"><?php echo $survey['Name'] ?> (link goes back to index.php)</a></li>
                            <?php } ?>
                        <?php } else { ?>
                            <li>No Results</li>
                        <?php } ?>
                    </ul>
                </table>
        </fieldset>
    </form>