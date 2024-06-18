<?php 

require_once '../../../MODELE/user/showVehicule/availableCarsModele.php';

class availableCarsController {
    private $modele ; 

    public function __construct(){
        $this->modele = new availableCarsModele();
    }

    public function availableCarsAction()
    {
        session_start();

        if($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            $_SESSION['date_debut'] = $_POST['date-debut'];
            $_SESSION['date_fin'] = $_POST['date-fin'];
            $_SESSION['agence_depart'] = $_POST['lieu-depart'] ;
            $_SESSION['agence_retour'] = $_POST['lieu-arrive'] ;
            $date_debut = $_SESSION['date_debut'];
            $date_fin = $_SESSION['date_fin'];
        }

        $dates = array($_SESSION['date_debut'] ,  $_SESSION['date_fin'] );
        $_SESSION['dates'] = $dates ;
         $cars = $this->modele->availableCars($_SESSION['dates']); // Affiche les voitures disponibles
         $prix_total = 0;

         require_once '../../../VIEW/users/showVehicule/availableCars.php';

    }

   

    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'ablecars' : $this->availableCarsAction();
            break;
        }
    }
}


$c = new availableCarsController();
$c->action();