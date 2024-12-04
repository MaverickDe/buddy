<?php


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
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
    {$sql})";

    // echo $sqlcreate;
$this->db->exec($sqlcreate);

}


public function find($data)
{
require_once __DIR__."/../helpers/const.php";
        
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

    // echo ($offset);
    // echo ($offset);
    // echo ($limit);
    // echo ($page);
    // Connect to the database
    // $pdo = new PDO('sqlite:ecoBuddy.db'); // Replace with your actual database
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the base SQL query
    $sql = "SELECT * FROM {$this->tbname}  ";

    if(count($filters)){
        $sql.="WHERE";
    }

    // Dynamically build the WHERE clause with placeholders
    $conditions = [];
    foreach ($filters as $key => $value) {
        $conditions[] = " $key = :$key "; // Creates 'column = :column' for each filter
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

echo  $sql;
    // Execute the query
    $stmt->execute();

    // Fetch and display the results
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     echo($row); // Replace with formatted output if needed
    // }

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo $row;

    return $row;
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}



    }


    public function findOne($data)
{
require_once __DIR__."/../helpers/const.php";
        
// Input array with multiple key-value pairs

[$filters  ] = $data;
// $filters = [
//     "category" => "recycling"
   
// ];

try {


    $sql = "SELECT * FROM {$this->tbname}  ";

    if(count($filters) >0){
        $sql.="WHERE";
    }

    // Dynamically build the WHERE clause with placeholders
    $conditions = [];
    foreach ($filters as $key => $value) {
        $conditions[] = " $key = :$key "; // Creates 'column = :column' for each filter
    }  
    $sql .= implode(" AND ", $conditions); 
// echo $sql;
    // Prepare the statement
    $stmt = $this->db->prepare($sql);

    // Bind each value to its placeholder
    foreach ($filters as $key => $value) {
        $stmt->bindValue(":$key", $value); // Binds the value securely
    }

  
// echo  $sql;
    // Execute the query
    $stmt->execute();

    // Fetch and display the results
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     echo($row); // Replace with formatted output if needed
    // }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo $row;

    return $row;
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}



    }
    public function create($data)
{
require_once __DIR__."/../helpers/const.php";
        
// Input array with multiple key-value pairs

// [$filters  ] = $data;
// $filters = [
//     "category" => "recycling"
   
// ];

try {


    $sql = "INSERT INTO  {$this->tbname}  ";

 

    // Dynamically build the WHERE clause with placeholders
    $conditions = [];
    foreach ($data as $key => $value) {
        $conditions[] = " $key = :$key "; // Creates 'column = :column' for each filter
    }  
    $sql .=  " ( "  . implode(" , ", $conditions)  . " ) ";
    if(count($data) >0){
        $sql.="VALUES";
    }
    
    $conditionsdata = [];
    foreach ($data as $key => $value) {
        $conditionsdata[] = " $key = :$key "; // Creates 'column = :column' for each filter
    }  
    $sql .=  " ( "  . implode(" , ", $conditionsdata)  . " ) ";


// echo $sql;
    // Prepare the statement
    $stmt = $this->db->prepare($sql);

    // Bind each value to its placeholder
    foreach ($filters as $key => $value) {
        $stmt->bindValue(":$key", $value); // Binds the value securely
    }

  
// echo  $sql;
    // Execute the query
    $stmt->execute();

    // Fetch and display the results
    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     echo($row); // Replace with formatted output if needed
    // }

    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo $row;

    // return $row;
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
