<!-- HTML form to collect survey data -->
<form method="POST" action="create_survey.php">
    <!-- Survey details -->
    <label for="SurveyCode">SurveyCode:</label>
    <input type="text" name="SurveyCode" required><br>

    <label for="name">Name:</label>
    <input type="text" name="name" required><br>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <label for="StartDateTime">Start Date and Time:</label>
    <input type="datetime-local" name="StartDateTime" required><br>

    <label for="EndDateTime">End Date and Time:</label>
    <input type="datetime-local" name="EndDateTime" required><br>

    <input type="hidden" name="UserID" value="<?php echo $_SESSION['UserID']; ?>" required><br>
    <input type="hidden" name="StatusID" value="1" required><br>

    <!-- Questions -->
    <h3>Questions:</h3>

    <div id="questions_container">
        <?php
        if (isset($_POST['question_count'])) {
            $questionCount = $_POST['question_count'];
            // Generate input fields for each question
            for ($i = 1; $i <= $questionCount; $i++) {
                echo '<h4>Question ' . $i . '</h4>';
                echo '<label for="question_name_' . $i . '">Question Name:</label>';
                echo '<input type="text" name="question_name_' . $i . '" required><br>';

                echo '<label for="question_description_' . $i . '">Question Description:</label>';
                echo '<textarea name="question_description_' . $i . '" required></textarea><br>';

                echo '<label for="question_type_' . $i . '">Question Type:</label>';
                echo '<select name="question_type_' . $i . '" required>';
                echo '<option value="text">Text</option>';
                echo '<option value="radio">Radio</option>';
                echo '<option value="checkbox">Checkbox</option>';
                echo '</select><br>';
            }
        }
        ?>
    </div>

    <button type="button" id="add_question">Add Question</button>

    <input type="hidden" id="question_count" name="question_count" value="0">
    <input type="submit" name="btn_submit" value="Create Survey">
</form>

<script>
    // JavaScript code to add and remove question fields
    var questionCount = 0;
    var questionsContainer = document.getElementById('questions_container');
    var questionCountInput = document.getElementById('question_count');

    document.getElementById('add_question').addEventListener('click', function () {
        questionCount++;

        var questionDiv = document.createElement('div');
        questionDiv.innerHTML = '<h4>Question ' + questionCount + '</h4>' +
            '<label for="question_name_' + questionCount + '">Question Name:</label>' +
            '<input type="text" name="question_name_' + questionCount + '" required><br>' +
            '<label for="question_description_' + questionCount + '">Question Description:</label>' +
            '<textarea name="question_description_' + questionCount + '" required></textarea><br>' +
            '<label for="question_type_' + questionCount + '">Question Type:</label>' +
            '<select name="question_type_' + questionCount + '" required>' +
            '<option value="text">Text</option>' +
            '<option value="radio">Radio</option>' +
            '<option value="checkbox">Checkbox</option>' +
            '</select>' +
            '<button type="button" class="remove_question">Remove Question</button><br>';

        questionsContainer.appendChild(questionDiv);

        // Update the question count input value
        questionCountInput.value = questionCount;

        // Add event listener to the remove question button
        var removeQuestionButtons = document.getElementsByClassName('remove_question');
        for (var i = 0; i < removeQuestionButtons.length; i++) {
            removeQuestionButtons[i].addEventListener('click', function () {
                this.parentNode.remove();
                questionCount--;

                // Update the question count input value
                questionCountInput.value = questionCount;
            });
        }
    });
</script>