<?php  

require_once '../../../MODELE/database/dbConnect.php';

class availableCarsModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

    // public function availableCars($dates)
    // {
    //     $query = $this->db->prepare('SELECT * FROM vehicule WHERE id_vehicule NOT IN ( SELECT id_location FROM location WHERE dateDebut <= ? AND dateRetour >= ? ) ');
    //     $query->execute($dates);
    //     return $query->fetchAll();
    // }

    public function availableCars($dates)
    {
        $query = $this->db->prepare('SELECT * FROM vehicule WHERE id_vehicule NOT IN (
        SELECT id_vehicule FROM location WHERE (dateDebut <= ? AND dateRetour >= ?) OR (dateDebut <= ? AND dateRetour >= ?) OR (dateDebut >= ? AND dateRetour <= ?) )');
        $query->execute(array($dates[0], $dates[0], $dates[1], $dates[1], $dates[0], $dates[1]));
        return $query->fetchAll();
    }


    public function prixTotale($donnee)
    {
        $query = $this->db->prepare("SELECT DATEDIFF( ? , ? ) * ? AS prix_total FROM vehicule WHERE id_vehicule = ? ");
        $query->execute($donnee);
        return $query->fetch();
    }
}