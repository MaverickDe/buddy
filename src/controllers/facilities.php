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
        foreach ($_GET as $key => $value) {
            // $conditions[] = " $key = :$key "; 
            if(trim($value) !=="" && trim($key)!="page"){
                $conditions[$key] = $value; 

            }
        }


       $facilities =  $this->facilitymodel->find([$conditions,$page]);
       $_SESSION['facilities'] = $facilities;
       $_SESSION['page'] =       $page;
        
  
        
        
        
        $this->render('facilities');
    }
}?>