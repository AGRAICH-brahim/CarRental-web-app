<?php

require_once '../../../MODELE/user/connexion/usersModele.php';

class usersController {
    private $modele ; 

    public function __construct(){
        $this->modele = new usermodele();
    }

    public function signupDirection(){ //vers la page signup

        require_once '../../../VIEW/users/connexion/signup.php';

    }

    public function loginDirection(){
        require_once '../../../VIEW/users/connexion/login.php';

    }

    public function saveUserAction(){ // effectue le saauvegardae de l'utilisateur dans la base de donner 

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Récupérer les données du formulaire
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm-password'];
            $type = 0 ;
            // Récupération de la date et de l'heure actuelles
            $creation_date = date('Y-m-d H:i:s');
        
            // Vérifier si les mots de passe correspondent
            if($password != $confirm_password) { 
                $result = "Les mots de passe ne correspondent pas";   
                require_once '../../../VIEW/users/connexion/signup.php';
                exit;  
            }
            // Hasher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $tab_user = array($username , $email , $hashed_password , $type , $creation_date );

            $this->modele->saveUser($tab_user);
        
            // Rediriger l'utilisateur vers la page de login
            header('Location: usersController.php?action=login');           
        }
    }

    public function testUserAction(){ // test si l'utilusateur déja exist

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Récupérer les données du formulaire
            $username = $_POST['username'];
            $email = $_POST['email'];

            $tab = array($username , $email);

            $result = $this->modele->userexist($tab);
            if(@$result) {
                $result = "L'utilisateur existe déjà" ;
                require_once '../../../VIEW/users/connexion/signup.php';
            }
            else {
                $this->saveUserAction(); // Appel correct de la méthode saveUserAction()
            }
        }
       
    }

    public function loginAction() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données du formulaire
            $username = $_POST['username'];
            $password = $_POST['password'];

            $utilisateur = array($username);

            // Vérifier les informations de connexion dans la base de données
            $user = $this->modele->getUserByUsername($utilisateur);

            if ($user && password_verify($password, $user['password'])) {
                // Les informations de connexion sont valides

                // Vérifier le type d'utilisateur
                if ($user['type'] == 0) {
                    // Utilisateur normal
                    // Créer une session pour l'utilisateur normal
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    // Autres données utilisateur à définir dans la session selon vos besoins

                    // Rediriger l'utilisateur vers une page sécurisée pour les utilisateurs normaux
                    header('Location: ../../user/welcomeController.php?action=welcome');
                     
                    exit();
                } elseif ($user['type'] == 1) {
                    // Administrateur
                    // Créer une session pour l'administrateur
                    $_SESSION['admin_id'] = $user['id'];
                    $_SESSION['admin_username'] = $user['username'];
                    // Autres données administrateur à définir dans la session selon vos besoins

                    // Rediriger l'administrateur vers une page sécurisée pour les administrateurs
                    header('Location: ../../admin/adminController.php?action=acceuiladmin');
                   
                    exit();
                } 
            } else  {
                $reponse = "Identifiant ou mot passe incorrect";
                require_once '../../../VIEW/users/connexion/login.php';

            }
        }
    }


    public function action(){
        $action = "signup";

        if(isset($_GET['action'])) $action = $_GET['action'] ;
        if(isset($_POST['action'])) $action = $_POST['action'] ;

        switch($action){
            case 'signup' : $this->signupDirection();
            break;

            case 'login' : $this->loginDirection();
            break;

            case 'saveuser' : $this->testUserAction();
            break;

            case 'loginA' : $this->loginAction();

        }
    }
}

$c = new usersController();
$c->action();

