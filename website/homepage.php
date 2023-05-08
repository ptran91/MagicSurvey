<?php 
    session_start();
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }
?>
    <form method="POST" action="homepage.php">
        <h1>Welcome, <?php echo $username ?> </h1>
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