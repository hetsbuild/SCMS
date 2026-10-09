<?php
require_once '../../config/config.php';
require_once '../../classes/Database.php';
require_once '../../classes/Servicecenteruser.php';
date_default_timezone_set('Asia/Kolkata'); // Set the timezone to IST
$database = new Database();
$db = $database->getConnection();
$servicecenteruser = new Servicecenteruser($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST['servicecenteruserId']) && isset($_POST['primaryMobile'])) {
            $id = intval($_POST['servicecenteruserId']);

            $primarymobileno = htmlspecialchars(strip_tags($_POST['primaryMobile']));
            $secondmobileno = htmlspecialchars(strip_tags($_POST['secondaryMobile']));
            $firstname = htmlspecialchars(strip_tags($_POST['firstName']));
            $lastname = htmlspecialchars(strip_tags($_POST['lastName']));
            $address = htmlspecialchars(strip_tags($_POST['address']));
            $city = htmlspecialchars(strip_tags($_POST['city']));
            $pass = htmlspecialchars(strip_tags($_POST['servicecenteruser_password']));
            $isActive = isset($_POST['isActive']) && $_POST['isActive'] === 'Y' ? 'Y' : 'N';
            $modifydate = date('Y-m-d H:i:s');

            $data = [
                'primarymobileno' => $primarymobileno,
                'secondmobileno' => $secondmobileno,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'address' => $address,
                'city' => $city,
                'password' => $pass,
                'isactive' => $isActive,
                'modifydate' => $modifydate
            ];

            if ($servicecenteruser->updateServicecenteruser($id, $data)) {
                echo json_encode([
                    'status' => 'success',
                    'class' => 'bg-warning',
                    'title' => 'Update',
                    'subtitle' => 'Success',
                    'body' => 'Servicecenteruser updated successfully'
                ]);
            } else {
                throw new Exception('Failed to update servicecenteruser.');
            }
        } else {
            throw new Exception('Missing required parameters.');
        }
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'class' => 'bg-danger',
            'title' => 'Update Error',
            'subtitle' => 'Error',
            'body' => $e->getMessage()
        ]);
    }
}
