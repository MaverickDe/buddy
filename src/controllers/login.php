<?php
namespace App\Controllers;
// session_start();

require_once  __DIR__  .'/control.php';

use App\Controller;


class LoginController  extends Controller
{
public $usermodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->usermodel=$usermodel;
    }

    public function login()
    {

        if (isset($_SESSION['loggedin'])) {
            header('Location: facility.php'); 
            exit();
        }
        
        $error = '';
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];


        
        
    
            $user = $this->usermodel->findOne([["username"=>$username,"userType"=>"User"]]);
        
            // echo password_verify($password, $user['password']);
            // Verify password
            if (!$user) {
                die("User not found.");
            }
            if (  password_verify($password, $user['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['userType'] = 'User';
                $_SESSION['username'] = $username;
        
                header('Location: facilities');
                exit();
            } else {
                $_SESSION['error']  = 'Invalid username or password';
            }
        }
      
        
        
        $this->render('login');
    }
}?>






