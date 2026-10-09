
<?php

define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/SCMS/Dealer/');

// Start session at the top
session_start();

// Redirect to dashboard if the user is already logged in
if (isset($_SESSION['distributoruser_id'])) {
    header('Location: ' . BASE_URL . 'pages/dashboard.php');
    exit();
}

$conn = mysqli_connect("localhost", "root", "admin", "servicecenter");
date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST
// Handle connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['Login'])) {
    // Get the username and password from POST request
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate and sanitize input
    $username = trim(htmlspecialchars(strip_tags($username)));
    $password = trim(htmlspecialchars(strip_tags($password)));

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);



    // Prepare the SQL query
    $query = "
    SELECT 
        du.id AS distributoruser_id, 
        du.username AS distributoruser_username, 
        d.id AS distributor_id, 
        d.name AS distributor_name, 
        du.*, 
        d.isactive AS distributor_active
    FROM distributoruser du
    JOIN distributor d ON du.distributorid = d.id
    WHERE BINARY du.username = ? 
      AND du.isactive = 'Y' 
      AND d.isactive = 'Y'
";

    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching record is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the password matches
        if ($password == $user['userpassword']) {
            // Store the required data in the session
            $_SESSION['distributor_id'] = $user['distributor_id'];
            $_SESSION['distributor_name'] = $user['distributor_name'];
            $_SESSION['distributoruser_id'] = $user['distributoruser_id'];
            $_SESSION['distributoruser_username'] = $user['distributoruser_username'];

            // Redirect to dashboard
            header('Location: ' . BASE_URL . 'pages/dashboard.php');

        } else {
            echo "<script> alert('User Password not found') </script>";
        }
    } else {
        echo "<script> alert('User not found or inactive') </script>";
    }
}


?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dealer | Log in </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="../../assets/index2.html" class="h1"><b>Dealer Login</b>RSS</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form id="dealerLoginForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" novalidate>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="dealerUsername" name="username" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-at"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Please enter a valid Username.</div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="dealerPassword" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <span id="togglePasswordicon" class="fas fa-eye"></span>
                            </div>
                        </div>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">Please enter your password.</div>
                    </div>
                    <div class="row">
                        <div class="col-4 offset-8">
                            <button type="submit" name="Login" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

   <!-- jQuery -->
   <script src="<?php echo BASE_URL; ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo BASE_URL; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo BASE_URL; ?>assets/dist/js/adminlte.min.js"></script>
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            // Select the password input field
            var passwordField = document.getElementById('dealerPassword');
            var icon = document.getElementById('togglePasswordicon');;

            // Toggle the type attribute between 'password' and 'text'
            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>

</body>

</html>