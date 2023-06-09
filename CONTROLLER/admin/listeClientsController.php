<?php 

require_once '../../MODELE/admin/listeClientsModele.php';


class listeClientsController {
    private $modele ; 

    public function __construct(){
        $this->modele = new listeClientsModele();
    }

    public function listeClientsAction()
    {
        $clients = $this->modele->getClientsData();
        require_once '../../VIEW/admin/listeClients.php';
    }

    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'listeclients' : $this->listeClientsAction();
            break;

            case 'vehicules' : $this->listeVoitures();
            break;
        }

    }
    
}

$c = new listeClientsController();
$c->action();