<?php

class ControllerHome extends Controller {

    public function index(){
      
        return Twig::render('home.php');
    }

    public function error(){
        return Twig::render('error/page404.html');
    }

}

?>