<?php
require_once 'BaseModel.php';

class Servicecenteruser extends BaseModel
{
    protected $table = "servicecenteruser";

        // Get total number of records (for pagination)
        public function getTotalRecords()
        {
            $query = "SELECT COUNT(*) AS total FROM $this->table WHERE `roletype` = 'admin'";
            $result = $this->conn->query($query);
            $row = $result->fetch_assoc();
            return $row['total'];
        }
    
        // Get the number of filtered records (for search functionality)
        public function getFilteredRecords($searchValue)
        {
            $searchValue = "%$searchValue%";
            $query = "SELECT COUNT(*) AS total FROM $this->table 
                      WHERE `roletype` = 'admin' 
                      AND (`username` LIKE ? OR `firstname` LIKE ? OR `lastname` LIKE ? OR `primarymobileno` LIKE ? OR `secondmobileno` LIKE ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssss", $searchValue, $searchValue, $searchValue, $searchValue, $searchValue);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['total'];
        }
    
        // Get paginated records based on start, length, search value, and sorting
        public function getPaginatedServicecenterusers($start, $length, $searchValue, $orderColumn = 'id', $orderDir = 'asc')
        {
            $searchValue = "%$searchValue%";
            $query = "SELECT `id`, `username`, `primarymobileno`, `secondmobileno`, `firstname`, `lastname`, `address`, `city`, `isactive`, `lastlogindate`
                      FROM $this->table 
                      WHERE `roletype` = 'admin' 
                      AND (`username` LIKE ? OR `firstname` LIKE ? OR `lastname` LIKE ? OR `primarymobileno` LIKE ? OR `secondmobileno` LIKE ?)
                      ORDER BY $orderColumn $orderDir
                      LIMIT ?, ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssssii", $searchValue, $searchValue, $searchValue, $searchValue, $searchValue, $start, $length);
            $stmt->execute();
            $result = $stmt->get_result();
            $servicecenteruser = [];
            while ($row = $result->fetch_assoc()) {
                $servicecenteruser[] = $row;
            }
            return $servicecenteruser;
        }

    // Fetch all servicecenteruser with limited details
    public function getAllServicecenteruser()
    {
        $query = "SELECT 
                    `id`, 
                    `username`, 
                    `primarymobileno`, 
                    `secondmobileno`, 
                    `firstname`, 
                    `lastname`, 
                    `address`, 
                    `city`, 
                    `isactive` 
                  FROM $this->table 
                  WHERE `roletype` = 'admin'";
        $result = $this->conn->query($query);
        $servicecenteruser = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $servicecenteruser[] = $row;
            }
        }
        return $servicecenteruser;
    }

    // Fetch a single technician by ID
    public function getServicecenteruserById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Fetch all active servicecenteruser with basic details
    public function getServicecenteruser()
    {
        $query = "SELECT 
                    `id`, 
                    `firstname`, 
                    `lastname` 
                  FROM $this->table 
                  WHERE `roletype` = 'admin' 
                    AND `isactive` = 'Y'";
        $result = $this->conn->query($query);
        $servicecenteruser = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $servicecenteruser[] = $row;
            }
        }
        return $servicecenteruser;
    }

    // Register a new technician
    public function registerServicecenteruser($data)
    {
        return $this->create($data);
    }

    // Update an existing technician
    public function updateServicecenteruser($id, $data)
    {
        return $this->update($id, $data);
    }
}
