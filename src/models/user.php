

<?php
require_once __DIR__."/db.php";
require_once __DIR__."/../testdata/test.php";
class User extends DB  {


public function __construct(     $schema,$tbname)
{

    parent::__construct(     $schema,$tbname);
//    $this->inserttestdata() ;

}
public function inserttestdata(){
    try {
      
        
        // Path to the CSV file
        $csvFile =  __DIR__."/../testdata/ecofacilities_data.csv";
    
        // Open the CSV file for reading
        if (($handle = fopen($csvFile, 'r')) !== false) {
            // Read the header row (optional, depending on CSV format)
            $header = fgetcsv($handle, 1000, ',');
            
            // Prepare the SQL statement (modify according to your table structure)
            $stmt = $this->db->prepare("INSERT INTO {$this->tbname} (title, category,description,address,city,postal_code,latitude,longitude,status,manager) VALUES (?, ?, ?,?,?,?,?,?,?,?)");
    
            // Loop through the CSV rows and insert into the database
            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                $stmt->execute([
                    $row[1], $row[2], $row[3],
                    $row[4], $row[5], $row[6],
                    $row[7], $row[8], $row[9],
                    $row[10]
            
            ]);
            }
            
            // Close the file
            fclose($handle);
            
            echo "Data successfully inserted!";
        } else {
            echo "Error opening the file.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}


}


// public static create(){


    
// $pdo = new PDO("sqlite:ecoBuddy.db");
// $stmt = $pdo->prepare("INSERT INTO facilities (name, category, address, latitude, longitude) VALUES (?, ?, ?, ?, ?)");
// $stmt->execute(['Recycling Bin', 'Waste Management', '123 Eco Street', 40.7128, -74.0060]);


// }





?>












