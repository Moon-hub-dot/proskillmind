<div class="container mt-5">
        <img src="images/logo.jpeg" height="75px" width="150px" alt="IQ Logo"><h1>Choose Your Path to Unlock Potential</h1>
        <h1 class="text-center" style= "color:yellow;">Leaderboard</h1>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Score</th>
                
                </tr>
            </thead>
            <tbody>
            <?php
session_start(); 
$con = mysqli_connect("localhost", "root", "", "test");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Modified query to calculate total score for each user
$query = "SELECT r.user_id, SUM(r.score) AS total_score, reg.first_name
             FROM result r
             JOIN register reg ON r.user_id = reg.user_id
             GROUP BY r.user_id
             ORDER BY total_score DESC";

$result = mysqli_query($con, $query);
$rank = 1;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['user_id'] == $_SESSION['user_id']) {
        $_SESSION['ranking'] = $rank; // Store the current user's rank in session
    }

    echo "<tr>
            <td>{$rank}</td>
            <td>{$row['user_id']}</td>
            <td>{$row['first_name']}</td>
            <td class='badge-container'>{$row['total_score']}
                <span class='badge badge-light ml-2'>🧁
                    <span class='badge-message'>Sweet score!</span>
                </span>
            </td>
          </tr>";
    $rank++;
}
mysqli_close($con);
?>

            </tbody>
        </table>
    </div>
    <div class="upgrade-btn d-flex justify-content-center mt-5">
    <a href="instructions.php">
                    <button  class="btn-upgrade" align-item="center">Upgrade to Premium to Access Leaderboard</button>
    </a>
            </div>
    
</body>
</html>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40; /* Dark background for tech theme */
            color: #ffffff; /* Light text for contrast */
            font-family: Arial, sans-serif;
        }

        h1 {
            margin-bottom: 20px;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
        }

        .badge-message {
            display: none;
            position: absolute;
            background-color: #f8f9fa;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 5px;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .badge-container {
            position: relative;
            display: inline-block;
            padding: 10px;
        }

        .badge-container:hover .badge-message {
            display: inline-block;
        }

        .badge-container:hover .badge {
            background-color: #007bff;
            color: black;
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

        .upgrade-btn {
        margin-top: 30px;
        text-align: center; /* Centers the button horizontally */
    }

    .btn-upgrade {
        font-size: 18px;
        padding: 10px 20px;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }

    .btn-upgrade:hover {
        background-color: #218838;
    }
        /* Table styles */
        .table {
            background-color: #495057; /* Darker background for table */
            border-radius: 10px;
            overflow: hidden;
        }

        .table th, .table td {
            color: #ffffff; /* White text for table */
            transition: background 0.3s; /* Smooth transition for hover */
        }

        .table tr:hover {
            background-color: #007bff; /* Change color on row hover */
        }

        /* Animation for loading rows */
        .table tr {
            opacity: 0; /* Initial opacity */
            transform: translateY(20px); /* Slide effect */
            animation: fadeIn 0.5s forwards; /* Fade in animation */
        }

        @keyframes fadeIn {
            to {
                opacity: 1; /* Final opacity */
                transform: translateY(0); /* Final position */
            }
        }

        /* Delay animation for each row */
        .table tr:nth-child(1) { animation-delay: 0s; }
        .table tr:nth-child(2) { animation-delay: 0.1s; }
        .table tr:nth-child(3) { animation-delay: 0.2s; }
        .table tr:nth-child(4) { animation-delay: 0.3s; }
        .table tr:nth-child(5) { animation-delay: 0.4s; }
        /* Add more delays as needed */
    </style>
    <title>Leaderboard</title>
</head>
<body>
    
