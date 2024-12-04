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
        $conditions[] = "$key  {$this->schema[$key]}"; 
    }
 $sql = implode(" , ", $conditions); 

    $sqlcreate = "CREATE TABLE IF NOT EXISTS {$this->tbname} (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
    {$sql})";

    // echo $sqlcreate;
$this->db->exec($sqlcreate);

}


public function find($data)
{
require_once __DIR__."/../helpers/const.php";


[$filters , $page ] = $data;


try {

    $offset =  ($page -1)* $PERPAGE;
    $limit = $PERPAGE + $PERADDEDPAGE;


    $sql = "SELECT * FROM {$this->tbname}  ";

    if(count($filters)){
        $sql.="WHERE";
    }

    $conditions = [];
    foreach ($filters as $key => $value) {
        $conditions[] = " $key = :$key "; 
    }
    $sql .= implode(" AND ", $conditions); 
    $sql .= " ORDER BY id DESC ";
       $sql .= " LIMIT :limit OFFSET :offset";



    $stmt = $this->db->prepare($sql);

  
    foreach ($filters as $key => $value) {
        $stmt->bindValue(":$key", $value); 
    }

    $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

echo  $sql;

    $stmt->execute();



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
        


[$filters  ] = $data;
// $filters = [
//     "category" => "recycling"
   
// ];

try {


    $sql = "SELECT * FROM {$this->tbname}  ";

    if(count($filters) >0){
        $sql.="WHERE";
    }

 
    $conditions = [];
    foreach ($filters as $key => $value) {
        $conditions[] = " $key = :$key "; 
    }  
    $sql .= implode(" AND ", $conditions); 

    $stmt = $this->db->prepare($sql);


    foreach ($filters as $key => $value) {
        $stmt->bindValue(":$key", $value); 
    }

    $stmt->execute();

   
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // echo $row;

    return $row;
} catch (PDOException $e) {
    // echo "Database error: " . $e->getMessage();
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
        $conditions[] = " $key "; // Creates 'column = :column' for each filter
    }  
    $sql .=  " ( "  . implode(" , ", $conditions)  . " ) ";
    if(count($data) >0){
        $sql.="VALUES";
    }
    
    $conditionsdata = [];
    foreach ($data as $key => $value) {
        $conditionsdata[] = "  :$key "; // Creates 'column = :column' for each filter
    }  
    $sql .=  " ( "  . implode(" , ", $conditionsdata)  . " ) ";


    $stmt = $this->db->prepare($sql);

    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value); 
    }


    $stmt->execute();


} catch (PDOException $e) {
    // echo "Database error: " . $e->getMessage();
}



    }
    public function delete($data)
{
require_once __DIR__."/../helpers/const.php";
        


try {

    $sql = "DELETE FROM {$this->tbname} ";



 

    // Dynamically build the WHERE clause with placeholders
    if(count($data) >0){
        $sql.="WHERE";
    }
    $conditions = [];
    foreach ($data as $key => $value) {
        $conditions[] = " $key = :$key "; // Creates 'column = :column' for each filter
    }  
    $sql .=  implode(" AND ", $conditions)  ;
    

    $stmt = $this->db->prepare($sql);


    foreach ($data as $key => $value) {
        $stmt->bindValue(":$key", $value); 
    }

  

    $stmt->execute();

} catch (PDOException $e) {
    // echo "Database error: " . $e->getMessage();
}



    }
    public function update($data)
{
require_once __DIR__."/../helpers/const.php";
        


[$values, $filter  ] = $data;




try {

    $sql = "UPDATE  {$this->tbname} SET ";



 

    // Dynamically build the WHERE clause with placeholders

    $conditions = [];
    foreach ($values as $key => $value) {
        $conditions[] = " $key = :val$key "; // Creates 'column = :column' for each filter
    }  
    $sql .=  implode(" , ", $conditions)  ;
    $sql .=  " WHERE "  ;
    $conditionsdata = [];
    foreach ($filter as $key => $value) {
        $conditionsdata[] = " $key = :$key "; // Creates 'column = :column' for each filter
    }  
    $sql .=  implode(" , ", $conditionsdata)  ;
    


    $stmt = $this->db->prepare($sql);

  
    foreach ($values as $key => $value) {
        $stmt->bindValue(":val$key", $value); // Binds the value securely
    }
    foreach ($filter as $key => $value) {
        $stmt->bindValue(":$key", $value); // Binds the value securely
    }

  

    $stmt->execute();

 
} catch (PDOException $e) {
    // echo "Database error: " . $e->getMessage();
}



    }





    




}
?>
