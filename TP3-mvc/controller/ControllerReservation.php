<?php

RequirePage::model('CRUD');
requirePage::model('Reservation');
RequirePage::model('Appartement');
requirePage::model('Usager');
RequirePage::library('Validation');

class ControllerReservation extends controller {

    public function index(){

        if ($_SESSION['Type_idType'] == 1) {

            $book = new Reservation;
            $select = $book->select('DateDebut', 'ASC');
            return Twig::render('reserv-index.php', ['books'=>$select]);     
        }else {
            RequirePage::url('error');
            die();
        }

        
    }

    public function create(){

        $usager = new Usager;
        $Appart = new Appartement;
        $usersWithType1 = $usager->selectUsersWithType(1);
        $selectApp = $Appart->select('idAppartement', 'ASC');
        return Twig::render('reserv-create.php', ['usagers'=> $usersWithType1, 'apparts'=> $selectApp]);
    }

    public function store(){

        $validation = new Validation;
        extract($_POST);

        $validation->name('DateDebut')->value($DateDebut)->required()->pattern('date_ymd');
        $validation->name('DateFin')->value($DateFin)->required()->pattern('date_ymd');
        $validation->name('Utilisateur_Username')->value($Utilisateur_Username)->required();
        $validation->name('Appartement_idAppartement')->value($Appartement_idAppartement)->required();

        if (!$validation->isSuccess()) {
            $errors = $validation->displayErrors();
            return Twig::render('reserv-create.php', ['errors' =>$errors, 'Reservation' => $_POST]);
        } else {
            $reserv = new Reservation;
            $insert = $reserv->insert($_POST);  
            RequirePage::url('home');
        }
        
    }

    public function edit($id){
        
        $reserv = new Reservation;
        $usager = new Usager;
        $Appart = new Appartement;
        $selectId = $reserv->selectId($id);
        $usersWithType1 = $usager->selectUsersWithType(1);
        $selectApp = $Appart->select('idAppartement', 'ASC');
        return Twig::render('reserv-edit.php', ['reserv'=>$selectId, 'usagers'=> $usersWithType1, 'apparts'=> $selectApp]);
    }

    public function update(){

        $validation = new Validation;
        extract($_POST);

        $validation->name('DateDebut')->value($DateDebut)->required()->pattern('date_ymd');
        $validation->name('DateFin')->value($DateFin)->required()->pattern('date_ymd');
        $validation->name('Utilisateur_Username')->value($Utilisateur_Username)->required();
        $validation->name('Appartement_idAppartement')->value($Appartement_idAppartement)->required();

        if (!$validation->isSuccess()) {
            $errors = $validation->displayErrors();
            return Twig::render('reserv-create.php', ['errors' =>$errors, 'Reservation' => $_POST]);
        } else {
            $reserv = new Reservation;
            $update = $reserv->update($_POST);
            RequirePage::url('reservation/index'); 
        }
    }

    
    public function destroy(){
        
        $reserv = new Reservation;
        $update = $reserv->delete($_POST['id']);
        RequirePage::url('reservation/index');
    }
}

?>