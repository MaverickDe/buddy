<?php
class DB {

    



    public function __construct(
        $schema,$tbname
    ) {

        $this->schema = $schema
        $this->tbname = $tbname
        $this->$db = new PDO('mysql:host=localhost;dbname=ecoBuddy', 'username', 'password');
        $this->createTable();
       
    }

private function createTable(){


    $conditions = [];
    foreach ($this->schema as $key => $value) {
        $conditions[] = "$key  {$this->schema[$key]}"; // Creates 'column = :column' for each filter
    }
    $sql .= implode(" , ", $conditions); // Combine conditions with AND

    $sqlcreate = "CREATE TABLE IF NOT EXISTS {$this->tbname} (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
    {$sql}"

}
}


public function find($data){

        
// Input array with multiple key-value pairs

[$filter , $page ] = $data
// $filters = [
//     "category" => "recycling",
//     "status" => "active",
//     "location" => "downtown"
// ];

try {
    // Connect to the database
    // $pdo = new PDO('sqlite:ecoBuddy.db'); // Replace with your actual database
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the base SQL query
    $sql = "SELECT * FROM facilities WHERE ";

    // Dynamically build the WHERE clause with placeholders
    $conditions = [];
    foreach ($filters as $key => $value) {
        $conditions[] = "$key = :$key"; // Creates 'column = :column' for each filter
    }
    $sql .= implode(" AND ", $conditions); // Combine conditions with AND

    // Prepare the statement
    $stmt = $this->pdo->prepare($sql);

    // Bind each value to its placeholder
    foreach ($filters as $key => $value) {
        $stmt->bindValue(":$key", $value); // Binds the value securely
    }

    // Execute the query
    $stmt->execute();

    // Fetch and display the results
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     print_r($row); // Replace with formatted output if needed
    // }

    $row = $stmt->fetch(PDO::FETCH_ASSOC)

    return $row
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}



    }





    



    //

    //delete

    //create


    //update
}
?>
