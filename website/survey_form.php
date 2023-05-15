<?php
session_start();
?>


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
    
    <input type="hidden" name="UserID" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>" required><br>
    <input type="hidden" name="StatusID" value="1" required><br>

    <!-- Questions -->
    <h3>Questions:</h3>

    <div id="questions_container"></div>

    <button type="button" id="add_question">Add Question</button>

    <input type="hidden" id="question_count" name="question_count" value="0">
    <input type="submit" name="btn_submit" value="Create Survey">
</form>

<script>
    // JavaScript code to add and remove question fields
    var questionCount = 0;
    var questionsContainer = document.getElementById('questions_container');
    var questionCountInput = document.getElementById('question_count');

    function addQuestion(isRemovable) {
        questionCount++;

        var questionDiv = document.createElement('div');
        questionDiv.classList.add('question');
        questionDiv.innerHTML = '<h4 class="question-number">Question ' + questionCount + '</h4>' +
            '<label for="question_name_' + questionCount + '">Question Name:</label>' +
            '<input type="text" name="question_name_' + questionCount + '" required><br>' +
            '<label for="question_description_' + questionCount + '">Question Description:</label>' +
            '<textarea name="question_description_' + questionCount + '" required></textarea><br>' +
            '<label for="question_type_' + questionCount + '">Question Type:</label>' +
            '<select name="question_type_' + questionCount + '" required>' +
            '<option value="text">Text</option>' +
            '<option value="radio">Radio</option>' +
            '<option value="checkbox">Checkbox</option>' +
            '</select>';

        if (isRemovable) {
            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerText = 'Remove Question';
            removeButton.addEventListener('click', function () {
                questionDiv.remove();
                questionCount--;
                updateQuestionNumbers();

                // Update the question count input value
                questionCountInput.value = questionCount;

                // If the number of questions is less than 5, add a new question
                if (questionCount < 5) {
                    addQuestion(false);
                }
            });
            questionDiv.appendChild(removeButton);
        }

        questionsContainer.appendChild(questionDiv);

        // Update the question count input value
        questionCountInput.value = questionCount;
    }

    function updateQuestionNumbers() {
        var questions = document.getElementsByClassName('question');
        for (var i = 0; i < questions.length; i++) {
            var questionNumberElement = questions[i].getElementsByClassName('question-number')[0];
            questionNumberElement.innerText = 'Question ' + (i + 1);
        }
    }

    document.getElementById('add_question').addEventListener('click', function () { addQuestion(true); });

    // Add 5 questions initially
    for (var i = 0; i < 5; i++) {
        addQuestion(false);
    }
</script>
