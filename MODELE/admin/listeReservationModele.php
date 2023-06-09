<?php  

require_once '../../MODELE/database/dbConnect.php';

class listeReservationModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

   
    public function getRentedCarsData()
    {
        $query = $this->db->prepare('SELECT location.id_location, location.id_vehicule, vehicule.photo, vehicule.Prix, location.dateDebut, location.dateRetour, location.agenceDepart, location.agenceRetour ,  location.prixTotal
                                    FROM location
                                    INNER JOIN vehicule ON location.id_vehicule = vehicule.id_vehicule
                                    ORDER BY location.id_location DESC');
        $query->execute();
        return $query->fetchAll();
    }

    public function deletelocation($id)
    {
        $query = $this->db->prepare("DELETE FROM location WHERE id_vehicule = ? ");
        $query->execute($id);

        $queryoption = $this->db->prepare("DELETE FROM optionreserver WHERE id_voiture = ? ");
        $queryoption->execute($id);
    }
     
    public function getRentedCarsoption($id)
    {
        $query = $this->db->prepare('SELECT o.id_option, o.typeOption, o.nomOption , o.description1 , o.description2 , o.image ,o.prixOption , ors.prixtotale
                            FROM `options` o
                            INNER JOIN optionreserver ors ON o.id_option = ors.id_option
                            WHERE ors.id_voiture = :id');
    
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
    


}