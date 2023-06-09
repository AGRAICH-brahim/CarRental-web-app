<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajouter une voiture - Location de voitures</title>
	<link rel="stylesheet" href="../../../VIEW/css/listeoption.css">
</head>
<body>
	<div class="sidebar">
	<img src="../../../VIEW/images/my_logo_app.png" alt="">
	<div class="center">
		<h1>Dashboard</h1>
	<nav>
		<ul>
			<li><a href="../adminController.php?action=acceuiladmin"><img src="../../../VIEW/images/dashboard.png" alt="">Tableau de bord</a></li>
			<li><a href="#"><img src="../../../VIEW/images/client.png" alt="">Clients</a></li>
			<li><a href="../adminController.php?action=acceuiladmin"><img src="../../../VIEW/images/car.png" alt="">Véhicules</a></li>
			<li><a href="#"><img src="../../../VIEW/images/reservation.png" alt="">Réservations</a></li>
			<li><a href="#"><img src="../../../VIEW/images/bill.png" alt="">Facturation</a></li>
			<li><a href="#"><img src="../../../VIEW/images/settings.png" alt="">Paramètres</a></li>
		</ul>
	</nav>
	</div>
</div>
	<header>
		<h1>Liste des Options de la voiture</h1>
		<button>Déconnexion</button>
	</header>
    

  <?php  foreach ($groupedOptions as $type => $optionsGroup) {  ?>
	<?php if (!empty($optionsGroup)) { ?>
  <div class="containner1">

		<div>
			<h2><?php echo $type ?></h2>
			<h4>La Franchise accident de ce véhicule est de 14 400 DH</h4>
		</div>
		<div class="section1">
			
			<?php foreach ($optionsGroup as $option) { ?>
			<div class="contenue">
				<div>
					<img src="./<?php echo $option['image'] ?>" >
					<div class="ligne2"></div>
				</div>
				<DIV class="box1">
					<div>
						<p class="fran-totale"><?php echo $option['nomOption'] ?>
						</p>
					</div>
					<div>
						<p class="p3"><?php echo $option['description1'] ?></p>
						<p class="p3"><?php echo $option['description2'] ?>
						</p>
					</div>
					<div class="price">
						<h4><?php echo $option['prixOption'] ?>  DH / jour</h4>
					</div>
					<div class="boutton">
                        <form action="crudoptionController.php?action=edit" method="post">
						    <button class="boutton1">MODIFIER</button>
                            <input type="hidden" name="idoption" value="<?php echo $option['id_option'] ?>">
                        </form>
                        <form action="crudoptionController.php?action=delete" method="post">
                            <button class="boutton2">SUPPRIMER</button>
                            <input type="hidden" name="idoption" value="<?php echo $option['id_option'] ?>">
                        </form>
					</div>
				</DIV>
				
			</div>
			
			<?php } ?>
		</div>
        
	</div>
  <?php } else { if (empty($optionsGroup)) { ?>
            <div class="section1">
                <p>Aucune option disponible pour cette voiture.</p>
            </div>
    <?php } } ?>
  <?php } ?>

</body>
</html>
