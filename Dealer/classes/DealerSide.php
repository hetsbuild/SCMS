<?php
require_once 'BaseModel.php';

class DealerSide extends BaseModel
{
    protected $table = "servicecall";


    // Get total number of records (for pagination) with distributor user ID condition
    public function getTotalRecords($distributorUserId)
    {
        $query = "SELECT COUNT(*) AS total FROM $this->table WHERE `createby_distributoruser_id` = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $distributorUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // Get the number of filtered records (for search functionality) with distributor user ID condition
    public function getFilteredRecords($searchValue, $distributorUserId)
    {
        $searchValue = "%$searchValue%";
        $query = "SELECT COUNT(*) AS total 
                FROM $this->table 
                WHERE `createby_distributoruser_id` = ?
                AND (`callnumber` LIKE ? 
                OR `customername` LIKE ? 
                OR `customermobileno` LIKE ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isss", $distributorUserId, $searchValue, $searchValue, $searchValue);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    // Get paginated records based on start, length, search value, and sorting with distributor user ID condition
    public function getPaginatedComplaints($start, $length, $searchValue, $orderColumn = 'id', $orderDir = 'asc', $distributorUserId)
    {
        $searchValue = "%$searchValue%";
        $query = "SELECT id, callnumber, customername, customermobileno, customeraddress, calltype, callstatus, customerproblem
                FROM $this->table
                WHERE `createby_distributoruser_id` = ?
                AND (`callnumber` LIKE ? 
                OR `customername` LIKE ? 
                OR `customermobileno` LIKE ?)
                ORDER BY $orderColumn $orderDir
                LIMIT ?, ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isssii", $distributorUserId, $searchValue, $searchValue, $searchValue, $start, $length);
        $stmt->execute();
        $result = $stmt->get_result();
        $complaints = [];
        while ($row = $result->fetch_assoc()) {
            $complaints[] = $row;
        }
        return $complaints;
    }

    public function getComplaintById($id, $distributorUserId)
    {
        //$query = "SELECT * FROM $this->table WHERE id = ? AND `createby_distributoruser_id` = ?";
        $query = "SELECT sc.*, 
       CONCAT(su.firstname, ' ', su.lastname) AS technician_name
FROM servicecall sc
LEFT JOIN servicecenteruser su ON sc.technicianassigned = su.id
WHERE sc.id = ? AND sc.createby_distributoruser_id = ?;";
        

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $id, $distributorUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    // Method to register a new complaint
    public function registerComplaint($data)
    {
        return $this->create($data);
    }
}
