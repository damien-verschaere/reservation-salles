<?php

class Utilisateur{

    private $_id;
    public $_login;
    public $_password ;

public function __construct(){
    $this->_id;
    $this->_login;
    $this->_password;
}
public function connexion(){
    $con='root';
    $pass='';
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles',$con , $pass);
        return $bdd;
    }
    catch (PDOException $e ) {
        print "Erreur ! : " . $e-> getMessage()."<br>";
    die();
    }
}

function register($login,$password){
    if (isset($_POST['sub'])) {
        if (empty($login) || empty($password)) {
            echo "veuillez remplir tout les champs !";
        }
        elseif ($password != $_POST['Vpass']) {
            echo "les MDP ne correspondent pas !";
        }
        elseif (!empty($login)) {
            $veriflogin=$this->connexion()->prepare("SELECT login FROM utilisateurs WHERE login=?");
            $veriflogin->bindValue(1,$login,PDO::PARAM_STR);
            $veriflogin->execute();
            $result= $veriflogin->fetch();
            if ($result) {
                echo "le login existe deja !!";
            }
        
        
            else {
                $log=htmlspecialchars($login);
                $hash=htmlspecialchars(password_hash($password,PASSWORD_DEFAULT));
                $statement= $this->connexion() -> prepare('INSERT INTO utilisateurs (login,password) VALUES ( :login,:password)');
                $statement->bindParam(':login',$log ,PDO::PARAM_STR);
                $statement->bindParam(':password',$hash,PDO::PARAM_STR);
                $statement->execute();  
                header('location: connexion.php');
                echo "merde ça marche pas !!!!";

            }
        }
        

    }
    
} 
function connexion_user($login,$password){
    $log=htmlspecialchars($login);
    $connexion_user=$this->connexion()->prepare("SELECT * FROM utilisateurs WHERE login=:login");
    $connexion_user->bindValue(':login',$log,PDO::PARAM_STR);
    $connexion_user->execute();
    $user=$connexion_user->fetch(PDO::FETCH_ASSOC);
    
    if (!empty($user)) {
        if(password_verify($password,$user['password']) == $user['password']) {
            $this->_id=$user['id'];
            $this->_login=$user['login'];
            $this->_password=$user['password'];
            session_start();
            $_SESSION['user']=[
                'id'=>$this->_id,
                'login'=>$this->_login,
            ];
            var_dump($_SESSION['user']);
            echo $_SESSION['user']['login'];
            header('Location: ../index.php');

            exit;
        }
        else {
            echo "mauvais login ou mdp ";
        }
    }
   
}


function modifier_profil($login,$password){
    if (isset($_POST['update'])) {
       $id=$_SESSION['user']['id'];
        if (empty($login) ) {
            echo "veuillez remplir le champ Login !";
        }
        elseif (empty($password)) {
            $log=htmlspecialchars($login);
            $update_user=$this->connexion()->prepare("UPDATE utilisateurs SET login = :login   WHERE id =$id");
            $update_user->bindValue(':login',$log,PDO::PARAM_STR);
            $update_user->execute();
            if ($update_user->execute()) {
                $newlog=$this->connexion()->prepare("SELECT * FROM utilisateurs WHERE id=$id");
                $newlog->execute();
                $user=$newlog->fetchAll(PDO::FETCH_ASSOC);
                var_dump($user);
                if (isset($user)) {
                    $_SESSION['user']=$user[0];
                    var_dump( $_SESSION);
                    echo "update ok2";
                } 
            }
            else {
                echo "update fail ";
            }
        }
        else {
            
            $log=htmlspecialchars($login);
            $hash=htmlspecialchars(password_hash($password,PASSWORD_DEFAULT));
            $update_user=$this->connexion()->prepare("UPDATE utilisateurs SET login = :login ,password = :password  WHERE id =$id");
            $update_user->bindValue(':login',$log,PDO::PARAM_STR);
            $update_user->bindValue(':password',$hash,PDO::PARAM_STR);
            $update_user->execute();
            if ($update_user->execute()) {
            $newlog=$this->connexion()->prepare("SELECT * FROM utilisateurs WHERE id=$id");
            $newlog->execute();
            $user=$newlog->fetchAll(PDO::FETCH_ASSOC);
            var_dump($user);
            if (isset($user)) {
                $_SESSION['user']=$user;
                var_dump( $_SESSION ['user']['login']);
                echo "update ok2";
            }
        
        else {
            echo "update fail ";
        }
        
    }   
 
    }


}
}
public function deconnexion(){
    session_start();
    session_unset();
    session_destroy();
    header('location: ../index.php');
}
}



