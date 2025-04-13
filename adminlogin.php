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
            background-image: url("images/c842521432057a4d63c3aaae3c22e287456de0f879e499-gLiWH5.gif");
            background-size: cover;
            background-position: center;
            padding-top: 80px;
            color: #f4f4f4;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .title {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }
        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 60px; /* Increased padding for a larger div */
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }
        .form-group input {
            background: #333;
            border: 1px solid #555;
            color: #ffffff;
            border-radius: 4px;
        }
        .form-group input:focus {
            background: #222;
            border-color: #777;
            box-shadow: none;
        }
        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #ff4d4d;
            text-align: center;
            font-size: 16px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "test");
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $error_message = '';
    if (isset($_POST['log'])) {
        $id = $_POST['id'];
        $pass1 = $_POST['pass1'];
        $query = "SELECT * FROM admin WHERE admin_id='$id' AND PASSWORD='$pass1'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {
            header("location:adminprem.php");
            exit();
        } else {
            $error_message = "Invalid ID or Password. Please try again.";
        }
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8"> <!-- Changed from col-md-6 to col-md-8 for a larger container -->
                <div class="logo">
                    <img src="images/logo.png" alt="IQ Logo" height="75px" width="150px">
                </div>
                <div class="title">Administrator Sign In</div>
                <form method="post" class="form-container">
                    <div class="form-group">
                        <input type="text" name="id" placeholder="Enter ID" class="form-control" required autocomplete="email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass1" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="submit" name="log" class="btn btn-custom">Sign In</button>
                    <?php if ($error_message): ?>
                        <div class="error-message"><?php echo $error_message; ?></div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
