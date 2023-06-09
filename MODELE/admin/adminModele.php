<?php  

require_once '../../MODELE/database/dbConnect.php';

class adminModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

    public function getRentedCarsData()
{
    $query = $this->db->prepare('SELECT location.id_vehicule, vehicule.photo, location.dateDebut, location.dateRetour, location.agenceDepart, location.agenceRetour ,  location.prixTotal
                                FROM location
                                INNER JOIN vehicule ON location.id_vehicule = vehicule.id_vehicule
                                ORDER BY location.dateRetour DESC');
    $query->execute();
    return $query->fetchAll();
}



}