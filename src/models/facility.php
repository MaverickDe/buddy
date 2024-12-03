

<?php
require_once __DIR__"/db.php"
class Facility extends DB {



    public function __construct() {
      
        $this->create()
      
    }
    public  function findAll($data) {
        // Database connection
        [$filter,$page] =  $data
        
        $query = $db->query(
            
            "SELECT * FROM facilities
            -- WHERE 
            -- LIMIT
            -- OFFSET
            
            
            
            ");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}



public  function  create(){



    $sql = "CREATE TABLE IF NOT EXISTS facilities (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    category TEXT,
    address TEXT,
    latitude REAL,
    longitude REAL
)"

$pdo->exec($sql);
}




public  find($filter){


    // id



}



public static create(){


    
$pdo = new PDO("sqlite:ecoBuddy.db");
$stmt = $pdo->prepare("INSERT INTO facilities (name, category, address, latitude, longitude) VALUES (?, ?, ?, ?, ?)");
$stmt->execute(['Recycling Bin', 'Waste Management', '123 Eco Street', 40.7128, -74.0060]);


}




?>
