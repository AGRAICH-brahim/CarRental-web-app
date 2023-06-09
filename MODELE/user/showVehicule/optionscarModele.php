<?php  

require_once '../../../MODELE/database/dbConnect.php';

class optionscarModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

    public function allOptions($id)
    {
        $query = $this->db->prepare('SELECT id_option, typeOption, nomOption, description1, description2, image, prixOption FROM options WHERE id_voiture = ? ORDER BY prixOption');
        $query->execute([$id]);
        return $query->fetchAll();
    }




}