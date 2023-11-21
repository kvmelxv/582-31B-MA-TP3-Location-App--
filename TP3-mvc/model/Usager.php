<?php

class Usager extends CRUD {

    protected $table = 'utilisateur';
    protected $primaryKey = 'Username';

    protected $fillable = ['Username', 'Nom', 'Prenom', 'Courriel', 'Telephone', 'Password', 'TempPassword', 'Type_idType'];


    public function checkuser($username, $password = null) {

        $sql = "SELECT * FROM $this->table WHERE Username = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($username));
        $count = $stmt->rowCount();

        if ($count === 1) {
            $salt = "uUip7@";
            $saltPassword = $password.$salt;
            $user_info = $stmt->fetch();

            if($password != null){

                if (password_verify($saltPassword, $user_info['Password'])){ 

                    $id = session_regenerate_id(); 
                    $_SESSION['Username'] = $user_info['Username'];
                    $_SESSION['Type_idType'] = $user_info['Type_idType'];
                    $_SESSION['Nom'] = $user_info['Nom'];
                    $_SESSION['Prenom'] = $user_info['Prenom'];
                    
                    // Enregistrement du journal
                    $_SESSION['IP'] = $_SERVER['REMOTE_ADDR'];
                    date_default_timezone_set('America/Toronto');
                    $_SESSION['Date'] = date('Y-m-d H:i:s');
                    $_SESSION['PageVisited'] = $_SERVER['REQUEST_URI'];
                    $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'] .  $_SERVER['REMOTE_ADDR']);

                    RequirePage::url('home');
                    exit();

                }else {

                    return Twig::render('authentification/login.php', ['errors' =>$errors="<ul><li>Verifier votre mot de passe</li></ul>"]);
                    exit();
                }

            }else {

                $tempPassword = uniqid();
                $usager['Username'] = $user_info['Username'];
                $usager['tempPassword'] = $tempPassword;
                $this->update($usager);

                $lien = "newPassword?usager=".$user_info['Username']."&temp=$tempPassword";
                var_dump($lien);
                header('Location: ' . $lien);
                exit();

            }

        }else{

            $errors = "<ul><li>Verifier le username</li></ul>";
            return $errors; 
        }
    }

    public function checkTempPassword($username, $tempPassword){
        $sql = "SELECT * FROM $this->table WHERE Username = ? AND tempPassword = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array( $username, $tempPassword));
        $count = $stmt->rowCount();
        return $count;
    }


}

?>