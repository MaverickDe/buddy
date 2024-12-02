<?php

namespace App;

class Control
{
    protected function render($view, $data = [])
    {
        extract($data);

        include "Views/$view.php";
    }
}