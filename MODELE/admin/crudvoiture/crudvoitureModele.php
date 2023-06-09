<?php  

require_once '../../../MODELE/database/dbConnect.php';

class crudvoitureModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

    public function insertvoiture($voiture)
    {
        $query = $this->db->prepare("INSERT INTO vehicule (Marque, Modele, Couleur, Matricule, Prix, nombrePlace, photo, typeCarburant, transmission, Description) VALUES ( ? , ? , ? , ? , ? , ? , ? , ? , ? , ? )");
        $query->execute($voiture);
    }


    public function deletevoiture($id)
    {
        $query = $this->db->prepare("DELETE FROM vehicule WHERE id_vehicule = ? ");
        $query->execute($id);
    }


    public function editvoiture($id)
    {
        $query = $this->db->prepare('SELECT * FROM vehicule WHERE id_vehicule = ?');
        $query->execute($id);
        return $query->fetch();
    }


    public function updatevoiture($voiture)
    {
        $query = $this->db->prepare('UPDATE vehicule SET Marque = ?, Modele = ?, Couleur = ?, Matricule = ?, Prix = ?, nombrePlace = ?, photo = ?, typeCarburant = ?, transmission = ? , Description = ? WHERE id_vehicule = ?');
        $query->execute($voiture);
    }



}