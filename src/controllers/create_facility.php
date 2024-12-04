


<?php
namespace App\Controllers;
// session_start();

require_once  __DIR__  .'/control.php';

use App\Controller;


class CreateFacilityController  extends Controller
{
public $facilitymodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->facilitymodel=$facilitymodel;
    }

    public function view()
    {


        if ($_SESSION['role'] != 'admin') {
            header('Location: login.php');
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            
            $this->facilitymodel->create($_POST);
            //    $_SESSION['facilities'] = $facilities;
            header('Location: facilities.php?page=1');
         
        
        
        
        
        }

        $page = $_GET['page'] ?? 1;  // Retrieves 'John'
     


       $facilities =  $this->facilitymodel->find([[],$page]);
       $_SESSION['facilities'] = $facilities;
       $_SESSION['page'] =       $page;
        
  
        
        
        
        $this->render('facilities');
    }
}?>
