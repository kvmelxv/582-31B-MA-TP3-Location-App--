<?php

RequirePage::model('CRUD');
RequirePage::model('Usager');
RequirePage::library('Validation');

class ControllerLogin extends Controller {

    public function index(){
      
        Twig::render('authentification/login.php');
    }

    public function authentification() {
        $validation = new Validation;
        extract($_POST);
        $validation->name('Username')->value($Username)->max(50)->required();
        $validation->name('Password')->value($Password)->max(20)->min(8)->required();

        if(!$validation->isSuccess()){
            $errors =  $validation->displayErrors();
         return Twig::render('authentification/login.php', ['errors' =>$errors,  'usager' => $_POST]);
         exit();

        }

        $usager = new Usager;
        $checkuser = $usager->checkuser($_POST['Username'], $_POST['Password']);
    }

    public function logout() {
        session_destroy();
        RequirePage::url('home');
    }


    public function forgot(){
        Twig::render('authentification/forgot-pwd.php');
    }


    public function tempPass(){
        $validation = new Validation;
        extract($_POST);
        $validation->name('Username')->value($Username)->max(50)->required();
    
        if(!$validation->isSuccess()){
            $errors =  $validation->displayErrors();
         return Twig::render('authentification/forgot-pwd.php', ['errors' =>$errors,  'usager' => $_POST]);
         exit();
        }

        $usager = new usager;
        $checkUser = $usager->checkuser($_POST['Username']);
        
        //print_r( $checkUser);

        return Twig::render('authentification/forgot-pwd.php', ['errors' =>$checkUser,  'usager' => $_POST]);
        die();

    }

    public function newPassword() {
        
        $urlParts = parse_url($_SERVER['REQUEST_URI']);
        parse_str($urlParts['query'], $queryParams);
    
        if (isset($queryParams['usager']) && isset($queryParams['temp'])) {
            $user = $queryParams['usager'];
            $tempPassword = $queryParams['temp'];
    
            
            $usager = new Usager;
            $check = $usager->checkTempPassword($user, $tempPassword);
    
            if ($check == 1) {
                Twig::render('authentification/new-password.php', ['Username' => $user]);
            } else {
                Twig::render('authentification/forgot-pwd.php', ['errors' => 'Le lien de réinitialisation du mot de passe est invalide']);
            }
        } else {
            Twig::render('authentification/forgot-pwd.php', ['errors' => 'Les paramètres nécessaires sont manquants dans l\'URL']);
        }
    }

    public function newPasswordUpdate(){
 
        $validation = new Validation;
        extract($_POST);
        $validation->name('password')->value($password)->max(20)->min(8);
    
        if(!$validation->isSuccess()){
            $errors =  $validation->displayErrors();
         return Twig::render('authentification/new-password.php', ['errors' =>$errors, 'Username' => $_POST['Username']]);
         exit();
        }
 
             $usager = new Usager;
             
             $_POST['tempPassword'] = null;
             $options = [
                 'cost' => 10
             ];
             $salt = "uUip7@";
             $passwordSalt = $_POST['password'].$salt;
             $_POST['password'] =  password_hash($passwordSalt, PASSWORD_BCRYPT, $options);
            
             $usager->update($_POST);
             RequirePage::url('login');
     }




    
    

        

        

        
        




}

?>