<?php

require_once __DIR__."/../helpers/const.php";
class DB {

    public $schema;
    public $tbname;
    public $db;



    public function __construct(
        $schema,$tbname
    ) {

        $this->db = new PDO('mysql:host=localhost;dbname=ecoBuddy', 'root', '12345678');
        $this->schema = $schema;
        $this->tbname = $tbname;
        // $this->$db = new PDO('mysql:host=localhost;dbname=ecoBuddy', 'username', 'password');
        $this->createTable();
       
    }

    public function test(){


        echo "testing db";

    }

private function createTable(){


    $conditions = [];
    foreach ($this->schema as $key => $value) {
        $conditions[] = "$key  {$this->schema[$key]}"; // Creates 'column = :column' for each filter
    }
 $sql = implode(" , ", $conditions); // Combine conditions with AND

    $sqlcreate = "CREATE TABLE IF NOT EXISTS {$this->tbname} (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
    {$sql}";


}


public function find($data){

        
// Input array with multiple key-value pairs

[$filters , $page ] = $data;
// $filters = [
//     "category" => "recycling",
//     "status" => "active",
//     "location" => "downtown"
// ];

try {

    $offset =  ($page -1)* $PERPAGE;
    $limit = $PERPAGE + $PERADDEDPAGE;
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
       $sql .= " LIMIT :limit OFFSET :offset";


    // Prepare the statement
    $stmt = $this->db->prepare($sql);

    // Bind each value to its placeholder
    foreach ($filters as $key => $value) {
        $stmt->bindValue(":$key", $value); // Binds the value securely
    }

    $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);


    // Execute the query
    $stmt->execute();

    // Fetch and display the results
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     print_r($row); // Replace with formatted output if needed
    // }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
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
