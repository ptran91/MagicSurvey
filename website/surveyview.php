<?php 
    include "search_surveys.php";
    session_start();
    $message = "";
    $result = [];
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
                $result = searchSurveys($search_name, $search_id);
            } else if($search_name == "") {
                $message = "Surveys with ID $search_id";
                $result = searchSurveys($search_name, $search_id);
            } else {
                $message = "Surveys with ID $search_id or name $search_name:";
                $result = searchSurveys($search_name, $search_id);
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
            <legend>Results</legend>
                <?php echo $message ?>
                <table>
                    <ul>
                        <?php if($result) { ?>
                            
                            <?php foreach($result as $survey) { ?>
                                <li><a href="index.php"><?php $survey['name'] ?> (link goes back to index)</a></li>
                            <?php } ?>
                        <?php } else { ?>
                            <li><a href="index.php">Test Link (goes back to index, also no results lol)</a></li>
                        <?php } ?>
                    </ul>
                </table>
        </fieldset>
    </form>