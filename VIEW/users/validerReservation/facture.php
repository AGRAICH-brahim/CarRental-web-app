<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        body {
            padding: 30px;
            border: 1px solid black;
            font-weight: 600;
        }
        .head {
            display: flex;
            flex-direction: row;
            position: relative;
            justify-content: space-between;
            align-items: center;
            margin-inline: 30px;
        }
        .head img {
            width: 100px;
        }
        .header {
            display: flex;
            position: relative;
            justify-content: center;
            gap: 40PX;
            top: -30px;
        }
        .container1 {
            width: 96%;
            border: 2px solid black;
            display: flex;
            position: relative;
            justify-content: center;
            align-items: center;
            top: -30px;
            left: 2%;
        }
        .container2 {
            display: flex;
            position: relative;
            left: 15%;
            width: 30%;
            
        }
        .container3 {
            display: flex;
            flex-direction: row;
            position: relative;
            padding-inline: 60PX;
            top: -10px;
        }
        .image {
            display: flexbox;
            position: relative;
            left: 40%;
            top: -20px;
            height: 200px;
            width: 200px;
        }
        .container4 {
            display: flex;
            flex-direction: row;
            position: relative;
            padding-inline: 60PX;
            align-items: center;
            top: -10px;
        }
        .container5 {
            display: flexbox;
            position: relative;
            left: 50%;
        }
        span {
            font-weight: 800;
            color : rgb(146, 84, 84); 
            padding-left : 20px ;
            font-size : 20px ;
        }
    </style>

    <DIV class="head">
        <div><img src="./my_logo_app.png" alt=""></div>
        <div><img src="./bill.png" alt=""></div>
    </DIV>
    <div class="header">
        <div><H2>Agence de Location :</H2></div>

        <div><p>Lieu : <?php echo $_SESSION['agence_depart'] ; ?></p>
        <p>Telephone : 00000000000</p>
        <P>E-mail : rentcars@gmail.com</P></div>
    </div>
    <div class="container1">
        <div><h2>Facture de résérvation le : 04/06/2023</h2></div>
    </div>
    <DIV class="container2">
        <h3>Les informations de véhicule :</h3>
    </DIV>
        <div class="container3">
            <div>
                <p>Marque : <span><?php echo $_SESSION['id_voiture_choisie'] ; ?></span></p>
                <p>Modéle : </p>
                <p>Couleur : </p>
                <p>Matricule : </p>
                <p>Nombre de place : </p>
                <p>Type de Carburant : </p>
                <p>Type de Transmission : </p>
            </div>
        
            <div class="image" >
                <img src="./Audi Q3.webp" alt="">
            </div>
        </div>
        <DIV class="container2">
            <h3>Les informations de Client :</h3>
        </DIV>
        <div class="container4">
            
                <div>
                <p>Civilité : <span><?php echo $_SESSION['infoclient'][0] ; ?></span></p>
                <p>Nom : <span><?php echo $_SESSION['infoclient'][1] ; ?> </span></p>
                <p>Prénom : <span><?php echo $_SESSION['infoclient'][2] ; ?> </span></p>
                <p>E-mail : <span><?php echo $_SESSION['infoclient'][3] ; ?> </span></p>
                <p>Adresse :<span> <?php echo $_SESSION['infoclient'][4] ; ?></span> </p>
                <p>Code Postal :<span> <?php echo $_SESSION['infoclient'][5] ; ?> </p>
            </div>
            <div class="container5">
                <p>Ville :<span> <?php echo $_SESSION['infoclient'][6] ; ?> </span></p>
                <p>Telephone :<span> <?php echo $_SESSION['infoclient'][7] ; ?></span> </p>
                <p>Date de Naissance :<span> <?php echo $_SESSION['infoclient'][8] ; ?> </span></p>
                <p>Numéro de CIN :<span> <?php echo $_SESSION['infoclient'][9] ; ?></span> </p>
                <p>Numéro de Permis :<span> <?php echo $_SESSION['infoclient'][10] ; ?></span> </p>
            </div>
        </div>
        <DIV class="container2">
            <h3>Les informations de Location :</h3>
        </DIV>

        <div class="container4">
            <div >
                <p>Date de départ de Location : <span> <?php echo $_SESSION['date_debut'] ; ?> </span></p>
                <p>Date de fin de Location  : <span> <?php echo $_SESSION['date_fin'] ; ?> </span></p>
                <p>Agence de départ : <span> <?php echo $_SESSION['agence_depart'] ; ?> </span></p>
                <p>Agence de retour : <span> <?php echo $_SESSION['agence_retour'] ; ?> </span></p>
            </div>
            <div class="container5">
                <p>Montant totale Payé : <span> <?php echo $_SESSION['prix_totale_avec_options'] ; ?> </span> DH</p>
            </div>
        </div>
        <div>
            
        </div>

</body>
</html>