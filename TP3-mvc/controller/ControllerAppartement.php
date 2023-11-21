<?php

RequirePage::model('CRUD');
RequirePage::model('Appartement');
RequirePage::library('Validation');

class ControllerAppartement extends controller {

    public function index(){

        $Appart = new Appartement;
        $select = $Appart->select('idAppartement', 'ASC');
        return Twig::render('appart-index.php', ['apparts'=>$select]);     
    }

    public function create(){

        if ($_SESSION['Type_idType'] == 1) {

            $Appart = new Appartement;
            return Twig::render('appart-create.php');
        }else{
            $Appart = new Appartement;
            return Twig::render('appart-create.php');
        }

    }

    public function store(){
        
        $validation = new Validation;
        extract($_POST);

        $validation->name('Description')->value($Description)->max(100)->min(10);
        $validation->name('Adresse')->value($Adresse)->min(10);
        $validation->name('NombreChambre')->value($NombreChambre)->min(1);
        $validation->name('NombreSalleDeBain')->value($NombreSalleDeBain)->min(1);
        $validation->name('Surface')->value($Surface)->min(1);
        $validation->name('Prix')->value($Prix)->min(1);

        if (!$validation->isSuccess()) {
            $errors = $validation->displayErrors();
            return Twig::render('appart-create.php', ['errors' =>$errors, 'Appartement' => $_POST]);
        } else {
            $Appart = new Appartement;
            $insert = $Appart->insert($_POST);  
            RequirePage::url('appartement/index');
        }
   
    }

    public function edit($id){

        $Appart = new Appartement;
        $selectId = $Appart->selectId($id);
        return Twig::render('appart-edit.php', ['appart'=>$selectId]);
    }

    public function update(){

        if ($_SESSION['Type_idType'] !== 1) {
            RequirePage::url('error');
            die();
        }

        $validation = new Validation;
        extract($_POST);
        $validation->name('Description')->value($Description)->max(100)->min(10);
        $validation->name('Adresse')->value($Adresse)->min(1);
        $validation->name('NombreChambre')->value($NombreChambre)->min(1);
        $validation->name('NombreSalleDeBain')->value($NombreSalleDeBain)->min(1);
        $validation->name('Surface')->value($NombreSalleDeBain)->min(1);
        $validation->name('Prix')->value($NombreSalleDeBain)->min(1);

        if (!$validation->isSuccess()) {
            $errors = $validation->displayErrors();
            return Twig::render('appart-create.php', ['errors' =>$errors, 'appart' => $_POST]);
        } else {
            $Appart = new Appartement;
            $update = $Appart->update($_POST);
            RequirePage::url('appartement/index');
        }
    }

    public function destroy(){
        
        $Appart = new Appartement;
        $update = $Appart->delete($_POST['id']);
        RequirePage::url('appartement/index');
    }
}

?>