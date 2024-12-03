<?php
namespace App\Controllers;
require_once  __DIR__  .'/../models/schema.php';
require_once  __DIR__  .'/control.php';

use App\Controller;

class FacilitiesController extends Controller
{
    public function index()
    {

        // $facilitymodel->test();
        echo $facilitymodel;

        $this->render('facilities');
    }
}?>