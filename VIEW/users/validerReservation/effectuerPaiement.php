
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page de démonstration de paiement par Craftyx">
    <meta name="author" content="Craftyx">
    <link rel="stylesheet" href="../../../VIEW/css/effectuerPaiement.css">
    <title>Page de démonstration de paiement par Craftyx</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav>
        <div class="container">
            <div class="how">
                <div class="mylogo">
                    <a href="#"><img src="../../../VIEW/images/my_logo_app.png" alt=""></a>
                </div>
            </div>
            
        </div>
        <div class="line"></div>
     </nav>
    
     <div class="demane_paiement">
        <div class="H22"><h2>Demande de paiement</h2></div>
        <div class="linee"></div>
     </div>
    
<div class="containner">
    <div class='row'>
        <div class='col-md-4 col-md-offset-4'>
            <form accept-charset="UTF-8" action="validerpayerController.php?action=enregistrer"  id="payment-form" method="post">
               
                <div class='form-row'>
                    <div class='col-xs-12 form-group'>
                        <label class='control-label'>Nom sur la carte</label>
                        <input class='form-control' size='4' type='text' name="name">
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-12 form-group card'>
                        <label class='control-label'>Numéro de carte</label>
                        <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_no">
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-4 form-group cvc'>
                        <label class='control-label'>CVC</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc">
                    </div>
                    <div class='col-xs-4 form-group expiration'>
                        <label class='control-label'>Expiration</label>
                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="expiration_month">
                    </div>
                    <div class='col-xs-4 form-group expiration'>
                        <label class='control-label'> </label>
                        <input class='form-control card-expiry-year' placeholder='AAAA' size='4' type='text' name="expiration_year">
                    </div>
                </div>

                <div >
                    <div >
                        <input style="position:absolute;right:465px;" type='checkbox' name="amount" required>
                        <label style="font-size: 12px;position:relative;left:40px;">Confirmer l'acceptation des conditions générales d’utilisation du service</label>
                    </div>
                </div>

                <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-primary submit-button' type='submit'>Payer »</button>
                    </div>
                </div>
            </form>
            <form action="validerpayerController.php?action=echeck" method="post">
                <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-primary submit-button' style="background-color:red;" type='submit'>Annuler »</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <DIV class="container2">
        <div class="HZA"><h2>TOTALE A PAYER : <?php echo $_SESSION['prix_totale_avec_options'] ; ?> MAD</h2></div>
    </DIV>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>