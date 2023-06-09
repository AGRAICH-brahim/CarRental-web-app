<?php 

require_once '../../MODELE/admin/listevoitureModele.php';


class listevoitureController {
    private $modele ; 

    public function __construct(){
        $this->modele = new listevoitureModele();
    }

    public function listevoituresAction(){
        
        $voitures = $this->modele->allvehicules();

        require_once '../../VIEW/admin/listeVoitures.php';
    }

    public function ajoutervoiture()
    {
        header('Location: ./crudvoiture/crudvoitureController.php?action=ajoutervoiture');
    }


    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            // case 'listevoiture' : $this->listevoituresAction();
            // break;

            case 'vehicules' : $this->listeVoituresAction();
            break;

            case 'ajoutervoiture' : $this->ajoutervoiture();
            break;
        }

    }
    
}

$c = new listevoitureController();
$c->action();