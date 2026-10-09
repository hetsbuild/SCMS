<?php
require_once '../../dealerConfig/config.php';
session_start();
session_unset();
session_destroy();
header('Location: ' . BASE_URL . 'login.php');

?>