<?php
require_once 'BaseModel.php';
class Dashboard
{
  private $conn;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Fetch count of new complaints
  public function getNewComplaintCount()
  {
    $query = "SELECT COUNT(*) as count 
          FROM `servicecall` 
          WHERE `callstatus` = 'New' 
          AND `createby_distributoruser_id` = '" . $_SESSION['distributoruser_id'] . "'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['count'];
  }

  // Fetch count of assigned complaints
  public function getAssignedComplaintCount()
  {
    $query = "SELECT COUNT(*) as count 
          FROM `servicecall` 
          WHERE `callstatus` = 'Assigned' 
          AND `createby_distributoruser_id` = '" . $_SESSION['distributoruser_id'] . "'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['count'];
  }

  // Fetch count of active complaints (New and Assigned)
  public function getActiveComplaintCount()
  {
    $query = "SELECT COUNT(*) as count 
          FROM `servicecall` 
          WHERE `callstatus` IN ('New', 'Assigned') 
          AND `createby_distributoruser_id` = '" . $_SESSION['distributoruser_id'] . "'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['count'];
  }

  // Fetch count of assigned complaints
  public function getCloseComplaintCount()
  {
    $query = "SELECT COUNT(*) as count 
          FROM `servicecall` 
          WHERE `callstatus` = 'Close' 
          AND `createby_distributoruser_id` = '" . $_SESSION['distributoruser_id'] . "'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['count'];
  }

  // Fetch count of assigned complaints
  public function getTodaysComplaintCount()
  {
    $query = "SELECT COUNT(*) as count 
                  FROM `servicecall` 
                  WHERE DATE(calldate) = CURDATE()
                  AND `createby_distributoruser_id` = '" . $_SESSION['distributoruser_id'] . "'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['count'];
  }

  // Fetch today's complaints with only complaint for dealeruser
  public function getTodaysComplaints()
  {
    $query = "SELECT `callnumber`, `customername`, `customermobileno`, `calltype`, `serviceworktype`, `callstatus` 
          FROM `servicecall` 
          WHERE DATE(calldate) = CURDATE() 
          AND `createby_distributoruser_id` = '" . $_SESSION['distributoruser_id'] . "'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }

  // Fetch Active complaints with only complaint number and customer name
  public function getActiveComplaints()
  {
    $query = "SELECT callnumber, customername, customermobileno, callstatus FROM servicecall 
              WHERE callstatus IN ('New', 'Assigned')
              AND `createby_distributoruser_id` = '" . $_SESSION['distributoruser_id'] . "'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  }
}
