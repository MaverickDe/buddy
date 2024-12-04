<?php
namespace App\Controllers;
// session_start();

require_once  __DIR__  .'/control.php';

use App\Controller;


class LogoutController  extends Controller
{
public $usermodel;

   public function __construct(){
        require_once  __DIR__."/../models/schema.php";
        $this->usermodel=$usermodel;
    }

    public function logout()
    {
        session_unset();   // Unset all session variables
        session_destroy(); // Destroy the session
        
        header('Location: facilities');
      
        
        
        // $this->render('adminlogin');
    }
}?>






