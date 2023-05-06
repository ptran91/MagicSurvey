<?php 
require_once("lib/connection.php");
session_start();
if (isset($_POST["btn_submit"])) {
	if (isset($_POST["username"]) && isset($_POST["pass"])) {
		$username = $_POST["username"];
		$password = $_POST["pass"];

		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username or password is empty!";
		} else {
			$sql = "select * from users where username = '$username' and password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "username or password is not correct!";
			} else {
				while ( $data = mysqli_fetch_array($query) ) {
		    		$_SESSION["user_id"] = $data["id"];
					$_SESSION["username"] = $data["username"];
					$_SESSION["email"] = $data["email"];
	                $_SESSION["phone"] = $data["phone"];
					$_SESSION["firstname"] = $data["firstname"];
	                $_SESSION["lastname"] = $data["lastname"];
					$_SESSION["is_block"] = $data["is_block"];
					$_SESSION["permision"] = $data["permision"];
		    	}
				
				header("Location: homepage.php");
				exit;
			}
		}
	} else {
		echo "username or password is not set!";
	}
}
?>
	<form method="POST" action="login.php">
	<fieldset>
	    <legend>Log in</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="pass" name="pass" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_submit" value="Log in"></td>
	    		</tr>
	    	</table>
  </fieldset>
  </form>