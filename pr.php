<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("images/4.jfif");
            background-size: 100%;
            padding-top: 20px;
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
        .cha {
            font-family: 'Stencil', sans-serif;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
        }
        .xy {
            font-family: 'Stencil', sans-serif;
            text-align: right;
            font-size: 30px;
            font-weight: bold;
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
    <title>Quiz Application</title>
</head>
<body>
<?php
                        $con = mysqli_connect("localhost", "root", "", "test");

                        if (!$con) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        if (isset($_POST["log"])) {
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $query = "SELECT q1, q2, q3 FROM free WHERE email = '$email' AND password = '$pass'";
                            $result = mysqli_query($con, $query);
                            $correctAnswers = 0;

                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                if ($row['q1'] == '6') $correctAnswers++;
                                if ($row['q2'] == '36') $correctAnswers++;
                                if ($row['q3'] == '15') $correctAnswers++;
                                
                           
 // Redirect to result page
        header("Location: http://localhost/proskillmind/result.php ?email=$email&correctAnswers=$correctAnswers");
        exit();
    } else {
        echo "<script>alert(Invalid login credentials)</script>";
    }
}

mysqli_close($con);
?>
   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <form action="" method="post" onsubmit="showSpinner()">
                            <div class="aks"> <img src="images/logo.png" height="75px" width="150px" alt="IQ Logo"></div>
                            <br>
                            <div class="cha">Result</div>
                            <br>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Registered Email ID" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pass" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="log" class="btn btn-dark btn-lg">Log In</button>
                            </div>
                            <div class="text-center">
                                <a href="http://proskillmind/iq testing/frgt.php" class="text-dark">Forget Password? (click here to continue)</a>
                            </div>
                        </form>
                        <div id="spinner" class="text-center" style="display:none;">
                            <div class="spinner-border text-primary" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        function showSpinner() {
            document.getElementById('spinner').style.display = 'block';
        }
        //  document.querySelector('.toggle-nav').addEventListener('click', function() {
        //     const navMenu = document.getElementById('navMenu');
        //     navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        // });

    </script>
</body>
</html>