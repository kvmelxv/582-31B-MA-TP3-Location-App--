<?php

class RequirePage {

    static public function model($model){
        return require_once('model/'.$model.'.php');
    }

    static public function library($library){
        return require_once('library/'.$library.'.php');
    }

    static public function header($title){
        return '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$title.'</title>
                <link rel="stylesheet" href="'.PATH_DIR.'css/style.css">
            </head>
            <nav>
            <ul>
                <li><a href="'.PATH_DIR.'">Home</a></li>
                <li><a href="'.PATH_DIR.'client">Client</a></li>
                <li><a href="'.PATH_DIR.'client/create">Client Create</a></li>

            </ul>
        </nav>
        ';
    }

    static public function url($url){
        header('location:'.PATH_DIR.$url);
    }
}


?>