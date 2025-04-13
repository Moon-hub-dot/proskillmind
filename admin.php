<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Block</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("images/1.jfif");
            background-size: cover;
            background-repeat: no-repeat;
            padding-top: 50px;
        }

        .header-title {
            text-align: center;
            font-size: 50px;
            font-weight: bold;
            font-family: 'Century Schoolbook', serif;
            color: white;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-in-out;
        }

        .admin-title {
            font-family: 'Lucida Handwriting', cursive;
            text-align: center;
            font-size: 70px;
            font-weight: bold;
            color: darkred;
            margin-bottom: 20px;
        }

        .search-input {
            margin-bottom: 20px;
        }

        .table thead th {
            background-color: #343a40;
            color: white;
        }

        .table tbody tr {
            color: white;
            background-color: #6c757d;
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #495057;
        }

        /* Navigation styles */
        #navMenu {
            display: none;
            position: absolute;
            top: 70px;
            left: 10px;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #navMenu a {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #343a40;
            font-size: 16px;
            transition: background 0.3s ease, color 0.3s ease;
        }

        #navMenu a:hover {
            background: #f0f0f0;
            color: #007bff;
        }

        .toggle-nav {
            cursor: pointer;
            font-size: 35px;
            position: absolute;
            top: 20px;
            left: 10px;
            transition: transform 0.3s;
        }

        .toggle-nav:hover {
            transform: rotate(90deg);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Links -->
    <div class="toggle-nav">➡️</div>
    <div id="navMenu">
        <a href="http://localhost/proskillmind/p1.php">Home</a>
        <a href="http://localhost/proskillmind/p3.php">Sign Up</a>
        <a href="http://localhost/proskillmind/pr.php">Result</a>
        <a href="http://localhost/proskillmind/p4.php">Admin</a>
        <a href="http://localhost/proskillmind/p2.php">Start Test</a>
    </div>

    <div class="container">
        <div class="header-title"><img src="brainbound-iq-high-resolution-logo.png" height="75px" width="150px" alt="IQ Logo"></div>
        <div class="admin-title">Administrator Block</div>
        
        <!-- Admin Actions -->
        <div class="text-center my-4">
            <form id="recordForm" method="post">
                <button type="submit" name="log1" class="btn btn-dark btn-lg">Show All Records</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#addUserModal">Add User</button>
<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#updateUserModal">Update User</button>
<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#deleteUserModal">Delete User</button>

            </form>
        </div>

        <!-- Add User Form -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" method="post">
                    <div class="form-group">
                        <label for="addEmail">Email</label>
                        <input type="email" class="form-control" id="addEmail" name="addEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="addPassword">Password</label>
                        <input type="password" class="form-control" id="addPassword" name="addPassword" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submitAddUser">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update User Form -->
<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUserModalLabel">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateUserForm" method="post">
                    <div class="form-group">
                        <label for="updateEmail">Email</label>
                        <input type="email" class="form-control" id="updateEmail" name="updateEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="updatePassword">New Password</label>
                        <input type="password" class="form-control" id="updatePassword" name="updatePassword" required>
                    </div>
                    <button type="submit" class="btn btn-warning" name="submitUpdateUser">Update User</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete User Form -->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteUserForm" method="post">
                    <div class="form-group">
                        <label for="deleteEmail">Email</label>
                        <input type="email" class="form-control" id="deleteEmail" name="deleteEmail" required>
                    </div>
                    <button type="submit" class="btn btn-danger" name="submitDeleteUser">Delete User</button>
                </form>
            </div>
        </div>
    </div>
</div>


        <input class="form-control search-input" id="searchInput" type="text" placeholder="Search...">
        <table class="table table-bordered table-striped" id="recordTable">
            <thead>
                <tr>
                    <th onclick="sortTable(0)">EMAIL</th>
                    <th onclick="sortTable(1)">PASSWORD</th>
                    <th onclick="sortTable(2)">TOTAL</th>
                    <th onclick="sortTable(3)">GRADE</th>
                    <th onclick="sortTable(4)">Q1</th>
                    <th onclick="sortTable(5)">Q2</th>
                    <th onclick="sortTable(6)">Q3</th>
                    <th onclick="sortTable(7)">Q4</th>
                    <th onclick="sortTable(8)">Q5</th>
                    <th onclick="sortTable(9)">Q6</th>
                    <th onclick="sortTable(10)">Q7</th>
                    <th onclick="sortTable(11)">Q8</th>
                    <th onclick="sortTable(12)">Q9</th>
                    <th onclick="sortTable(13)">Q10</th>
                </tr>
            </thead>
            <tbody>
               <?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "test");

// Ensure connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add User
if (isset($_POST["submitAddUser"])) {
    $email = mysqli_real_escape_string($con, $_POST['addEmail']);
    $password = mysqli_real_escape_string($con, $_POST['addPassword']);
    $query = "INSERT INTO free (email, password) VALUES ('$email', '$password')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('User added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding user: " . mysqli_error($con) . "');</script>";
    }
}

// Update User
if (isset($_POST["submitUpdateUser"])) {
    $email = mysqli_real_escape_string($con, $_POST['updateEmail']);
    $newPassword = mysqli_real_escape_string($con, $_POST['updatePassword']);
    $query = "UPDATE free SET password='$newPassword' WHERE email='$email'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('User updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating user: " . mysqli_error($con) . "');</script>";
    }
}

// Delete User
if (isset($_POST["submitDeleteUser"])) {
    $email = mysqli_real_escape_string($con, $_POST['deleteEmail']);
    $query = "DELETE FROM free WHERE email='$email'";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('User deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting user: " . mysqli_error($con) . "');</script>";
    }
}

// Fetch and display records (existing code)
if (isset($_POST["log1"])) {
    // SQL query to fetch data from the result table
    $query = "SELECT email, password, score, grade, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10 FROM free";
    $result = mysqli_query($con, $query);

    // Fetch and display data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['password']}</td>";
        echo "<td>{$row['score']}</td>";
        echo "<td>{$row['grade']}</td>";
        echo "<td>{$row['q1']}</td>";
        echo "<td>{$row['q2']}</td>";
        echo "<td>{$row['q3']}</td>";
        echo "<td>{$row['q4']}</td>";
        echo "<td>{$row['q5']}</td>";
        echo "<td>{$row['q6']}</td>";
        echo "<td>{$row['q7']}</td>";
        echo "<td>{$row['q8']}</td>";
        echo "<td>{$row['q9']}</td>";
        echo "<td>{$row['q10']}</td>";
        echo "</tr>";
    }
}
?>

            </tbody>
        </table>
        <div class="text-center">
            <a href="http://localhost/iq testing/p1.php" style="color:white">Home</a>
        </div>
    </div>

    <!-- JavaScript for search and sort functionality -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function () {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.getElementById('recordTable');
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = 'none'; // Initially hide all rows
                td = tr[i].getElementsByTagName('td');
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = ''; // Show matched rows
                            break; // Stop the inner loop
                        }
                    }
                }
            }
        });

        // Sort table function
        function sortTable(n) {
            var table, rows, switching, i, x, y, dir, switchcount = 0;
            table = document.getElementById("recordTable");
            switching = true;
            dir = "asc"; 
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    var shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir === "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir === "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount === 0 && dir === "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }

        // Toggle navigation menu
        document.querySelector('.toggle-nav').onclick = function () {
            var navMenu = document.getElementById('navMenu');
            navMenu.style.display = (navMenu.style.display === 'block') ? 'none' : 'block';
        };
    </script>
</body>

</html>
