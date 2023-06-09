<?php 

require_once '../../MODELE/user/welcomeModele.php';


class welcomeController {
    private $modele ; 

    public function __construct(){
        $this->modele = new welcomeModele();
    }

    public function welcomeUser() // a partir connexion
    {
        require_once '../../VIEW/users/welcome.php';
    }

    public function disponiblevoiture(){
        headre('Location: ./showVehicule/availableCarsController.php?action=ablecars');
    }


    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'welcome' : $this->welcomeUser();
            break;

            case 'ablecars' : $this->disponiblevoiture();
            break;
        }

    }
    
}

$c = new welcomeController();
$c->action();