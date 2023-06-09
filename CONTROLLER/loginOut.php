<?php 

class logoutController {
    public function Deconnexion(){
        session_start();
        session_unset();
        session_destroy();

        require_once '../index.php';
   }



    public function action(){
        $action = "";

        if(isset($_GET['action'])) $action = $_GET['action'];
        if(isset($_POST['action'])) $action = $_POST['action'];

        switch($action)
        {
            case 'deconnexion' : $this->Deconnexion();
            break;
        }
    }
}

$c = new logoutController();
$c->action();