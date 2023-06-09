<?php 

require_once '../../../Modele/admin/crudoption/crudoptionModele.php';


class crudoptionController {
    private $modele ; 

    public function __construct(){
        $this->modele = new crudoptionModele();
    }

    public function ajouteroptionAction()
    {
        session_start();
        $_SESSION['id'] =  $_POST['id'];
        require_once '../../../VIEW/admin/crudoption/addoption.php';
    }

    public function insertoptionAction()
    {
    // Vérification que le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $_SESSION['id'] =  $_POST['id'];
            $id_voiture = $_SESSION['id'];
            $typeOption = $_POST['typeOption'];
            $nomOption = $_POST['nomOption'];
            $description1 = $_POST['description1'];
            $description2 = $_POST['description2'];
            $image = $_FILES['image'];
            $prixOption = $_POST['prixOption'] ;

            // Vérification que l'image a été uploadée avec succès
            if ($image['error'] !== UPLOAD_ERR_OK) {
                die("Erreur lors de l'upload de l'image : " . $image['error']);
            }

            // Déplacement de l'image vers un dossier de stockage
            $uploadDir = 'uploads/';
            $uploadFile = $uploadDir . basename($image['name']);
            if (!move_uploaded_file($image['tmp_name'], $uploadFile)) {
                die("Erreur lors de la sauvegarde de l'image");
            }

            $option = array($id_voiture , $typeOption , $nomOption , $description1 , $description2 , $uploadFile , $prixOption );

            $this->modele->insertoption($option);

            header("Location: ../listevoitureController.php?action=vehicules");
        }
    
    }


    public function listeoptionsAction()
    {
        session_start();
        if (isset($_POST['iid'])) {
            $_SESSION['id'] = $_POST['iid'];
        }
        $id = $_SESSION['id'];
        $options = $this->modele->allOptions($_SESSION['id']);
        $groupedOptions = [];

        // Regrouper les options par typeOption
        foreach ($options as $option) {
            $type = $option['typeOption'];
            if (!isset($groupedOptions[$type])) {
                $groupedOptions[$type] = [];
            }
            $groupedOptions[$type][] = $option;
        }

        require_once '../../../VIEW/admin/crudoption/listeoption.php';
    }



    public function deleteoptionAction()
    {
        $id = array($_POST['idoption']);

        $this->modele->deleteoption($id);

        header("Location: crudoptionController.php?action=listeoption");
    }


    public function editoptionAction()
    {
        session_start();
        if (isset($_POST['idoption'])){
        $_SESSION['idoption'] = $_POST['idoption'];
    }
    
        $option = $this->modele->editoption(array($_SESSION['idoption']));

        require_once '../../../VIEW/admin/crudoption/editoption.php';
    }

    public function updateoptionAction()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $typeOption = $_POST['typeOption'];
            $nomOption = $_POST['nomOption'];
            $description1 = $_POST['description1'];
            $description2 = $_POST['description2'];
            $image = $_FILES['image'];
            $prixOption = $_POST['prixOption'] ;
            $id = $_SESSION['idoption'] ;

            // Vérification que l'image a été uploadée avec succès
            
                if ($image['error'] !== UPLOAD_ERR_OK) {
                    die("Erreur lors de l'upload de l'image : " . $image['error']);
                }

                // Déplacement de l'image vers un dossier de stockage
                $uploadDir = 'uploads/';
                $uploadFile = $uploadDir . basename($image['name']);
                if (!move_uploaded_file($image['tmp_name'], $uploadFile)) {
                    die("Erreur lors de la sauvegarde de l'image");
                }
          

            $option = array($typeOption ,  $nomOption  , $description1 , $description2 , $uploadFile , $prixOption , $id);
            $this->modele->updateoption($option);

        header("Location: crudoptionController.php?action=listeoption");

        }
    }

    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'ajouteroption' : $this->ajouteroptionAction();
            break;

            case 'saveoption' : $this->insertoptionAction();
            break;

            case 'listeoption' : $this->listeoptionsAction();
            break;

            case 'delete' : $this->deleteoptionAction();
            break;

            case 'edit' : $this->editoptionAction();
            break;

            case 'update' : $this->updateoptionAction();
            break;
        }

    }
    
}

$c = new crudoptionController();
$c->action();