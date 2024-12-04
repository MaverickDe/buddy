<?php

namespace App\Controllers;


require_once  __DIR__  .'/control.php';

use App\Controller;


class CreateFacilityController  extends Controller
{
public $facilitymodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->facilitymodel=$facilitymodel;
    }

    public function create()
    {


        if ($_SESSION['userType'] != 'Manager') {
            header('Location: adminlogin');
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$photo);
         
            
            $this->facilitymodel->create($_POST);
            //    $_SESSION['facilities'] = $facilities;
            header('Location: facilities/?page=1');
         
        
        
        
        
        }

        $page = $_GET['page'] ?? 1;  // Retrieves 'John'
     


        
        
    //     $this->render('facilities');
    }
}


?>
