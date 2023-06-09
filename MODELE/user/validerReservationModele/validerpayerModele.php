<?php  

require_once '../../../MODELE/database/dbconnect.php';

class validerpayerModele {
    
    private $db;

    public function __construct(){
        $this->db =  Database::getInstance();
    }

    public function vehicule($id){
        $query = $this->db->prepare("select * from vehicule where id_vehicule = ?");
        $query->execute($id);
        $query->fetch();
    }

    public function saveLocationWithClient($infoclient, $save_location, $save_paiement) {
        
            // Début de la transaction
            $this->db->beginTransaction();
    
            // Exécuter une requête INSERT pour insérer les données du client
            $queryClient = $this->db->prepare("INSERT INTO clients (civilite, nom, prenom, email, adresse, codePostal, ville, telephone, dateNaissance, numCIN, numPermis) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $queryClient->execute($infoclient);
    
            // Récupérer l'id généré du client enregistré
            $idClient = $this->db->lastInsertId();
    
            // Exécuter une requête INSERT pour insérer les données de location avec l'id du client en tant que clé étrangère
            $save_location = array_merge(array($idClient), $save_location);
            $queryLocation = $this->db->prepare("INSERT INTO location (id_client, id_vehicule, dateDebut, dateRetour, agenceDepart, agenceRetour, prixTotal) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $queryLocation->execute($save_location);
    
            // Exécuter une requête INSERT pour insérer les données de paiement avec l'id du client en tant que clé étrangère
            $save_paiement = array_merge(array($idClient), $save_paiement);
            $querypaiement = $this->db->prepare("INSERT INTO paiement (id_client, nomComplet, montantPayer, date_heure_paiement) VALUES (?, ?, ?, ?)");
            $querypaiement->execute($save_paiement);
    
            // Valider la transaction
            $this->db->commit();
    
            return $idClient;
        
    }
    

    public function insertoptions($option_reserver)
    {
        //inserer les option reserver
        $query = $this->db->prepare("INSERT INTO optionreserver (id_option, id_voiture, prixtotale) VALUES ( ? , ? , ? )");
        $query->execute($option_reserver);
    }


    public function insertClient($infoclient)
    {
        $query = $this->db->prepare("INSERT INTO location (civilite ,nom, prenom, 	email	, adresse, codePostal, ville , telephone , dateNaissance , numCIN , numPermis) VALUES ( ? , ? , ? , ? , ? , ? , ? ,? , ? , ? , ? )");
        $query->execute($infoclient);
    }

    public function insertLocation($location)
    {
        $query = $this->db->prepare("INSERT INTO location (id_cliente , id_vehicule,  dateDebut	, dateRetour, agenceDepart, agenceRetour , prixTotal) VALUES ( ? , ? , ? , ? , ? , ? ,? )");
        $query->execute($location);
    }

   

    public function savePaiement($save_paiement)
    {
        $query = $this->db->prepare("INSERT INTO paiement (id_client , nomComplet , montantPayer, date_heure_paiement ) VALUES ( ? , ? , ?  )");
        $query->execute($save_paiement);
    }





}