<?php
session_start();

// Database connection 
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    header('Content-Type: application/json'); // Crucial: Set the content type to JSON
}

// Capture test type from URL
$test_type = isset($_GET['test_type']) ? $_GET['test_type'] : '';
// Store test_type in session (check if it's passed via GET/POST)
if (isset($_POST['test_type'])) {
    $_SESSION['test_type'] = $_POST['test_type'];
} elseif (isset($_GET['test_type'])) {
    $_SESSION['test_type'] = $_GET['test_type'];
}

// Fetch questions based on test type
$sql = "SELECT q_no, q_text, image_path, op_a, op_b, op_c, op_d, hint 
        FROM question 
        WHERE test_type='$test_type' 
        ORDER BY RAND() LIMIT 5";

$result = $conn->query($sql);

$questions = [];
while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}

// Initialize session variables for points and badges 
if (!isset($_SESSION['points'])) {
    $_SESSION['points'] = 0;
}

// Ensure user is logged in 
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0; 
// Add default 0 if not logged in

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1a1a2e;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 30px;
            background-color: #162447;
            padding: 25px;
            border-radius: 8px;
            max-width: 600px;
        }
        .question-text {
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            background-color: #1f4068;
            color: #ffd700;
            font-weight: bold;
        }
        .question-item {
            margin-bottom: 20px;
            display: none;
        }
        .options .option {
    background-color: #ffffff;
    color: #000000;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    cursor: pointer;
    transition: border 0.3s ease, background-color 0.3s ease;
    text-align: center;
    font-weight: bold;
}

.options .option:hover {
    background-color: #ffd700;
    color: #fff;
}

.options .selected {
    border: 2px solid #ff9900;
    background-color: #ff6600;
    color: #fff;
}

        .selected-answer {
            background-color: orange;
            color: #fff;
        }
        #hint-icon {
            font-size: 1.5em;
            color: #ffd700;
            cursor: pointer;
        }
        #timer-icon {
            font-size: 1.2em;
            margin-right: 8px;
            color: #ffd700;
        }
        #time {
            font-size: 1.5em;
            font-weight: bold;
            margin-top: 10px;
        }
        .navigation-buttons {
            margin-top: 20px;
        }
         /* Modal styles */
         .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .badge {
            font-size: 24px;
            margin-top: 20px;
        }
        .badge img {
            width: 100px;
            height: 100px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 15px 32px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            display: block;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Quiz Application</h2>
        <div id="timer" class="text-center mb-3">
            <span id="timer-icon"><img src="images/timer.jpg" height="50" width="50"></span>
            <span id="time">60</span> seconds
        </div>

        <?php foreach ($questions as $index => $question): ?>
            <div class="question-item" data-q-no="<?= $question['q_no'] ?>">
                <div class="question-text">
                    <h5><?= $question['q_text'] ?></h5>
                    <?php if (!empty($question['image_path'])): ?>
                        <img src="<?= $question['image_path'] ?>" alt="Question Image" style="max-width:100%; height:auto; margin-top: 10px;">
                    <?php endif; ?>
                </div>
                <div class="options">
                <div class="option" onclick="selectOption(this, '<?= $question['q_no'] ?>')"><?= $question['op_a'] ?></div>
<div class="option" onclick="selectOption(this, '<?= $question['q_no'] ?>')"><?= $question['op_b'] ?></div>
<div class="option" onclick="selectOption(this, '<?= $question['q_no'] ?>')"><?= $question['op_c'] ?></div>
<div class="option" onclick="selectOption(this, '<?= $question['q_no'] ?>')"><?= $question['op_d'] ?></div>

</div>

                <div class="text-center mt-3">
                    <span id="hint-icon" onclick="showHint('<?= addslashes($question['hint']) ?>')">❓</span>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="navigation-buttons text-center">
            <button class="btn btn-primary" onclick="prevQuestion()">Previous</button>
            <button class="btn btn-primary" onclick="nextQuestion()">Next</button>
            <button class="btn btn-success" id="submit-btn" onclick=" submitAnswers()" style="display: none;">Submit All Answers</button>
        </div>
    </div>



    <script>

    console.log("Total Questions:", <?= count($questions) ?>);


const selectedAnswers = {}; 
let answeredQuestions = 0;
let currentIndex = 0;
let timerInterval;

function startTimer() {
    document.getElementById("time").textContent = 60; // Set initial time
    timerInterval = setInterval(() => {
        let timeLeft = parseInt(document.getElementById("time").textContent);
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            submitAnswers(); // Submit answers when time is up
        } else {
            document.getElementById("time").textContent = timeLeft - 1; // Decrease time
        }
    }, 1000);
}

function selectOption(div, questionId) {
    const selectedText = div.innerHTML; // Store actual text or icon content
    if (!selectedAnswers[questionId]) answeredQuestions++; // Count answered questions
    selectedAnswers[questionId] = selectedText; // Store selected answer text

    // Highlight the selected option
    const options = div.parentElement.querySelectorAll('.option');
    options.forEach(optionDiv => {
        optionDiv.classList.remove('selected');
    });
    div.classList.add('selected');

    checkIfAllAnswered(); // Check if all questions are answered
}


function checkIfAllAnswered() {
    if (answeredQuestions === <?= count($questions) ?>) {
        document.getElementById("submit-btn").style.display = "block"; // Show submit button
    } else {
        document.getElementById("submit-btn").style.display = "none"; // Hide if not all answered
    }
}

function showHint(hint) {
    alert("Hint: " + hint); // Show hint in alert
}

function prevQuestion() {
    if (currentIndex > 0) {
        currentIndex--;
        showQuestion(currentIndex); // Show previous question
    }
}

function nextQuestion() {
    if (currentIndex < <?= count($questions) ?> - 1) {
        currentIndex++;
        showQuestion(currentIndex); // Show next question
    }
}

function showQuestion(index) {
    const questions = document.querySelectorAll(".question-item");
    questions.forEach((q, i) => {
        q.style.display = (i === index) ? "block" : "none"; // Show current question
    });
}

    
function submitAnswers() {
    const formData = new FormData();
    formData.append('user_id', <?= $user_id ?>); // Include user_id if needed

    // Loop over selected answers and append them to the formData
    for (const [questionId, answer] of Object.entries(selectedAnswers)) {
        formData.append(`selectedAnswers[${questionId}]`, answer); // Append each answer
    }

    // Send data via POST to PHP
    fetch('submit_answer.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())  // Get the response as text first for debugging
    .then(text => {
        console.log(text); // Log the raw response text to the console
        // Parse the response and handle success/failure
        if (text === 'success') {
            alert("Answers submitted successfully!");
            window.location.href = 'subresult.php'; // Redirect to result page
        } else {
            alert("There was an error submitting your answers.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}




// function showResult(score, badge) {
//     document.getElementById("scoreMessage").innerText = "You scored: " + score + " points"; // Display score
//     document.getElementById("badgeMessage").innerText = "Badge: " + badge; // Display badge
//     $('#resultModal').modal('show'); // Show the result modal
// }

// Start showing the first question and initialize the timer on load
document.addEventListener('DOMContentLoaded', () => {
    showQuestion(currentIndex); // Show the first question
    startTimer(); // Start the timer
});

    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 