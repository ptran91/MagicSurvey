<form method="POST" action="create_survey.php">
    <label>Survey Code:</label>
    <input type="text" name="code" required>
    <br>
    <label>Survey Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Survey Description:</label>
    <textarea name="description" required></textarea>
    <br>
    <label>Start Date-Time:</label>
    <input type="datetime-local" name="start_date" required>
    <br>
    <label>End Date-Time:</label>
    <input type="datetime-local" name="end_date" required>
    <br><br>
    <label>Questions:</label>
    <br>
    <input type="button" id="add_question" value="Add Question">
    <div id="question_container"></div>
    <br>
    <input type="submit" value="Create Survey">
</form>

<script>
    var questionCount = 0;

    // Function to add a new question to the form
    function addQuestion() {
        questionCount++;

        // Create question container
        var container = document.createElement("div");
        container.id = "question_" + questionCount;
        container.className = "question_container";
        
        // Create question inputs
        var questionName = document.createElement("input");
        questionName.type = "text";
        questionName.name = "question_name[]";
        questionName.placeholder = "Question Name";
        questionName.required = true;

        var questionDesc = document.createElement("textarea");
        questionDesc.name = "question_desc[]";
        questionDesc.placeholder = "Question Description";
        questionDesc.required = true;

        var questionType = document.createElement("select");
        questionType.name = "question_type[]";
        questionType.required = true;
        questionType.addEventListener("change", function() {
            toggleAnswerOptions(container, questionType.value);
        });

        var optionTypes = ["Multiple Answers", "Multiple Choice", "Yes/No", "Essay"];
        for (var i = 0; i < optionTypes.length; i++) {
            var option = document.createElement("option");
            option.value = optionTypes[i].replace(/ /g,'').toLowerCase();
            option.text = optionTypes[i];
            questionType.appendChild(option);
        }

        var answerContainer = document.createElement("div");
        answerContainer.className = "answer_container";
        answerContainer.style.display = "none";

        var answerOptions = document.createElement("textarea");
        answerOptions.name = "answer_options[]";
        answerOptions.placeholder = "Answer Options (Separated by commas)";

        // Append question inputs to container
        container.appendChild(questionName);
        container.appendChild(document.createElement("br"));
        container.appendChild(questionDesc);
        container.appendChild(document.createElement("br"));
        container.appendChild(questionType);
        container.appendChild(answerContainer);
        answerContainer.appendChild(answerOptions);

        // Append container to question container
        var questionContainer = document.getElementById("question_container");
        questionContainer.appendChild(container);
    }

    // Function to toggle answer options based on question type
    function toggleAnswerOptions(container, type) {
        var answerContainer = container.getElementsByClassName("answer_container")[0];
        if (type == "multipleanswers" || type == "multiplechoice") {
            answerContainer.style.display = "block";
        } else {
            answerContainer.style.display = "none";
        }
    }

    // Event listener for add question button
    document.getElementById("add_question").addEventListener("click", function() {
        addQuestion();
    });
</script>
