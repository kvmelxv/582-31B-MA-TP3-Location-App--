<?php

RequirePage::model('CRUD');
RequirePage::model('File');

class ControllerFile extends Controller {


    public function index(){

        if ($_SESSION['Type_idType'] == 1 || $_SESSION['Type_idType'] == 2 ) {
            return Twig::render('uploadFile/upload.php');  
            
        }else {
            RequirePage::url('error');
            die();
        }
  
    }

    public function uploadImg(){


        if(isset($_FILES['file'])){
            $tmpName = $_FILES['file']['tmp_name'];
            $name = $_FILES['file']['name'];
            $size = $_FILES['file']['size'];
            $error = $_FILES['file']['error'];
        
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));
        
            $extensions = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 400000;
        
            if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        
                $uniqueName = uniqid('', true);
                //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                $file = $uniqueName.".".$extension;
                //$file = 5f586bf96dcd38.73540086.jpg

                $fileModel = new File();
                $fileModel->insert(['name' => $file]);
        
                Twig::render('uploadFile/upload.php', ['errors' => 'Votre fichier a bien été enregistrer']);
            }
            else{
                Twig::render('uploadFile/upload.php', ['errors' => 'Une erreur est survenue']);
            }
        }

    }

}

?>