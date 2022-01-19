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

public function afficheResa(DateTime $debut,DateTime $fin) : array{
    $afficheresa=$this->connexion()->prepare("SELECT * FROM reservations WHERE debut BETWEEN '{$debut->format('Y-m-d 00:00:00')}'AND '{$fin->format('Y-m-d 23:59:59')}'");
    var_dump($afficheresa);
    $afficheresa->execute();
    $result=$afficheresa->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

}


