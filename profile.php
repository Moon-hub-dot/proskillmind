<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "test"; // Your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming email is stored in session after login
$user_id = $_SESSION['user_id'];

// Fetch user info from the 'register' table
$userQuery = "SELECT first_name, last_name FROM register WHERE user_id='$user_id'";
$userResult = $conn->query($userQuery);
$userData = $userResult->fetch_assoc();

// Fetch result info from the 'result' table
$resultQuery = "SELECT score, grade, test_type FROM result WHERE user_id='$user_id'";
$resultResult = $conn->query($resultQuery);
$resultData = $resultResult->fetch_assoc();

// Display user data dynamically
$username = $userData['first_name'] . ' ' . $userData['last_name'];
$iqScore = $resultData['score'];
$grade = $resultData['grade'];
$testType = $resultData['test_type'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://api.multiavatar.com/"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
body {
    display: flex;
    margin: 0;
    height: 100vh;
}
.sidebar {
    width: 250px;
    background-color: #2C3E50;
    color: #fff;
    padding: 20px;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.sidebar img {
    width: 100px;
    margin-bottom: 20px;
}
.sidebar button {
    background-color: #E74C3C;
    border: none;
    color: #fff;
    padding: 10px 20px;
    margin: 5px 0;
    width: 100%;
    cursor: pointer;
    transition: background 0.3s;
}
.sidebar button:hover {
    background-color: #C0392B;
}
.avatar-section {
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer; /* Cursor only for the clickable area */
}

.avatar-section img {
    width: 150px;
    border-radius: 50%;
    border: 4px solid #4CAF50; /* Bright green border for better visibility */
    padding: 5px; /* Space between the image and the border */
    transition: transform 0.2s ease-in-out; /* Smooth hover effect */
}

.avatar-section img:hover {
    transform: scale(1.05); /* Slight zoom effect for interactivity */
}

.avatar-section p {
    margin-top: 10px;
    cursor: default; /* Prevents the text from being clickable */
}

.profile-content {
    margin-left: 250px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.top-section {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 20px;
}
.profile-container {
    display: flex;
    align-items: center;
    gap: 20px;
    width: 100%;
    font-size: 1.2em; /* Enlarged text for better readability */
}
.charts-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 50px;
    width: 100%;
    margin-top: 30px;
}
canvas {
    max-width: 450px; /* Increased chart width */
    height: 350px;
}
    </style>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <img src="images/11.png" alt="Company Logo">
        <button onclick="window.location.href='instructions.php'">Logout</button>
        <button onclick="deleteAccount()">Delete My Account</button>
        <button onclick="resetScore()">Reset My Score</button>
        <button onclick="window.location.href='i.php'">Home</button>
    </div>

    <div class="profile-content">
    <div class="avatar-section">
    <img id="avatar" src="https://robohash.org/User1.png" 
         alt="AI Avatar" 
         class="avatar"
         onclick="customizeAvatar()"> <!-- Avatar click functionality only here -->
    <p>Customize your Avatar</p>
</div>

<div class="profile-content">
        <div class="info-section">
            <h2>Welcome, <?php echo $username; ?></h2>
            <p>User ID: <?php echo $_SESSION['user_id']; ?></p>
            <p>IQ Score: <?php echo $iqScore; ?></p>
            <p>Grade: <?php echo $grade; ?></p>
            <p>Test Type: <?php echo $testType; ?></p>
            <p>Ranking: <?php echo isset($_SESSION['ranking']) ? '#' . $_SESSION['ranking'] : 'N/A';
    ?></p>
        </div>
    </div>

            <div class="charts-container">
                <canvas id="progressChart"></canvas>
                <canvas id="performanceChart"></canvas> <!-- New Performance Analysis Chart -->
            </div>
        </div>
        <div class="profile-content">
        <div class="btn-section">
            <button onclick="viewResult()">View Result Score</button>
        </div>
    </div>

    <script>
        const progressCtx = document.getElementById('progressChart').getContext('2d');
        new Chart(progressCtx, {
            type: 'line',
            data: {
                labels: ['Test 1', 'Test 2', 'Test 3', 'Test 4'],
                datasets: [{
                    label: 'Progress Tracker',
                    data: [65, 70, 85, 90],
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    fill: true
                }]
            },
            options: {
                scales: {
                    x: { ticks: { color: 'black' } },
                    y: { ticks: { color: 'black' } }
                }
            }
        });

        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        new Chart(performanceCtx, {
            type: 'bar',
            data: {
                labels: ['Logic Test', 'Memory Test', 'Math Test', 'Verbal Test'],
                datasets: [{
                    label: 'Performance Analysis',
                    data: [90, 60, 70, 85],
                    backgroundColor: ['#4CAF50', '#FF9800', '#03A9F4', '#F44336']
                }]
            },
            options: {
                scales: {
                    x: { ticks: { color: 'black' } },
                    y: { ticks: { color: 'black' } }
                }
            }
        });

        function viewResult() {
            alert('Redirecting to Result Page...');
            window.location.href = 'result1.php';
        }

        window.onload = function () {
            const randomName = 'User' + Math.floor(Math.random() * 1000);
            document.getElementById('avatar').src = `https://robohash.org/${randomName}.png`;
        }

        function logout() {
            alert('Logging out...');
            window.location.href = 'logout.php';
        }

        function deleteAccount() {
            if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                alert('Account deleted successfully.');
                window.location.href = 'delete_account.php';
            }
        }

        function resetScore() {
            if (confirm('Are you sure you want to reset your score? This action cannot be undone.')) {
                alert('Score reset successfully.');
                window.location.href = 'reset_score.php';
            }
        }

        function customizeAvatar() {
            const randomName = 'User' + Math.floor(Math.random() * 1000);
            document.getElementById('avatar').src = `https://robohash.org/${randomName}.png`;
        }
    </script>
</body>
</html>