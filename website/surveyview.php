<?php 
    session_start();
    $message = "Results";
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
            } else if($search_name == "") {
                $message = "Surveys with ID $search_id";
            } else {
                $message = "Surveys with ID $search_id and name $search_name";
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
    <legend><?php echo $message ?> </legend>
            <table>
                <ul>
                    <li><a href="index.php">Test Link (goes back to index)</a></li>
				</ul>
            </table>
  </fieldset>
    </form>