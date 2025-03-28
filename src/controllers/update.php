<?php

namespace App\Controllers;


require_once  __DIR__  .'/control.php';

use App\Controller;


class UpdateFacilityController  extends Controller
{
public $facilitymodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->facilitymodel=$facilitymodel;
    }

    public function update()
    {


        if (!isset($_SESSION['loggedin']) ) {
            header('Location: /ecobuddy/login');
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   


 
            
            $requiredFields = ["id"];

            if (array_diff_key(array_flip($requiredFields), $_POST)) {
                die ("Id is missing");
            } 
          
                $id = $_POST['id'];


                if (isset($_POST["id"])) {
                    unset($_POST["id"]);
                }

                if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Manager') {
                    if (!empty($_POST)) {
                        $status = $_POST["status"] ?? null; 
                        
                        $_POST = ["status" => $status]; 
                    }
                    
                }
        
                // $photo = $_FILES['photo']['name'];
            
            
                // if ($photo) {
                //     move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/'.$photo);
                //     $sql = "UPDATE ecofacilities SET title='$title', category='$category', description='$description', location='$location', latitude='$latitude', longitude='$longitude', status='$status', photo='$photo' WHERE id='$id'";
                // } else {
                //     $sql = "UPDATE ecofacilities SET title='$title', category='$category', description='$description', location='$location', latitude='$latitude', longitude='$longitude', status='$status' WHERE id='$id'";
                // }
            
    
                $this->facilitymodel->update([$_POST,["id"=>$id]]);


            //    $_SESSION['facilities'] = $facilities;
            header("Location: /ecobuddy/facility?id=$id");
            exit; // Always include exit after header to stop script execution
            
         
        
        
        
        
    


        
}
    $this->render('update');
}

}


?>
