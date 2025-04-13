<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url("images/5.jfif");
            background-size: 100%;
            padding-top: 50px;
        }
        .xyz {
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            font-family: 'Century Schoolbook', serif;
            color: white;
        }
        .aks {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            font-family: 'Lucida Handwriting', cursive;
            color: white;
        }
        .cha {
            font-family: 'Stencil', serif;
            text-align: center;
            font-size: 50px;
            color: white;
        }
        .btn-custom {
            height: 50px;
            font-size: 18pt;
            width: 300px;
            text-align: center;
            background-color: white;
            color: black;
            font-family: 'Lucida Handwriting', cursive;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom:hover {
            background-color: black;
            color: white;
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

        
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="" method="post" class="bg-dark p-5 rounded">
                    <div class="aks"><img src="images/logo.png" height="75px" width="150px" alt="IQ Logo"> Elevate Your Thinking,Enhance Your Thinking</div>
                    <br>
                    <div class="cha">SIGN UP</div><br>
                    <div class="form-group xyz">
                        <input type="text" name="first" placeholder="-Enter First Name-" class="form-control" required>
                    </div>
                    <div class="form-group xyz">
                        <input type="text" name="last" placeholder="-Enter Last Name-" class="form-control" required>
                    </div>
                    <div class="form-group xyz">
                        <input type="email" name="email" placeholder="-Enter Email-" class="form-control" required>
                    </div>

                    <div class="form-group xyz">
                        <input type="password" name="pass" placeholder="-Enter Password-" class="form-control" required>
                    </div>
                    <div class="form-group xyz">
                        <input type="submit" name="getit" value="SIGN UP" class="btn btn-custom">
                    </div>
                </form>
                <br>
                <div class="form-group xyz">
                    <input type="button" name="log" value="START TEST" class="btn btn-custom" onclick="startTest()">
                </div>
            </div>
        </div>
    </div>

    


    <?php
if (isset($_POST["log"])) {
    header("Location: http://localhost/proskillmind/p2.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "test");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["getit"])) {
    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];


    // Prepare the SQL statement with the updated fields (first and last name separated)
    $ins = mysqli_query($con, "INSERT INTO free (first, last, Email, Password) VALUES ('$first', '$last', '$email', '$pass')");
    
    if ($ins) {
        echo "<script>alert('YOU HAVE BEEN SUCCESSFULLY REGISTERED, PLEASE CLICK ON START TEST TO CONTINUE')</script>";
    } else {
        echo "<script>alert('Error in record..! Sorry')</script>";
    }
}
// session_start(); // Start session
// $_SESSION['email'] = $userEmail; // Store user email in session
// $_SESSION['first'] = $userFirstName; // Store first name
// $_SESSION['last'] = $userLastName; // Store last name

?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function startTest() {
        	alert("Thank you for signing up. please login to start the test!.");
            window.location.href = "http://localhost/proskillmind/p2.php";
        }

        document.querySelector('.toggle-nav').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });

    </script>
</body>
</html>