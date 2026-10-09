<?php
include '../../dealerConfig/config.php';
require_once '../../classes/BaseModel.php';
require_once '../../classes/Database.php';
require_once '../../classes/DealerSide.php';
date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST
header('Content-Type: application/json'); // Ensure the response is JSON formatted

$database = new Database();
$db = $database->getConnection();
$dealerSide = new DealerSide($db);
$response = ['status' => 'error', 'message' => 'Unknown error']; // Default response

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $callnumber = date('YmdHi') . mt_rand(10, 99);
        $createdate = date('Y-m-d H:i:s');
        $callstatus = "New";
        $createby_distributor_id = $_SESSION['distributor_id'];;
        $createby_distributoruser_id = $_SESSION['distributoruser_id'];;
        

        // Sanitize and validate input data
        $customername = htmlspecialchars(strip_tags($_POST['customerName']));
        $customermobileno = htmlspecialchars(strip_tags($_POST['customerPhoneNumber']));
        $customeraddress = htmlspecialchars(strip_tags($_POST['customerAddress']));
        $customercity = htmlspecialchars(strip_tags($_POST['customerCity']));
        $calltype = htmlspecialchars(strip_tags($_POST['complaintType']));
        $serviceWorkType = htmlspecialchars(strip_tags($_POST['serviceWorkType']));
        $calldate = htmlspecialchars(strip_tags($_POST['complaintDate']));
        $customerproblem = htmlspecialchars(strip_tags($_POST['complaintDescription']));

        // Validate required fields
        if (empty($customername) || empty($customermobileno) || empty($customeraddress) || empty($customercity) || empty($calltype) || empty($calldate) || empty($customerproblem) || empty($createby_distributor_id) || empty($createby_distributoruser_id)) {
            throw new Exception("All fields are required.");
        }

        $createdate = date('Y-m-d H:i:s');

        // Data array
        $data = [
            'callnumber' => $callnumber,
            'customername' => $customername,
            'customermobileno' => $customermobileno,
            'customeraddress' => $customeraddress,
            'customercity' => $customercity,
            'calltype' => $calltype,
            'serviceworktype' => $serviceWorkType,
            'calldate' => $calldate,
            'callstatus' => $callstatus,
            'createdate' => $createdate,
            'createby_distributor_id' => $createby_distributor_id,
            'createby_distributoruser_id' => $createby_distributoruser_id,
            'customerproblem' => $customerproblem
        ];

        // Attempt to register the complaint
        if ($dealerSide->registerComplaint($data)) {
            $response = ['status' => 'success', 'class' => 'bg-success', 'title' => 'Added', 'subtitle' => 'Success', 'body' => 'Complaint Added successfully'];
        } else {
            throw new Exception("Failed to register Complaint.");
        }
    } else {
        throw new Exception("Invalid request method.");
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage(); // Capture and return any error message
}

echo json_encode($response); // Return the response as JSON
