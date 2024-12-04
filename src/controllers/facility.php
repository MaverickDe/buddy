<?php
namespace App\Controllers;
// session_start();

require_once  __DIR__  .'/control.php';

use App\Controller;


class FacilityController  extends Controller
{
public $facilitymodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->facilitymodel=$facilitymodel;
    }

    public function view()
    {

        // $id = $_GET['id'] ?? 1;  // Retrieves 'John'
     
        if (isset($_GET['id'])) {
            $facilityId = $_GET['id'];
            echo $facilityId;
            // $facility = Facility::getFacilityById($facilityId);  // Assuming a method exists to get facility data
            $facility =  $this->facilitymodel->findOne([["id"=>$facilityId]]);
        $_SESSION['facility'] = $facility  ;
        } else {
            die("Facility ID not provided.");
        }

    //    $facilities =  $this->facilitymodel->find([[],$page]);
    //    $_SESSION['page'] =       $page;
        
  
        
        
        
        $this->render('facility');
    }
}?>