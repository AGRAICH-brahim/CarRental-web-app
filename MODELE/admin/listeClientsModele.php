<?php  

require_once '../../MODELE/database/dbConnect.php';

class listeClientsModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

   
    public function getClientsData()
    {
        $query = $this->db->prepare('SELECT * from clients');
        $query->execute();
        return $query->fetchAll();
    }


}