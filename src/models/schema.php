<?php 

// title, category,description,adress,city,postal_code,latitude,longitude,status,manager
require_once __DIR__."/facility.php";
echo "test";
// namespace App\model\schema;
$facilityschema = [
    
    "title"=>"TEXT NOT NULL",
    "category"=>"TEXT",
    "description"=>"TEXT",
    "address"=>"TEXT",
    "city"=>"TEXT",
    "postal_code"=>"TEXT",
    "latitude"=>"TEXT",
    "longitude"=>"TEXT",
    "status"=>"TEXT",
    "manager"=>"TEXT",
    "photo"=>"TEXT"

];

$facilitymodel = new Facility(
    
    $facilityschema
    
    ,"facility");

;


?>