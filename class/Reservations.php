<?php 

class Reservation{

    private $_id;
    public $_titre;
    public $_descritpion;
    public $_debut;
    public $_fin;
    private $_id_utilisateur;


public function __construct(){
    $this->_id;
    $this->_titre;
    $this->_descritpion;
    $this->_debut;
    $this->_fin;
    $this->_id_utilisateur;  
     
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
public function reservation($titre,$description,$debut,$fin,$id){

        if (isset($_POST['reservation'])) {
            if (empty($titre) || empty($description)|| empty($debut)||empty($fin)) {
                echo "veuillez remplir tous les champs !!";
            }
            else {
                $title=htmlspecialchars(trim($titre));
                $describe=htmlspecialchars(trim($description));
                $id=$_SESSION['user']['id'];
                $currenttime = $_POST['date'];
                $newtime = strtotime($currenttime . "+1hours");
                $fin = date('Y-m-d H:i', $newtime) ;
                $query_reservation=$this->connexion()->prepare('INSERT INTO reservations (titre,description,debut,fin,id_utilisateur) VALUES (?,?,?,?,?)');
                $query_reservation->bindParam(1,$title,PDO::PARAM_STR);
                $query_reservation->bindParam(2,$describe,PDO::PARAM_STR);
                $query_reservation->bindParam(3,$debut,PDO::PARAM_STR);
                $query_reservation->bindParam(4,$fin,PDO::PARAM_STR);
                $query_reservation->bindParam(5,$id,PDO::PARAM_INT);
                
                $query_reservation->execute();
            }
        }
}

public function affichage_resa(){

    $affichage=$this->connexion()->prepare('SELECT * FROM reservations ');
    $affichage->execute();
    foreach ($affichage as $key ) {
     echo "jour de la semaine " .date('w',strtotime($key['debut']))."<br>";
     echo $key['fin']."<br>";
     echo "nous somme le jour ".date('d/m/y \à\ H:m:s ',strtotime($key['debut']));
    $jour_semaine=array(0=>'dimanche',1=>'lundi',2=>'mardi',3=>'mercredi',4=>'jeudi',6=>'vendredi',7=>'samedi');
    
     

    }
}

}


