<?php  

require_once '../../../MODELE/database/dbConnect.php';

class crudoptionModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

    public function insertoption($option)
    {
        $query = $this->db->prepare("INSERT INTO options (id_voiture , typeOption, nomOption, description1	, description2, image, prixOption) VALUES ( ? , ? , ? , ? , ? , ? , ? )");
        $query->execute($option);
    }


    public function allOptions($id)
    {
        $query = $this->db->prepare('SELECT id_option, typeOption, nomOption, description1, description2, image, prixOption FROM options WHERE id_voiture = ? ORDER BY prixOption');
        $query->execute([$_SESSION['id']]);
        return $query->fetchAll();
    }




    public function deleteoption($id)
    {
        $query = $this->db->prepare("DELETE FROM options WHERE id_option = ? ");
        $query->execute($id);
    }


    public function editoption($id)
    {
        $query = $this->db->prepare('SELECT * FROM options WHERE id_option = ?');
        $query->execute($id);
        return $query->fetch();
    }


    public function updateoption($option)
    {
        $query = $this->db->prepare('UPDATE options SET typeOption = ?, nomOption = ?, description1 = ?, description2 = ?, image = ?, prixOption = ? WHERE id_option = ?');
        $query->execute($option);
    }



}