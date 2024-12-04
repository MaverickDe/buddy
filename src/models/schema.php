<?php 

// title, category,description,adress,city,postal_code,latitude,longitude,status,manager
require_once __DIR__."/facility.php";
require_once __DIR__."/user.php";

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
$userschema = [
    
    "userType"=>'VARCHAR(50)  DEFAULT "user" ',
    "username"=>"VARCHAR(50) NOT NULL UNIQUE",
    "password"=>"TEXT",
    "loggedin"=>"BOOLEAN DEFAULT false"


];

$usermodel = new User(
    
    $userschema
    
    ,"user");

;


?>