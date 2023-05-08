<?php
    session_start();
    include "includes/header.php";

    $pg = isset($_GET['pg']) ? $_GET['pg'] : 'home'; // initialize $pg with a default value of 'home'

    include "includes/home.php";

    include "includes/footer.php";
?>

<div class="innertube">
    <h1>Magic Survey</h1>
    <?php
    if (isset($_SESSION['username'])) {
        echo 'Welcome, ' . $_SESSION['username'] . '! You can now create a survey. ';
        echo '<a href="survey_form.php">Create Survey</a>';
    } else {
        echo 'All users must sign up before creating surveys.';
    }
    ?>
</div>

</div>
</main>

<nav>
    <div class="innertube">
        <h3>Menu</h3>
        <ul>
            <li><a href="register.php">Register</a></li>
        </ul>
        <ul>
            <li><a href="login.php">Login</a></li>
        </ul>
        <!-- <h3>Right heading</h3>
        <ul>
            <li><a href="#">Link 1</a></li>
        </ul> -->
    </div>
</nav>

<?php include "includes/footer.php"; ?>