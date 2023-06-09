<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../VIEW/css/formClient.css">
    <title>Réservation de voiture</title>
</head>
<body>
    <nav>
        <div class="container">
            <div class="how">
                <div class="mylogo">
                    <a href="#"><img src="../../../VIEW/images/my_logo_app.png" alt=""></a>
                </div>
                <div class="welcome">
                    <p>Louer votre voiture dés maintenant</p>
                </div>
            </div>
            <div>
                <button type="submit">Déconnexion</button>
            </div>
        </div>
        <div class="line"></div>
     </nav>
     
     <section>
        <div class="containner0">
                <div class="AZ">
                        <form action="validerpayerController.php?action=allerpaiement" method="post">
                        <div class="containner1">
                            <div class="containner2">
                                <div>
                                <!-- <div>premier box qui contient le formulaire </div> -->
                                
                                    <div>
                                        <div class="a">
                                            <div>
                                                <h2>Coordonnées de Réservation </h2>
                                            </div>
                                            <div class="ligne1"></div>
                                        </div>
                                        <div class="form">
                                            
                                                <div class="donnees">
                                                    <div>
                                                        <p>VOS DONNÉES DE RÉSERVATION</p>
                                                    </div>
                                                    <DIV class="COORDONNES">
                                                        <div class="radio">
                                                            <input type="radio" name="myradio" id="myradio1" value="MR" class="radio-input" checked><label class="radio-label" for="myradio1">Mr</label>
                                                            <input type="radio" name="myradio" id="myradio2" value="MME" class="radio-input"><label class="radio-label" for="myradio2">MME</label>
                                                        </div>
                                                        <div class="name">
                                                            <div class="input-data">
                                                                <input type="text" name="prenom" id="prenom" ><label for="prenom">Prénom</label>
                                                            </div>
                                                            <div class="input-data">
                                                                <input type="text" name="nom" id="nom" ><label for="nom">Nom</label>
                                                            </div>
                                                        </div>
                                                        <div class="input--data">
                                                            <input type="email" name="email" id="email" ><label for="email">E-mail</label>
                                                        </div>
                                                        <div class="input--data">
                                                            <input type="text" name="adresse" id="adresse" ><label for="adresse">Adresse</label>
                                                        </div>
                                                        <div class="name">
                                                            <div class="input-data">
                                                                <input type="text" name="code-postal" id="code-postal" ><label for="code-postal">Code Postal</label>
                                                            </div>
                                                            <div class="input-data">
                                                                <input type="text" name="ville" id="ville" ><label for="ville">Ville</label>
                                                            </div>
                                                        </div>
                                                    </DIV>
                                                </div>
                                                <div class="info">
                                                    <div>
                                                        <p>INFOS COMPLÉMENTAIRES</p>
                                                    </div>
                                                    <DIV class="COORDONNES">
                                                        <DIV class="input--data">
                                                            <input type="text" name="telephone" id="telephone" ><label for="telephone">Telephone</label>
                                                        </DIV>
                                                        <div class="input--data">
                                                            <input type="date" name="date-naissance" id="date-naissance" ><label for="date-naissance">Date Naissance</label>
                                                        </div>
                                                        <div class="input--data">
                                                            <input type="text" name="num-cin" id="num-cin" ><label for="num-cin">Numéro de CIN</label>
                                                        </div>
                                                        <div class="input--data">
                                                            <input type="text" name="num-permis" id="num-permis" ><label for="num-permis">Numéro de Permis</label>
                                                        </div>
                                                    </DIV>
                                                </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                            <div class="containner3">
                                <div>
                                    <div class="a">
                                        <div>
                                            <h2>Paiement sécurisé</h2>
                                        </div>
                                        <div class="ligne1"></div>
                                    </div>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="A1"><label for="A1">Je désire recevoir les offres spéciales, les nouveautés et informations concernant les Location.</label>
                                </div>
                                <div class="checkbox">
                                    <input type="checkbox" id="A2" required><label for="A2">*Je déclare avoir pris connaissance et accepter les Conditions Générales de Location </label>
                                </div>
                                <div class="boutton">
                                    <button type="submit">VALIDER ET PAYER MAINTENANT</button>
                                </div>
                                <div class="mode_paiyment">
                                    <div>
                                        <img src="../../../VIEW/images/CMI-emploi-et-Recrutement-2020.jpg" alt="">
                                    </div>
                                    <div>
                                        <p>La garantie sécurité. Aucun numéro de carte bancaire n'est stocké, 
                                            transaction sécurisée et externalisée par CMI.</p>
                                    </div>
                                    <div>
                                        <img src="../../../VIEW/images/LOGO-CB-VISA-MASTERCARD_mob_1.webp" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="side">
                    <div class="totale-a-payer">
                        <div>
                            <h2>Totale à Payer :</h2>
                        </div>
                        <div>
                            <H2><?php echo $totale_a_payer; ?> DH</H2>
                        </div>
                    </div>
                    <DIV class="iinfo">
                        <h4 style="font-weight: 900; color:black;">Ce prix exclut :</h4>
                    </DIV>
                    <div class="iinfo">
                        <p style="font-size: 14PX;">Le dépôt de garantie s'appliquera (le montant sera pré-autorisé sur votre carte de crédit 
                            au moment de la prise en charge de la location, mais pas débité de votre compte). 
                            Ce montant sera bloqué sur votre carte de crédit au moment de la prise en charge, 
                            ou en cas D'enregistrement en ligne, il sera bloqué dans les 48 heures avant la prise en charge. 
                            Le dépôt de garantie sera utilisé pour des frais supplémentaires (par exemple, le carburant manquant au retour, 
                            un jour supplémentaire, un kilométrage supplémentaire, un aller simple, etc.). Si vous avez besoin de plus 
                            amples informations sur le délai de récupération des dépôts de garantie et leurs montants, 
                            veuillez consulter nos termes et conditions par pays.</p>
                    </div>
                    <DIV class="iinfo">
                        <h4 style="font-weight: 900; color:black; ">Paiement en ligne sélectionné</h4>
                    </DIV>
                    <div class="iinfo">
                        <p style="font-size: 14PX;">Afin de bénéficier de ce tarif exceptionnel, 
                            vous devez valider votre réservation par un paiement par carte bancaire en ligne 
                            via un espace sécurisé..</p>
                    </div>
                </div>
    
        </div>
     </section>

     <footer>
        <p>© 2023 Location de voitures. Tous droits réservés.</p>
        </footer>
</body>
</html>