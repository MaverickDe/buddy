<?php
namespace App\Controllers;
// session_start();

require_once  __DIR__  .'/control.php';

use App\Controller;


class FacilitiesController  extends Controller
{
public $facilitymodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->facilitymodel=$facilitymodel;
    }

    public function view()
    {


    

        $page = $_GET['page'] ?? 1;  // Retrieves 'John'

        $conditions = [];
        $values = [];

        if (isset($_GET['page'])) {
            unset($_GET['page']);
        }
        foreach ($_GET as $key => $value) {
            // $conditions[] = " $key = :$key "; 
            $trimmedValue = trim($value);
            if($trimmedValue !=="" && $trimmedValue!="page"){
                $conditions[] = " $key LIKE :$key "; 
                $values[$key] = "%$trimmedValue%"; 

            }
        }
    
$cond= count($conditions) ?  [$conditions,$values]:null;


       $facilities =  $this->facilitymodel->find(["cond"=>$cond,"page"=>$page]);
       $_SESSION['facilities'] = $facilities;
       $_SESSION['page'] =       $page;
        
  
        
        
        
        $this->render('facilities');
    }
}?>