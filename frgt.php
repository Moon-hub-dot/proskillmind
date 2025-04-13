<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            background-image: url("tech_1.gif");
            background-size: cover;
            padding-top: 80px;
            overflow: hidden;
        }
        .container {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }
        .header-text {
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            font-family: 'Century Schoolbook', serif;
            color: white;
        }
        .sub-text {
            text-align: center;
            font-size: 20px;
            color: #ffffff;
            margin-bottom: 30px;
        }
        .btn-dark {
            width: 100%;
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
    <!-- Navigation Links -->
    <div class="toggle-nav">➡️</div>
    <div id="navMenu">
        <a href="http://localhost/iq testing/p1.php">Home</a>
        <a href="http://localhost/iq testing/p3.php">Sign Up</a>
        <a href="http://localhost/iq testing/pr.php">Result</a>
        <a href="http://localhost/iq testing/leaderboard.php">Leaderboard</a>
        <a href="http://localhost/iq testing/profile.php">Profile</a>
        <a href="http://localhost/iq testing/p4.php">Admin</a>
        <a href="http://localhost/iq testing/p2.php">Start Test</a>
    </div>
    <div class="container">
        <div class="header-text"><img src="brainbound-iq-high-resolution-logo.png" height="75px" width="150px"></div>
        <div class="sub-text">To retrieve your password, enter the following details</div>

        <form action=" " method="post" id="passwordForm">
    <div class="form-group">
        <input type="text" name="first" class="form-control" placeholder="ENTER first name" required>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
    </div>
    <button type="submit" name="getit" class="btn btn-dark">Retrieve Password</button>
</form>

<?php

$con = mysqli_connect("localhost", "root", "", "project");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// Assuming you have already connected to your database using $con
if (isset($_POST["getit"])) {
    $first = $_POST["first"];
    $email = $_POST["email"];
    
    // Ensure connection is established
    if ($con) {
        $ins = mysqli_query($con, "SELECT PASSWORD FROM register WHERE EMAIL = '$email' AND FIRST ='$first'");
        $ar = mysqli_fetch_array($ins);
    if($ar !=  null)
{
    echo "<h2 style=color:white;>Your password:</h2>,<span style='color:yellow; font-size:20px;'>". $ar['PASSWORD']. "</span>";
}
else
{
    echo"you need to sign up first";   //echo"mysql error" to show which error is occuring
}
}
}
?>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

        document.querySelector('.toggle-nav').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });

    </script>
</body>
</html>
