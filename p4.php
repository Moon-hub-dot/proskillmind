<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Block</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("images/earth.png");
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
            font-size: 70px;
            font-weight: bold;
            font-family: 'Lucida Handwriting', cursive;
        }
        .abc {
            border-radius: 100%;
            width: 200px;
            height: 300px;
        }
        .cha {
            font-family: 'Stencil', serif;
            text-align: center;
            font-size: 70px;
            font-weight: bold;
        }
        .xy {
            font-family: 'Stencil', serif;
            text-align: right;
            font-size: 30px;
            font-weight: bold;
        }
        .btn-custom {
            height: 50px;
            font-size: 18pt;
            width: 200px;
            text-align: center;
            background-color: black;
            color: white;
            font-family: 'Lucida Handwriting', cursive;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom:hover {
            background-color: white;
            color: black;
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
<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "test");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['log'])) {
    $id = $_POST['id'];
    $pass1 = $_POST['pass1'];
    

    // Query to check if the employee is an admin
    $query = "SELECT *FROM admin WHERE admin_id='$id' AND PASSWORD='$pass1'";
    $result = mysqli_query($con, $query);
    
     if (mysqli_num_rows($result) > 0) {
        // Successful admin login
         header("location:admin.php");
         exit();
     } else {
         echo"<h1 style='color:red;position:relative;left:500px;top:700px;'>invalid try again</h1>";
     }
}
?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form  method="post" class="bg-dark p-5 rounded">
                    <div class="aks"><img src="images/logo.png" height="75px" width="150px" alt="IQ Logo"></div>
                    <br>
                    <div class="cha">Administrator Block</div>
                    <div class="form-group xyz">
                        <input type="text" name="id" placeholder="-Enter id-" class="form-control" required autocomplete="email">
                     </div>
                    <div class="form-group xyz">
                        <input type="password" name="pass1" placeholder="-Password-" class="form-control" required>
                    </div>
                    <div class="form-group xyz">
                        <input type="submit" name="log" value="Log In" class="btn btn-custom">
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>





    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    
    document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form from auto-submitting

        // Get form input values
        const id = document.querySelector('input[name="id"]').value;
        const pass1 = document.querySelector('input[name="pass1"]').value;

        // Optional client-side validation before sending to the server
        if (id.trim() === '' || pass1.trim() === '') {
            alert("Please fill in both fields.");
            return;
        }

      
     document.querySelector('.toggle-nav').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });

</script>

</body>
</html>