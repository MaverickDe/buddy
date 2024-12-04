



<?php
namespace App\Controllers;
// session_start();

require_once  __DIR__  .'/control.php';

use App\Controller;


class AdminLoginController  extends Controller
{
public $usermodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->usermodel=$usermodel;
    }

    public function login()
    {

        if (isset($_SESSION['loggedin']) && $_SESSION['role'] == 'admin') {
            header('Location: admin_facility.php'); // Redirect if already logged in
            exit();
        }
        
        $error = '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
    
            $admin = $this->usermodel->findOne([["username"=>$username,"userType"=>"admin"]]);
         
        
            // Verify password
            if ($admin && password_verify($password, $admin['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['userType'] = 'admin';
                $_SESSION['username'] = $username;
        
                header('Location: facilities.php');
                exit();
            } else {
                $error = 'Invalid username or password';
            }
        }
      
        
        
        $this->render('adminlogin');
    }
}?>






