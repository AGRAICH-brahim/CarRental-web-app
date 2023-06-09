<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Ajouter une voiture - Location de voitures</title>
	<link rel="stylesheet" href="../../../VIEW/css/addVoiture.css">
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
		<h1>Ajouter Voiture</h1>
		<button>Déconnexion</button>
	</header>

	<main>
		<section>
		<form action="crudvoitureController.php?action=savevoiture" method="POST" enctype="multipart/form-data">
		<fieldset class="index1"> 
			<div class="container_">
				<div class="container_two">

					<div class="container_1">
					<label for="marque">Marque </label>
					<input type="text" name="marque" id="marque" required >
					</div>

					<div class="container_1">
					<label for="modele">Modèle </label>
					<input type="text" name="modele" id="modele" required>
					</div>

				</div>

				<div class="container_two">
				
					<div class="container_1">
					<label for="coleur">Coleur</label>
					<input type="text" name="coleur" id="coleur"  required>
					</div>

					<div class="container_1">
					<label for="prix">Matricule</label>
					<input type="text" name="Matricule" id="Matricule"  required>
					</div>

				</div>
				
				<div class="container_two">
					<div class="container_1">
					<label for="prix">Prix par jour (en MAD) </label>
					<input type="number" name="prix" id="prix"  required>
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset>
			

                <div class="container_">
                    <div class="container_two">

                        <div class="container_1">
                        <label for="aNbr_place">Nombre de place </label>
                        <input type="number" name="Nbr_place" id="Nbr_place"  step="1" required><br>
                        </div>

                        <div class="container_1">
                        <label for="image">Photo </label>
                        <input type="file" name="image" id="image" accept="image/*" required>
                        </div>
                    </div>
                
                </div>
            <div class="container_two">
                    <div class="container__1">
                        <div class="container_1">
                            <label for="Carburant">Type de Carburant</label>
                            <div class="radio_">
                            <input type="radio" name="Carburant" value="Gasoil" id="Gasoil"><label for="Gasoil">Gasoil</label><br>
                            <input type="radio" name="Carburant" value="Essence" id="Essence"><label for="Essence">Essence</label><br>
                            <input type="radio" name="Carburant" value="Electrique" id="Electrique"><label for="Electrique">Electrique</label><br>
                        </div>

                        <div class="container_1">
                            <label for="Carburant">Type de transmission</label>
                            <div class="radio_">
                            <input type="radio" name="transmission" value="Manuelle" id="manuelle"><label for="manuelle">Manuelle</label><br>
                            <input type="radio" name="transmission" value="Automatique" id="automatique"><label for="automatique">Automatique</label><br>
                        </div>
                    </div>
            </div>
		</div>
		</fieldset>

		<fieldset>

			<div class="pad">
			<div class="container_">
			<div class="container_1">
			<label for="text_d">Description</label>
			<textarea name="text_d" id="text_d" cols="50" rows="5"></textarea>
			</div>

		</div>
	</div>
		</fieldset>
		<div class="envoyer">
			<button type="submit">Ajouter</button>
			</div>
		</form>
	</section>
	</main>
	
</body>
</html>
