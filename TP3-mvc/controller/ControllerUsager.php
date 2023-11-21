<?php

RequirePage::model('CRUD');
RequirePage::model('Usager');
RequirePage::model('Type');
RequirePage::library('Validation');

class ControllerUsager extends controller {

    public function index(){

        if ($_SESSION['Type_idType'] == 1) {
            $usager = new Usager;
            $select = $usager->select('Nom', 'ASC');
            return Twig::render('usager-index.php', ['usagers'=>$select]);  

        }else {
            RequirePage::url('error');
            die();
        }

            
    }

    public function create(){

        if ($_SESSION['Type_idType'] == 1) {

            $type = new Type;
            $selectTypes = $type->select('type', '');
            return Twig::render('usager-create.php', ['types'=>$selectTypes]);
        }else {
            RequirePage::url('error');
            die();
        }  

    }

    public function store(){

        $validation = new Validation;
        extract($_POST);
        $validation->name('Username')->value($Username)->max(30)->min(10)->required();
        $validation->name('Password')->value($Password)->max(20)->min(8)->required();
        $validation->name('Nom')->value($Nom)->max(25)->min(3);
        $validation->name('Prenom')->value($Prenom)->max(25)->min(3);
        $validation->name('Courriel')->value($Courriel)->pattern('email');
        $validation->name('Telephone')->value($Telephone)->pattern('tel');
        $validation->name('Type_idType')->value($Type_idType)->required(); 

        if (!$validation->isSuccess()) {
            $errors =  $validation->displayErrors();
            $type = new Type;
            $selectTypes = $type->select('type', '');
         return Twig::render('usager-create.php', ['errors' =>$errors, 'type' => $selectTypes, 'usager' => $_POST]);
         exit();
        }

        $usager = new Usager;

        $options = [
            'cost' => 10
        ];

        $salt = "uUip7@";
        $passwordSalt = $_POST['Password'].$salt;
        $_POST['Password'] = password_hash($passwordSalt, PASSWORD_BCRYPT, $options);
        
        $insert = $usager->insert($_POST); 

        RequirePage::url('usager/index');
   
    }

    public function edit($Username){


        $usager = new Usager;
        $selectUsername = $usager->selectId($Username);
        $type = new Type;
        $selectTypes = $type->select('type', '');
        return Twig::render('usager-edit.php', ['usager'=>$selectUsername, 'types'=>$selectTypes]);
    }

    public function update(){

        if ($_SESSION['Type_idType'] !== 1) {
            RequirePage::url('error');
            die();
        }
        
        $usager = new Usager;
        $update = $usager->update($_POST);
        RequirePage::url('usager/index');
    }

    
    public function destroy(){

        
        $usager = new Usager;
        $update = $usager->delete($_POST['username']);
        RequirePage::url('usager/index');
    }
}

?>