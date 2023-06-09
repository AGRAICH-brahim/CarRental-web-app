<?php 

require_once '../../MODELE/admin/adminModele.php';


class adminController {
    private $modele ; 

    public function __construct(){
        $this->modele = new adminModele();
    }

    public function adminAcceuil()
    {
        $voitures = $this->modele->getRentedCarsData();
        require_once '../../VIEW/admin/acceuilAdmin.php';
    }

    public function listeVoitures()
    {
        header('Location: ./listevoitureController.php?action=vehicules');
    }

    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'acceuiladmin' : $this->adminAcceuil();
            break;

            case 'vehicules' : $this->listeVoitures();
            break;
        }

    }
    
}

$c = new adminController();
$c->action();