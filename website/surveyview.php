<?php 
    session_start();
    
?>
    <form method="POST" action="surveyview.php">
    <fieldset>
	    <legend>Find Surveys</legend>
	    	<table>
	    		<tr>
	    			<td>Search by ID</td>
	    			<td><input type="text" name="id_search" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Search By Name</td>
	    			<td><input type="text" name="name_search" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input type="submit" name="btn_search" value="Search"></td>
	    		</tr>
	    	</table>
  </fieldset>

  <fieldset>
    <legend>Results</legend>
            <table>
                <ul>
                    <li><a href="index.php">Test Link (goes back to index)</a></li>
				</ul>
            </table>
  </fieldset>
    </form>