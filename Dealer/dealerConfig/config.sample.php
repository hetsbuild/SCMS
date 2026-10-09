<?php
// Database configuration
// Copy this file to config.php and fill in your own credentials.
define('DB_HOST', 'localhost');
define('DB_NAME', 'servicecenter');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');

define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/SCMS/Dealer/');



session_start();

$timeout_duration = (60*10); // Set timeout duration to 30 seconds for testing

function checkSession() {
    global $timeout_duration;

    // Check if the session variables are set
    if (!isset($_SESSION['distributor_id']) || !isset($_SESSION['distributor_name']) || !isset($_SESSION['distributoruser_id']) || !isset($_SESSION['distributoruser_username'])) {
        // Redirect to login page if session variables are not set
        header('Location:' . BASE_URL . 'login.php');
        exit;
    }

    // Check for session timeout
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
        session_unset(); // Unset session variables
        session_destroy(); // Destroy the session

        // Set a timeout flag in the session
        $_SESSION['timeout_flag'] = true;

        // Output timeout response if requested via AJAX
        if (isset($_GET['check_timeout']) && $_GET['check_timeout'] == 1) {
            echo json_encode(['timeout' => true]);
            exit();
        }

        // Redirect to the login page for regular page loads
        header('Location: ' . BASE_URL . 'login.php');
        exit();
    }

    // Update the last activity time stamp
    $_SESSION['LAST_ACTIVITY'] = time();
}
checkSession();

// Function to set session messages
function setSessionMessage($type, $title, $subtitle, $body)
{
    $_SESSION['toast'] = [
        'class' => 'bg-' . $type,
        'title' => $title,
        'subtitle' => $subtitle,
        'body' => $body
    ];
}


// Function to display session messages
function displaySessionMessage($autohideTime = 5000)
{ // Default is 5000 milliseconds (5 seconds)
    if (isset($_SESSION['toast'])) {
        echo "<script>
            $(document).Toasts('create', {
                class: '{$_SESSION['toast']['class']}',
                title: '{$_SESSION['toast']['title']}',
                subtitle: '{$_SESSION['toast']['subtitle']}',
                body: '{$_SESSION['toast']['body']}',
                delay: $autohideTime,
                autohide: true
            });
        </script>";
        unset($_SESSION['toast']); // Clear the message after displaying it
    }
}