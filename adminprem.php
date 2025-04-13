<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error);
    header('Content-Type: application/json');
}

// Fetch dynamic data from the database
// Get the total number of users
$user_count_query = "SELECT COUNT(*) AS total_users FROM register";
$user_count_result = $conn->query($user_count_query);
$user_count = $user_count_result->fetch_assoc()['total_users'];

// Get the total number of tests (assuming you have a 'tests' table)
$test_count_query = "SELECT COUNT(*) AS total_tests FROM question";
$test_count_result = $conn->query($test_count_query);
$test_count = $test_count_result->fetch_assoc()['total_tests'];

// Get the total number of results (assuming you have a 'results' table)
$result_count_query = "SELECT COUNT(*) AS total_results FROM result";
$result_count_result = $conn->query($result_count_query);
$result_count = $result_count_result->fetch_assoc()['total_results'];

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Body */
        body {
            background-color: #1e1e2f;
            color: white;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #25253b;
            padding-top: 20px;
            position: fixed;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .sidebar ul {
            list-style-type: none;
        }

        .sidebar ul li {
            margin: 20px 0;
            text-align: center;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            display: block;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #353567;
            border-radius: 8px;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 40px;
            width: 100%;
            min-height: 100vh;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            color: #f39c12;
        }

        .header h1 {
            font-size: 2.5em;
        }

        /* Dashboard Section */
        .dashboard {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .stat-card {
            background-color: #32324e;
            width: 30%;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: #f39c12;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.5);
        }

        .stat-card h3 {
            font-size: 1.5em;
            color: #fff;
            margin-bottom: 10px;
        }

        .stat-card p {
            font-size: 2.5em;
        }

        /* Power BI Section */
        .powerbi {
            margin-top: 40px;
            color: white;
            text-align: center;
        }

        .powerbi h2 {
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        #powerbi-container {
            width: 100%;
            height: 600px;
            background-color: #28283a;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        /* Button Style */
        button {
            padding: 10px 15px;
            background-color: #f39c12;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #e67e22;
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="adminprem.php">Dashboard</a></li>
            <li><a href="manage_users.php">Users</a></li>
            <li><a href="manage_tests.php">Questions</a></li>
            <li><a href="view_result_details.php">Results</a></li>
            <li><a href="i.php">Home</a></li>
            <!-- <li><a href="powerbi_dashboard.php">Power BI Dashboard</a></li> -->
        </ul>
    </div>

    <div class="content">
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>

        <!-- Dashboard Section -->
        <div class="dashboard">
            <div class="stat-card">
                <h3>Users</h3>
                <p><?php echo $user_count; ?></p> <!-- Dynamic user count -->
            </div>
            <div class="stat-card">
                <h3>Questions</h3>
                <p><?php echo $test_count; ?></p> <!-- Dynamic test count -->
            </div>
            <div class="stat-card">
                <h3>Results</h3>
                <p><?php echo $result_count; ?></p> <!-- Dynamic result count -->
            </div>
        </div>

        <!-- Power BI Embed
        <div class="powerbi">
            <h2>Power BI Dashboard</h2>
            <div id="powerbi-container"></div>
        </div>
    </div>

    <script src="https://cdn.powerbi.com/libs/powerbi-client/2.19.0/powerbi.min.js"></script>
    <script>
        var embedConfig = {
            type: 'report',
            tokenType: powerbi.models.TokenType.Embed,
            accessToken: 'your-embed-token',
            embedUrl: 'https://app.powerbi.com/reportEmbed?reportId=your-report-id',
            permissions: powerbi.models.Permissions.All,
            viewMode: powerbi.models.ViewMode.View,
            settings: {
                filterPaneEnabled: false,
                navContentPaneEnabled: false
            }
        };
        var container = document.getElementById('powerbi-container');
        powerbi.embed(container, embedConfig);
        
    </script> -->
</body>
</html>
