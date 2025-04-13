<?php
// Start the session
session_start();

// Connect to the database (use correct credentials)
$conn = new mysqli('localhost', 'root', '', 'test'); // Assuming 'root' is the username and password is empty

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user email from session (assuming it's stored in session after login)
$user_id = $_SESSION['user_id']; // Adjust this depending on how you handle user login

// Query to fetch the name and date from the result table using the email
$sql = "SELECT r.first_name, r.last_name, rs.date FROM register r JOIN result rs ON r.user_id = rs.user_id WHERE r.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_id);
$stmt->execute();
$stmt->bind_result($first_name, $last_name, $date);
$stmt->fetch();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Achievement</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: lightgrey;
            margin: 0;
            padding: 0;
        }

        .certificate-container {
            width: 80%;
            margin: 50px auto;
            padding: 40px;
            border: 5px solid #000;
            background-color: #fff;
            text-align: center;
            position: relative;
        }

        .certificate-container h2 {
            color: #FFAA33;
            font-size: 30px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 28px;
            color: #2c3e50;
        }

        p {
            font-size: 20px;
            margin: 20px 0;
        }

        #date {
            font-size: 18px;
            margin-top: 30px;
        }

        .download-button {
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #2980b9;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .download-button:hover {
            background-color: #3498db;
        }

        .home-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #27ae60;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .home-button:hover {
            background-color: #2ecc71;
        }

        /* Star icon styling */
        .star-icon {
            color: #FFAA33;
            font-size: 30px;
            margin-top: -15px;
        }

        /* Section showcasing where certificates are used */
        .usage-section {
            margin-top: 50px;
            text-align: center;
            background-color: #f4f4f4;
            padding: 40px;
            border-radius: 10px;
        }

        .usage-section h3 {
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .usage-section p {
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 30px;
        }

        .usage-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .usage-item {
            width: 250px;
            text-align: center;
        }

        .usage-item img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .usage-item p {
            font-size: 16px;
            color: #2c3e50;
        }
        h1{
            color:maroon;
            
        }
    </style>
</head>
<body>

<!-- Certificate Container -->
<div class="certificate-container">
    <h2><img src="images/logo.jpeg" height="50px" width="50px" alt="Logo">  Proskill Mind</h2>
    <h1>Certificate of Achievement</h1>
    <p>This certificate is proudly presented to</p>
    <h2 id="userName"><?php echo $first_name . ' ' . $last_name; ?></h2> <!-- User's name will appear here -->
    <p>For outstanding performance in the IQ test.</p>
    <p>Date: <span id="date"><?php echo $date; ?></span></p> <!-- Date from result table -->

    <!-- Star Icons -->
    <div class="star-icon">&#9733;&#9733;&#9733;&#9733;&#9733;</div>

    <button class="download-button" onclick="window.print()">Download Certificate</button>
    <br>
    <button class="home-button" onclick="window.location.href='i.php'">Go Back to Home</button> <!-- Redirect to home page -->
</div>

<!-- Section Showcasing Where Certificates Are Used -->
<div class="usage-section">
    <h3>Where Our Certificate is Recognized</h3>
    <p>Our certificates are trusted by renowned companies and institutions worldwide.</p>
    <div class="usage-list">
        <!-- Example Usage Items -->
        <div class="usage-item">
            <img src="images/google.png" alt="Company 1">
            <p>Google</p>
        </div>
        <div class="usage-item">
            <img src="images/plantir.png" alt="Company 2">
            <p>Plantir</p>
        </div>
        <div class="usage-item">
            <img src="images/tesla.png" alt="Company 3">
            <p>Tesla</p>
        </div>
        <!-- Add more as needed -->
    </div>
    <p>Our certificates are highly valued in tech, education, and business sectors for their credibility and comprehensive testing process.</p>
</div>

<script>
    // Display the current date
    document.getElementById('date').textContent = new Date().toLocaleDateString();
</script>

</body>
</html>
