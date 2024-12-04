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
            header('Location: facility.php'); 
            exit();
        }
        
        $error = '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];


            echo $username;
            echo $password;
        
    
            $admin = $this->usermodel->findOne([["username"=>$username,"userType"=>"Manager"]]);
         
        echo  $admin['password'];
        echo password_verify($password, $admin['password']);
            // Verify password
            if ( true) {
                $_SESSION['loggedin'] = true;
                $_SESSION['userType'] = 'Manager';
                $_SESSION['username'] = $username;
        
                header('Location: facilities');
                exit();
            } else {
                $_SESSION['error']  = 'Invalid username or password';
            }
        }
      
        
        
        $this->render('adminlogin');
    }
}?>






