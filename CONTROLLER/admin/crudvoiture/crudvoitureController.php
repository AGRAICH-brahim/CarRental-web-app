<?php 

require_once '../../../MODELE/admin/crudvoiture/crudvoitureModele.php';


class crudvoitureController {
    private $modele ; 

    public function __construct(){
        $this->modele = new crudvoitureModele();
    }

    public function ajoutervoitureAction()
    {
        require_once '../../../VIEW/admin/crudvoiture/addVoiture.php';
    }

    public function insertvoitureAction()
    {
    // Vérification que le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $couleur = $_POST['coleur'];
            $matricule = $_POST['Matricule'];
            $prix = $_POST['prix'];
            $nbr_place = $_POST['Nbr_place'] ;
            $image = $_FILES['image'];
            $carburant = $_POST['Carburant'] ;
            $transmission = $_POST['transmission'] ; 
            $description = $_POST['text_d'];
        

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

            $voiture = array($marque , $modele , $couleur , $matricule , $prix , $nbr_place , $uploadFile , $carburant , $transmission , $description);

            $this->modele->insertvoiture($voiture);

            header("Location: ../listevoitureController.php?action=vehicules");
           
        }
    
    }


    public function deletevoitureAction()
    {
        $id = array($_POST['id']);

        $this->modele->deletevoiture($id);

        header("Location: ../listevoitureController.php?action=vehicules");
    }


    public function editvoitureAction()
    {
        session_start();
        if (isset($_POST['iid'])) {
             $_SESSION['iid'] = array($_POST['iid']);
        }
       
        
        $voiture = $this->modele->editvoiture($_SESSION['iid']);

        require_once '../../../VIEW/admin/crudvoiture/editvoiture.php';
    }

    public function updatevoitureAction()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $marque = $_POST['marque'];
            $modele = $_POST['modele'];
            $couleur = $_POST['coleur'];
            $matricule = $_POST['Matricule'];
            $prix = $_POST['prix'];
            $nbr_place = $_POST['Nbr_place'] ;
            $image = $_FILES['image'];
            $carburant = $_POST['Carburant'] ;
            $transmission = $_POST['transmission'] ; 
            $description = $_POST['text_d'];
            $id = $_SESSION['id'];

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
          

            $voiture = array($marque , $modele , $couleur , $matricule , $prix , $nbr_place , $uploadFile , $carburant , $transmission , $description , $id);

            $this->modele->updatevoiture($voiture);

            header("Location: ../listevoitureController.php?action=vehicules");
        }
    }

    public function action()
    {
        $action = '' ;

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'ajoutervoiture' : $this->ajoutervoitureAction();
            break;

            case 'savevoiture' : $this->insertvoitureAction();
            break;

            case 'delete' : $this->deletevoitureAction();
            break;

            case 'edit' : $this->editvoitureAction();
            break;

            case 'update' : $this->updatevoitureAction();
            break;
        }

    }
    
}

$c = new crudvoitureController();
$c->action();