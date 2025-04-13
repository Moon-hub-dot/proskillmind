<?php
    session_start();
        $con = mysqli_connect("localhost", "root", "", "test");
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $invalid_login = false;
        if (isset($_POST["log"])) {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $ins = mysqli_query($con, "SELECT * FROM free WHERE EMAIL = '$email' AND Password = '$pass'");
            
            // If user found, redirect, otherwise set invalid_login flag
            if (mysqli_num_rows($ins) > 0) {
                session_start();
                $_SESSION['email'] = $email;
                echo("<script>alert('User found successfully!!')</script>");
                header("Location: http://localhost/proskillmind/ques.php");
                exit();
            } else {
                $invalid_login = true;
            }
        }
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: url("images/6.jfif");
            background-size: 100%;
            padding-top: 50px;
        }
        .xyz, .aks, .cha {
            text-align: center;
            font-family: century schoolbook;
        }
        .aks {
            font-size: 70px;
            font-weight: bold;
        }
        .cha {
            font-family: stencil;
            font-size: 30px;
        }
        .is-invalid {
            border-color: red !important;
        }
        .is-valid {
            border-color: blue !important;
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post" id="loginForm" class="border p-4 bg-light">
                    <div class="aks"><img src="images/logo.png" height="75px" width="150px" alt="IQ Logo"></div>
                    <center><i><b>-To know your IQ/ To start test you need to log in-<br><br></b></i></center>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="-Registered Email ID-">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" name="pass" class="form-control" placeholder="-Password-" id="passwordInput">
                            <div class="input-group-append">
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    👁️
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="log" value="Log In" class="btn btn-dark btn-lg" id="log">
                    </div>
                    <div class="form-group text-center">
                        <a href="http://localhost/proskillmind/frgt.php" class="btn btn-link">Forget Password? (click here to continue)</a>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="sign" value="Sign Up" class="btn btn-dark btn-lg" id="sign">
                    </div>
                    <div class="form-group text-center">
                        <i><b>Not a new user? (click to register yourself)</b></i>
                    </div>
                </form>
            </div>
        </div>
    </div>
   


    <script>
        window.onload = function() {
            alert('You need to log in to start the test.');
        };

        document.getElementById('sign').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission
            window.location.href = 'http://localhost/proskillmind/p3.php';
        });

        document.getElementById('loginForm').addEventListener('submit', function(event) {
            const email = document.querySelector('input[name="email"]');
            const pass = document.querySelector('input[name="pass"]');
            let valid = true;

            if (!email.value) {
                email.classList.add('is-invalid');
                valid = false;
            } else {
                email.classList.remove('is-invalid');
            }

            if (!pass.value) {
                pass.classList.add('is-invalid');
                valid = false;
            } else {
                pass.classList.remove('is-invalid');
            }

            if (!valid) {
                alert('Invalid user or password!')
                event.preventDefault(); // Prevent form submission if invalid
            }
        });


        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('passwordInput');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '🙈'; // Change icon based on visibility
        });

        document.querySelector('.toggle-nav').addEventListener('click', function() {
            const navMenu = document.getElementById('navMenu');
            navMenu.style.display = navMenu.style.display === 'none' || navMenu.style.display === '' ? 'block' : 'none';
        });

        <?php if ($invalid_login): ?>
            alert("Invalid Email or Password. Please try again.");
        <?php endif; ?>
    </script>
</body>
</html>