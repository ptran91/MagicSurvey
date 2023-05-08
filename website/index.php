<?php
    session_start();
    include "includes/header.php";

    $pg = isset($_GET['pg']) ? $_GET['pg'] : 'home'; // initialize $pg with a default value of 'home'

    include "includes/home.php";

    include "includes/footer.php";
?>