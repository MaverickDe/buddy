<?php
namespace App\Controllers;
require_once  __DIR__  .'/control.php';

use App\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $this->render('index');
    }
}