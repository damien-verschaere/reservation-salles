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
    catch (Exception $e ) {
        print "Erreur ! : " . $e-> getMessage()."<br>";
    die();
    }
}

public function reservation($titre,$description,$debut,$fin,$id){
    
        if (isset($_POST['reservation'])) {
           $day=$_POST['date'];
          $heure= explode(';',explode('T',$day)[1])[0];


            if (empty($titre) || empty($description)|| empty($debut)||empty($fin)) {
                echo "veuillez remplir tous les champs !!";
            }
            elseif ($_POST['date']<date("Y-m-d")) {
            echo "veuillez choisir une date possible !!";
            }
            elseif ($heure < date('08:00')||$heure > date('18:00')) {
                echo "veuillez reserver  entre 08h00 et 18h00";
             
            }
       
            elseif(!empty($debut)){

                
                $verif_resa=$this->connexion()->prepare("SELECT * FROM reservations WHERE debut= '$day'");
                
                $verif_resa->execute();
                $result=$verif_resa->fetch();
                
                if ($result) {
                    echo "Le crenaux est deja reservé! ";
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
                header('location: ../index.php');
                
            }
           
        }
        
}
}


public function afficheResa($debut,$fin) : array {
    $pdo=$this->connexion();
    $sql="SELECT * FROM reservations WHERE debut BETWEEN '{$debut->format('Y-m-d 00:00:00')}'AND '{$fin->format('Y-m-d 23:59:59')}' ORDER BY debut ASC  ";
    $statement=$pdo->query($sql);
    $result= $statement->fetchAll();
    return $result;
}
public function afficheResaJour($debut,$fin) : array {
    $resasjour= $this->afficheResa($debut,$fin);
    $days=[];
    foreach ($resasjour as $resasjour) {
        $date = explode(' ',$resasjour['debut'])[0];
        if (!isset($days[$date])){
            $days[$date] = [$resasjour];
        }
        else{
            $days[$date][]=$resasjour;
        }

    }
    return $days;
}


public function getId() {


    $getid=$this->connexion()->prepare("SELECT * FROM reservations WHERE id= ?");
    $getid->bindValue(1,$_GET['id']);
    $getid->execute();
    $result=$getid->fetch();
    if (empty($result)) {
        header('location: ../views/404.php');
    }
    return $result;
    // $pdo=$this->connexion();
    // return  $pdo->query("SELECT * FROM reservations WHERE id= $id")->fetch();
 }
}


