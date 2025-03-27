<?php

namespace App\Controllers;


require_once  __DIR__  .'/control.php';

use App\Controller;


class DeleteFacilityController  extends Controller
{
public $facilitymodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->facilitymodel=$facilitymodel;
    }

    public function delete()
    {


        if ($_SESSION['userType'] != 'Manager') {
            // header('Location: adminlogin');
            header('Location: /ecobuddy/adminlogin');
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            echo "deleting";
            // $title = $_POST['title'];
            // $category = $_POST['category'];
            // $description = $_POST['description'];
            // $address = $_POST['address'];
        
            // $db = new SQLite3('database.db');
            // $stmt = $db->prepare("INSERT INTO facilities (title, category, description, address) VALUES (:title, :category, :description, :address)");
        
            // $stmt->bindValue(':title', $title);
            // $stmt->bindValue(':category', $category);
            // $stmt->bindValue(':description', $description);
            // $stmt->bindValue(':address', $address);
        
            // $stmt->execute();
            
            $this->facilitymodel->delete($_GET);
            //    $_SESSION['facilities'] = $facilities;
            header('Location: /ecobuddy/facilities/?page=1');
         
        
        
        
        
        }

        // $page = $_GET['page'] ?? 1;  // Retrieves 'John'
     


    //    $facilities =  $this->facilitymodel->find([[],$page]);
    //    $_SESSION['facilities'] = $facilities;
    //    $_SESSION['page'] =       $page;
        
  
        
        
        
        // $this->render('facilities');
    }
}


?>
