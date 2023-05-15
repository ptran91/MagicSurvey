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



  <title>About Us</title>



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

<form method="get" action="test.php">

<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname = "cpsc332-magic survey";



// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);

}

$sql = "SELECT * FROM `Questions` WHERE SurveyCode = 1;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

  // output data of each row

  for($i = 0;$row = $result->fetch_assoc();$i++) {

    echo $row["Name"] . ": <br>" . $row["Description"] ."<br>"."<input type='text'>". "<br>";

  }

} else {

  echo "0 results";

}



$conn->close();?>

<input type="submit">

<?php

echo $_GET[""];

?>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.js"></script>

</form>

</body>



</html>
