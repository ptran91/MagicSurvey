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
<h2>Welcome </h2>
    <form method="POST" action="homepage.php">
        <?php echo $username ?>
        <nav>
			<div class="innertube">
				<ul>
                    <li><a href="surveycreate.php">Create Survey</a></li>
				</ul>
				<ul>
                    <li><a href="surveyview.php">View Surveys</a></li>
				</ul>
			</div>
		</nav>
    </form>