<?php  

require_once '../../MODELE/database/dbConnect.php';

class welcomeModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

}