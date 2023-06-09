<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Détails de la voiture</title>
	<link rel="stylesheet" href="../../../VIEW/css/availableCars.css">
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
			<form action="" method="post">
			<button type="submit">Déconnexion</button>
			</form>
		</div>
	</div>
	<div class="line"></div>
 </nav>
<div class="contenu">
<section>
	<div class="sideform">
		<form action="availableCarsController.php?action=ablecars" method="post" style="color : black">
			<div>
				<div class="periode"><p>Période de location</p></div>

				<label for="date-debut">
		<img src="../../../VIEW/images/started.png" />
		<span>Date de début </span>
	  </label>
				<input type="date" value="<?php echo $_SESSION['date_debut'] ; ?>" id="date-debut" name="date-debut" >
			</div>
			<div>
				<label for="date-fin">
		<img src="../../../VIEW/images/finished.png" />
		<span>Date de fin</span> 
	  </label>
				<input type="date" value="<?php echo  $_SESSION['date_fin'] ; ?>" id="date-fin" name="date-fin">
			</div>
			<div>
				<label for="lieu-depart">
		<img src="../../../VIEW/images/location.png" />
		<span>Agence de départ</span>
	  </label>
				<select id="lieu-depart" name="lieu-depart">
					<option value="">Sélectionnez une ville</option>
					<option value="Casablanca"  <?php if( $_SESSION['agence_depart']== 'Casablanca') echo 'selected'; ?> >Casablanca</option>
					<option value="Rabat" <?php if( $_SESSION['agence_depart']== 'Rabat') echo 'selected'; ?>>Rabat</option>
					<option value="Salé" <?php if( $_SESSION['agence_depart']== 'Salé') echo 'selected'; ?>>Salé</option>
					<option value="Agadir" <?php if( $_SESSION['agence_depart']== 'Agadir') echo 'selected'; ?>>Agadir</option>
				</select>
			</div>
			<div>
				<label for="lieu-depart">
		<img src="../../../VIEW/images/location.png" />
		<span>Agence de retour</span>
	  </label>
				<select id="lieu-arrive" name="lieu-arrive">
					<option value="" >Sélectionnez une ville</option>
					<option value="Casablanca" <?php if( $_SESSION['agence_retour']== 'Casablanca') echo 'selected'; ?>>Casablanca</option>
					<option value="Rabat" <?php if( $_SESSION['agence_retour']== 'Rabat') echo 'selected'; ?>>Rabat</option>
					<option value="Salé" <?php if( $_SESSION['agence_retour']== 'Salé') echo 'selected'; ?>>Salé</option>
					<option value="Agadir" <?php if( $_SESSION['agence_retour']== 'Agadir') echo 'selected'; ?>>Agadir</option>
				</select>
			</div>
			<div>
		<button type="submit">MODIFIER MA RESERVATION</button>
			</div>
		</form>
	</div>
</section>

<section class="contenetdispo">
<?php         

		$_SESSION['data'] = array(); // Tableau associatif vide
		$dates = array($_SESSION['date_debut'] ,  $_SESSION['date_fin'] );
		$_SESSION['dates'] = $dates ;
		foreach ($cars as $car) 
         {
             $prix = $car['Prix'];
             $id = $car['id_vehicule'];
             $_SESSION['id_vehicule'] = $id ;
             $donnee = array( $_SESSION['date_fin'] , $_SESSION['date_debut'] , $prix , $id );
             $prixtotale = $this->modele->prixTotale($donnee);
			 $_SESSION['prix_total'] =  $prixtotale['prix_total'];
             $prix_total = $_SESSION['prix_total'];
			 $_SESSION['data'][$_SESSION['id_vehicule']] = $_SESSION['prix_total'];
			 ?>
	<!-- debut -->
	<div class="content">
		<DIV >
			<div>
				<h2><?php echo $car['Marque'] ; ?> </h2>
			</div>
			<div>
				<p>description</p>
			</div>
		</DIV>
		<div class="inline">
			<div>
				<img src="../../admin/crudvoiture/<?php echo $car['photo']; ?>" class="imagvoiture">
			</div>
			<div>
				<ul class="element" style="color:black;">
					<li><img src="../../../VIEW/images/siege-de-voiture.png" /> <?php echo $car['nombrePlace'] ; ?> Place</li>
					<li><img src="../../../VIEW/images/outil-de-coloration.png" /> Couleur <?php echo $car['Couleur'] ; ?></li>
		
					<li><img src="../../../VIEW/images/horloge-et-calendrier.png" /> Modéle <?php echo $car['Modele'] ; ?></li>
					<li><?php if($car['typeCarburant'] == 'Electrique') { echo '<img src="../../../VIEW/images/energy.png" > '; } 
					else 
					if($car['typeCarburant']=='Gasoil') { echo '<img src="../../../VIEW/images/gas-station.png" > '; } 
					else { echo '<img src="../../../VIEW/images/fuel.png" > '; } ?><?php echo $car['typeCarburant'] ; ?></li>
					<li><img src="../../../VIEW/images/manual-transmission.png" > <?php echo $car['transmission'] ; ?></li>
				</ul>
			</div>
			<div class="pay">
				<div class="leprix">
					<div>
					<h2>Totale <?php echo $_SESSION['data'][$id] ; ?> DH </h2>
					</div>
					<div>
						<p><?php echo $car['Prix'] ; ?> DH / jour</p>
					</div>
				</div>
				<div>
					<div class="devis">
						<p> Prix en MAD</p> 
					</div>
					<div>
					<form action="./optionscarController.php?action=listeoption" method="POST"> <!-- Ajout du formulaire -->
                        <input type="hidden" name="id" value="<?php echo  $car['id_vehicule'] ; ?>">
						<button>PAYER MAINTENANT >></button>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</section>

</div>
</main>
	<footer>
    <p>© 2023 Location de voitures. Tous droits réservés.</p>
    </footer>
</body>
</html>
