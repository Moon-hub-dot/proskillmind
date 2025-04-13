<?php
// Database connection
$host = 'localhost'; // Database host
$db = 'test'; // Database name
$user = 'root'; // Database user
$password = ''; // Database password

// Create a new connection
$conn = new mysqli($host, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the user is identified by their email, retrieved from the GET parameter
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : null;

if (!$email) {
    echo "<p>Error: No email provided. Please provide a valid email to view results.</p>";
    exit;
}

// Default values
$correctAnswers = 0;
$grade = 'N/A';
$totalScore = 0;


// Prepare SQL query
$sql = "SELECT q1, q2, q3, q4, q5,q6,q7,q8,q9,q10 FROM free WHERE email = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

// Define the correct answers for comparison
$correctAnswersArray = [32, 'Pacific', 'Unknown', 'Triangle', 9,'5 minutes','P','Nine','Nowhere','They’re all married']; // Assume these are the correct answers for questions 1 to 10

// Check if the user has a record in the database
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Calculate the correct answers
   // Calculate the correct answers
foreach ($correctAnswersArray as $index => $correctAnswer) {
    // Ensure both are treated as strings for comparison
    $userAnswer = trim(strval($row['q' . ($index + 1)])); // User's answer from the database
    $correctAnswer = trim(strval($correctAnswer)); // Correct answer from the correctAnswersArray

    // Check if the user's answer matches the correct answer
    if ($userAnswer === $correctAnswer) {
        $correctAnswers++;
    }
}


    $totalQuestions = count($correctAnswersArray); // Total number of questions
    
    // Calculate the total score
    $totalScore = ($correctAnswers / $totalQuestions) * 100;

    // Determine the grade based on the score
    if ($totalScore >= 90) {
        $grade = 'A';
    } elseif ($totalScore >= 75) {
        $grade = 'B';
    } elseif ($totalScore >= 60) {
        $grade = 'C';
    } elseif ($totalScore >= 50) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }

    // Update the TOTAL and GRADE fields in the database
    $updateSql = "UPDATE free SET score = ?, grade = ? WHERE email = ?";
    $updateStmt = $conn->prepare($updateSql);
    if (!$updateStmt) {
        die("Error preparing update statement: " . $conn->error);
    }
    $updateStmt->bind_param('dss', $totalScore, $grade, $email);
    if (!$updateStmt->execute()) {
        die("Error executing update statement: " . $updateStmt->error);
    }
    $updateStmt->close(); // Close the update statement
} else {
    echo "<p>No results found for this email.</p>";
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>User Profile</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #007bff;
        }
        .card-text {
            font-size: 1.1em;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .text-center a {
            color: #007bff;
            text-decoration: none;
        }
        .text-center a:hover {
            text-decoration: underline;
        }
        /* Navigation styles */
        #navMenu {
            display: none;
            position: absolute;
            top: 70px; /* Adjust according to your layout */
            left: 10px; /* Adjust according to your layout */
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
            transition: all 0.3s ease; /* Smooth transition */
        }

        #navMenu a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #343a40;
            font-size: 16px;
            transition: background 0.3s ease, color 0.3s ease; /* Smooth transition for hover */
        }

        #navMenu a:hover {
            background: #f0f0f0;
            color: #007bff;
        }

        .toggle-nav {
            cursor: pointer;
            font-size: 35px; /* Increased icon size */
            position: absolute;
            top: 20px; /* Adjust according to your layout */
            left: 10px; /* Adjust according to your layout */
            transition: transform 0.3s; /* Animation for icon */
        }

        .toggle-nav:hover {
            transform: rotate(90deg); /* Rotate icon on hover */
        }
    </style>
</head>
<body>
    

    <div class="container mt-5">
        <h1 class="text-center">Result</h1>
        <div class="card mt-3">
            <div class="card-body">
                <div class="aks"> 
                    <img src="brainbound-iq-high-resolution-logo.png" height="75px" width="150px" alt="IQ Logo">
                </div>
                
                <h3 class="card-title">Welcome, <?php echo htmlspecialchars($email); ?></h3>
                <p class="card-text">Here is your performance:</p>
                
                <!-- Display Performance Chart -->
                <canvas id="performanceChart"></canvas>
                
                <!-- Performance Details -->
                <div class="mt-4">
                    <h4>Performance Details</h4>
                    <p>Correct Answers: <?php echo $correctAnswers; ?></p>
                    <p>Incorrect Answers: <?php echo $totalQuestions - $correctAnswers; ?></p>
                    <p>Total Questions: <?php echo $totalQuestions; ?></p>
                    <p>Total Score: <?php echo number_format($totalScore, 2); ?>%</p>
                    <p>Grade: <?php echo $grade; ?></p>
                    <p>Remark: <?php echo ($correctAnswers >= 3) ? 'Good job!' : 'Needs improvement.'; ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation and Certificate Link -->
    <div class="text-center">
        <a href="http://localhost/proskillmind/i.php">Home</a>
    </div>
    

    <!-- JavaScript to Create Performance Chart -->
    <script>
      const ctx = document.getElementById('performanceChart').getContext('2d');
const correctAnswers = <?php echo $correctAnswers; ?>;
const incorrectAnswers = <?php echo $totalQuestions - $correctAnswers; ?>;
const totalQuestions = <?php echo $totalQuestions; ?>;

// Create the bar chart
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Correct Answers', 'Incorrect Answers'],
        datasets: [{
            label: 'Number of Answers',
            data: [correctAnswers, incorrectAnswers],
            backgroundColor: ['#4CAF50', '#F44336'], // Green for correct, red for incorrect
            borderColor: ['#3e95cd'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Number of Answers'
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Performance Overview'
            }
        }
    }
});

 document.querySelector('.toggle-nav').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });

    </script>
</body>
</html>