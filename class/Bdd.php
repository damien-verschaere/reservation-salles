<?php 



class Bdd {

private $_bdd;

public function __construct($bdd){

    $this->_bdd=$bdd;

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

}