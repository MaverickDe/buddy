

<?php
require_once __DIR__."/db.php";
// require_once __DIR__."/../helpers/const.php";
require_once __DIR__."/../testdata/test.php";
class User extends DB  {
    
    
    public function __construct(     $schema,$tbname)
    {
        
        parent::__construct(     $schema,$tbname);
        //    $this->inserttestdata() ;
        
    }
    public function inserttestdata(){
        try {
        require_once __DIR__."/../helpers/const.php";
      
        
      
        $csvFile =  __DIR__."/../testdata/users.csv";
    
        if (($handle = fopen($csvFile, 'r')) !== false) {
           
            $header = fgetcsv($handle, 1000, ',');
            
    
            $stmt = $this->db->prepare("INSERT INTO {$this->tbname} (username, password,userType) VALUES (?, ?, ?)");
    
  
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $stmt->execute([
                    $row[1],password_hash($row[2],PASSWORD_DEFAULT), $row[3],
                   
            
            ]);
            }
            
            // Close the file
            fclose($handle);
            
            // echo "Data successfully inserted!";
        } else {
            // echo "Error opening the file.";
        }
    } catch (PDOException $e) {
        // echo "Database error: " . $e->getMessage();
    }
}


}


// public static create(){


    
// $pdo = new PDO("sqlite:ecoBuddy.db");
// $stmt = $pdo->prepare("INSERT INTO facilities (name, category, address, latitude, longitude) VALUES (?, ?, ?, ?, ?)");
// $stmt->execute(['Recycling Bin', 'Waste Management', '123 Eco Street', 40.7128, -74.0060]);


// }





?>












