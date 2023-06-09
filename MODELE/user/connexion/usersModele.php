<?php  

require_once '../../../MODELE/database/dbConnect.php';

class usermodele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }
    
    public function userexist($tab){
        $tuser = $this->db->prepare("SELECT * FROM users WHERE username = ? OR email = ? ");
        $tuser->execute($tab);
        return $tuser->fetch();
    }
    public function saveUser($tab_user){
        $query = $this->db->prepare('INSERT INTO users (username, email, password, type, dateCreation) VALUES ( ? , ? , ? , ? , ? )');
        $query->execute($tab_user);
    }
        
    public function getUserByUsername( $utilisateur)
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE username = ? ");
        $query->execute( $utilisateur);
        return $query->fetch();
    }
    

}