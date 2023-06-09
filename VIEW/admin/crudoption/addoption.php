<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajouter une voiture - Location de voitures</title>
	<link rel="stylesheet" href="../../../VIEW/css/addoption.css">
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
		<h1>Ajouter Option</h1>
		<button>Déconnexion</button>
	</header>
<div class="center">
	<main>
		<section>
		<form action="crudoptionController.php?action=saveoption" method="POST" enctype="multipart/form-data">
		<fieldset class="index1"> 
			<div class="container_">
				<div class="container_two">
                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ; ?>">
					<div class="container_1">
                        <label for="pet-select">Choisir le type d'option:</label>

                        <select name="typeOption" id="pet-select" required>
                            <option value="">--Please choose an option--</option>
                            <option value="Franchises">Franchises</option>
                            <option value="Pour le confort de votre bébé">Pour le confort de votre bébé</option>
                            <option value="Confort & Connectivité">Confort & Connectivité</option>
                            <option value="Assurances">Assurances</option>
                        </select>
					</div>

					<div class="container_1">
					<label for="nomOption">Nom de l'option </label>
					<input type="text" name="nomOption" id="nomOption" required>
					</div>

				</div>

				<div class="container_two">
				
					<div class="container_1">
					<label for="description1">descrioption 1</label>
					<input type="text" name="description1" id="description1"  >
					</div>

					<div class="container_1">
					<label for="description2">description 2</label>
					<input type="text" name="description2" id="description2" >
					</div>

				</div>
				
				<div class="container_two">
					<div class="container_1">
					<label for="prix">Prix par jour (en MAD) </label>
					<input type="number" name="prixOption" id="prix"  required>
					</div>

                    <div class="container_1">
                        <label for="image">Photo </label>
                        <input type="file" name="image" id="image" accept="image/*" required>
                        </div>
				</div>
			</div>
		</fieldset>

		
		<div class="envoyer">
			<button type="submit">Ajouter l'option</button>
			</div>
		</form>
	</section>
	</main>
</div>
</body>
</html>
