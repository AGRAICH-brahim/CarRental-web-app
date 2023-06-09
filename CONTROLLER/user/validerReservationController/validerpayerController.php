<?php 

require_once '../../../MODELE/user/validerReservationModele/validerpayerModele.php';


class validerpayerController {
    private $modele ; 

    public function __construct(){
        $this->modele = new validerpayerModele();
    }

   public function formclient(){
    session_start();
    $totale_a_payer = $_SESSION['prix_totale_avec_options'] ;
    require_once '../../../VIEW/users/validerReservation/formClient.php';
   }

   public function infoClient(){
  
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Récupérer les données du formulaire
        $civilite = $_POST["myradio"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $adresse = $_POST["adresse"];
        $codePostal = $_POST["code-postal"];
        $ville = $_POST["ville"];
        $telephone = $_POST["telephone"];
        $dateNaissance = $_POST["date-naissance"];
        $numCIN = $_POST["num-cin"];
        $numPermis = $_POST["num-permis"];
        
        // Enregistrer les données dans des variables de session
        session_start();

        $_SESSION['infoclient'] = array($civilite,$prenom,$nom,$email,$adresse,$codePostal,$ville,$telephone,$dateNaissance,$numCIN, $numPermis) ;
    
        }
    }

    public function allerpaiementAction()
        {   
            @session_start();
            $_SESSION['prix_totale_avec_options'] ;
           require_once '../../../VIEW/users/validerReservation/effectuerPaiement.php' ;
        }

        PUBLIC function echeckpaiementAction(){
            require_once '../../../VIEW/users/validerReservation/echeckrederiger.php' ;
        }

        public function enregistreReservation(){
            @session_start();
            $infoclient = $_SESSION['infoclient']; // informations du client
        
            $save_location = array( $_SESSION['id_voiture_choisie'], $_SESSION['date_debut'], $_SESSION['date_fin'], $_SESSION['agence_depart'], $_SESSION['agence_retour'] , $_SESSION['prix_totale_avec_options']);
        
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $nomComplet = $_POST['name'];
          
            $montant_payer = $_SESSION['prix_totale_avec_options'];
            $date_paiement = date('Y-m-d H:i:s');
            $save_paiement = array($nomComplet, $montant_payer, $date_paiement); // informations de paiement
            $_SESSION['paiementdata'] = $save_paiement ;
        
            $idClient = $this->modele->saveLocationWithClient($infoclient, $save_location, $save_paiement);
        
            foreach($_SESSION['id_option_choisie'] as $key => $prix_) {
                $option_reserver = array($key, $_SESSION['id_voiture_choisie'], $prix_);
                $this->modele->insertoptions($option_reserver);
            }
        }

                require_once '../../../VIEW/users/validerReservation/succéPaiement.php'; 
            
        }

 
        public function facture()
        {
            @session_start();
            $id = array($_SESSION['id_voiture_choisie']);
            $car = $this->modele->vehicule($id);
            ob_start();
            require_once '../../../VIEW/users/validerReservation/facture.php';
            $html = ob_get_contents();
            ob_end_clean();
            require_once '../../../print-details.php';
        
            header('Location: ../welcomeController.php?action=welcome');
            exit;
        }
        
           
        public function rediriger(){
            header('Location: ../welcomeController.php?action=welcome');
    exit; // Assurez-vous d'ajouter cette ligne pour terminer l'exécution du script après la redirection
        }
        


        
    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'insri-client' :   $this->formclient();
            break;

            case 'allerpaiement' : $this->infoClient();
                                    $this->allerpaiementAction();
            break;

            case 'insri-client' :   $this->allerpaiementAction();
            break;


            case 'echeck' : $this->echeckpaiementAction();
            break;

            case 'enregistrer' : $this->enregistreReservation();
            break;

            case 'facture' :    $this->facture();
            $this->rediriger();
                                
            break;
        }
    }
}

$c = new validerpayerController();
$c->action();