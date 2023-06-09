<?php 

require_once '../../../MODELE/user/showVehicule/optionscarModele.php';


class optionscarController {
    private $modele ; 

    public function __construct(){
        $this->modele = new optionscarModele();
    }

    public function listeoptionsAction()
    {
        session_start();
        if (isset($_POST['id'])) {
            $_SESSION['id_voiture_choisie'] = $_POST['id'];
        }
        $id = $_SESSION['id_voiture_choisie'];
        $options = $this->modele->allOptions($id);
        $groupedOptions = [];

        // Regrouper les options par typeOption
        foreach ($options as $option) {
            $type = $option['typeOption'];
            if (!isset($groupedOptions[$type])) {
                $groupedOptions[$type] = [];
            }
            $groupedOptions[$type][] = $option;
        }

        $date1 = new DateTime($_SESSION['dates'][0]);
        $date2 = new DateTime($_SESSION['dates'][1]);

        $diff = date_diff($date1, $date2);
        $numberOfDays = $diff->days;
        $_SESSION['numberOfDays'] = $numberOfDays ;
// Vérifier si le tableau $_SESSION['selected_options'] existe
if (!isset($_SESSION['selected_options'])) {
    $_SESSION['selected_options'] = array(); // Initialiser le tableau s'il n'existe pas
 }
 
 // Vérifier si l'option a été ajoutée ou supprimée
 if (isset($_POST['add_option'])) {
    $option_id = $_POST['id_option'];
 
    // Vérifier si l'option est déjà sélectionnée
    if (in_array($option_id, $_SESSION['selected_options'])) {
       // Supprimer l'option du tableau
       $option_index = array_search($option_id, $_SESSION['selected_options']);
       unset($_SESSION['selected_options'][$option_index]);
    } else {
       // Ajouter l'option au tableau
       $_SESSION['selected_options'][] = $option_id;
    }
 }
 

// Calculer le prix total des options sélectionnées
$prix_totale_avec_options = $_SESSION['data'][$_SESSION['id_voiture_choisie']]; // Prix de base
$_SESSION['id_option_choisie'] = array(); // Récupérer chaque ID d'option sélectionnée
foreach ($_SESSION['selected_options'] as $selected_option_id) {
                                                     
    // Recherche de l'option dans $groupedOptions
    foreach ($groupedOptions as $type => $optionsGroup) {
        foreach ($optionsGroup as $option) {
            if ($option['id_option'] == $selected_option_id) {
                // Ajouter le prix de l'option au prix total
                $prix_totale_avec_options += $option['prixOption'] * $numberOfDays;
                $_SESSION['id_option_choisie'][$option['id_option']] = $option['prixOption'] * $numberOfDays ; //inserer dans le tableau id_option et prix totale
            }
        }
    }
}
$_SESSION['prix_totale_avec_options'] = $prix_totale_avec_options ;




        require_once '../../../VIEW/users/showVehicule//optionsCars.php';
    }


    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'listeoption' : $this->listeoptionsAction();
            break;
        }
    }
}

$c = new optionscarController();
$c->action();