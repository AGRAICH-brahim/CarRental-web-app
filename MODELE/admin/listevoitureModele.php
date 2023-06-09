<?php  

require_once '../../MODELE/database/dbConnect.php';

class listevoitureModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

    public function allvehicules()
    {
        $query = $this->db->prepare('select id_vehicule, Marque, Modele, Matricule, Prix, nombrePlace, photo , typeCarburant FROM vehicule');
        $query->execute();
        return $query->fetchAll();
    }

}