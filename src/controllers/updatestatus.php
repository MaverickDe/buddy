<?php

namespace App\Controllers;


require_once  __DIR__  .'/control.php';

use App\Controller;


class UpdateFacilityStatusController  extends Controller
{
public $facilitymodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->facilitymodel=$facilitymodel;
    }

    public function update()
    {


      
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   


 
            
           
          
                $id = $_POST['id'];


                if (isset($_POST["id"])) {
                    unset($_POST["id"]);
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
            header('Location: /ecobuddy/facilities/?page=1');
         
        
        
        
        
    


        
}
    $this->render('update');
}

}


?>
