<?php 

require_once '../../MODELE/admin/listeReservationModele.php';


class listeReservationController {
    private $modele ; 

    public function __construct(){
        $this->modele = new listeReservationModele();
    }

    public function listeReservationAction()
    {
        $voitures = $this->modele->getRentedCarsData();
        require_once '../../VIEW/admin/listeReservation.php';
    }

    public function deletelocationAction()
    {
        $id = array($_POST['id']);

        $this->modele->deletelocation($id);

        header("Location: ./listeReservationController.php?action=listereservation");
    }


    public function getRentedCarsoptionAction()
    {
        session_start();
        if (isset($_POST['id'])) {
            $_SESSION['iid'] = $_POST['id'];
        }
       $id = $_SESSION['iid'];
        $options = $this->modele->getRentedCarsoption($id);
        $groupedOptions = [];

        // Regrouper les options par typeOption
        foreach ($options as $option) {
            $type = $option['typeOption'];
            if (!isset($groupedOptions[$type])) {
                $groupedOptions[$type] = [];
            }
            $groupedOptions[$type][] = $option;
        }

        require_once '../../VIEW/admin/optionAssocie.php';
    }
    
    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'listereservation' : $this->listeReservationAction();
            break;

            case 'deletelocation' : $this->deletelocationAction();
            break;

            case 'listeoptionreserver' : $this->getRentedCarsoptionAction();
            break;
        }

    }
    
}

$c = new listeReservationController();
$c->action();