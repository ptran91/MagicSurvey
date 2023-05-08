<?php 
    session_start();
    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }
?>
    <form method="POST" action="surveycreate.php">
    </form>