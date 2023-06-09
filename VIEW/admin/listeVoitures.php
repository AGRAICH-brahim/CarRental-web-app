<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dashboard Admin</title>
	<link rel="stylesheet" href="../../VIEW/css/listevoiture.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- style de bare de recherche -->
</head>
<body>
	<div class="sidebar">
		<img src="../../VIEW/images/my_logo_app.png" alt="">
		<div class="center">
			<h1>Dashboard</h1>
		<nav>
			<ul>
				<li><a href="./adminController.php?action=acceuiladmin"><img src="../../VIEW/images/dashboard.png" alt="">Tableau de bord</a></li>
				<li><a href="./listeClientsController.php?action=listeclients"><img src="../../VIEW/images/client.png" alt="">Clients</a></li>
				<li><a href="./adminController.php?action=vehicules"><img src="../../VIEW/images/car.png" alt="">Véhicules</a></li>
				<li><a href="./listeReservationController.php?action=listereservation"><img src="../../VIEW/images/reservation.png" alt="">Réservations</a></li>
				<li><a href="#"><img src="../../VIEW/images/bill.png" alt="">Facturation</a></li>
				<li><a href="#"><img src="../../VIEW/images/settings.png" alt="">Paramètres</a></li>
			</ul>
		</nav>
		</div>
		
	</div>
	<main>
		<header>
			<h1>Bienvenue, Admin</h1>
			<form action="../loginOut.php?action=deconnexion" method="post">
			<button type="submit">Déconnexion</button>
			</form>
		</header>

	<hr>
	
	  <FORM class="barre_recherche">
        <div>
		<input type="text" placeholder="search" class="search">
		<button type="submit"><i class="fa fa-search"></i>	</button>
        </div>
        <div class="boutton">
            <a href="listevoitureController.php?action=ajoutervoiture">+ ajouter voiture</a>
        </div>
	  </FORM>
	
	<br>
		<section class="tableau">
			<h2>La liste de toutes les voitures </h2>
			<table class="table1">
				<thead>
					<tr>
						<th>id</th>
						<th>Marque</th>
						<th>Modèle</th>
						<th>Matricule</th>
						<th>Prix</th>
						<th>Carburant</th>
						<th>Option</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($voitures as $voiture) { ?>
					<tr>
						<td> <img src="./crudvoiture/<?php echo $voiture['photo']; ?>" style="display:flex;width:60px;height:60px"> <?php echo  $voiture['id_vehicule'] ; ?></td>
						<td><?php echo  $voiture['Marque'] ; ?></td>
						<td><?php echo  $voiture['Modele'] ; ?></td>
						<td><?php echo  $voiture['Matricule']; ?></td>
						<td><?php echo  $voiture['Prix']  ?></td>
						<td><?php echo  $voiture['typeCarburant'] ?></td>
						
						<td>
                            <div style="display : flex ; flex-direction : row ; gap : 10px ;">
                                <form action="./crudoption/crudoptionController.php?action=ajouteroption" method="POST"> <!-- Ajout du formulaire -->
                                <input type="hidden" name="id" value="<?php echo $voiture['id_vehicule'] ; ?>">
      
                                <button type="submit" style="color : white; display:flex; cursor: pointer; justify-content:center;align-items: center; background-color : #4CAF50 ; border : none ; width : 55px ; height : 35px ; border-radius : 8px" >Add option</button>
                                </form>

					            <form action="./crudoption/crudoptionController.php?action=listeoption" method="POST"> <!-- Ajout du formulaire -->
                                <input type="hidden" name="iid" value="<?php echo $voiture['id_vehicule'] ; ?>">
      
                                <button type="submit" style="color : white; display:flex; cursor: pointer; justify-content:center;align-items: center; background-color : green ; border : none ; width : 55px ; height : 35px ; border-radius : 8px" >ALL options</button>
                                </form>
                            </div>
						</td>

						<td>
                            <div style="display : flex ; flex-direction : row ; gap : 10px ;">
                                <form action="./crudvoiture/crudvoitureController.php?action=delete" method="POST"> <!-- Ajout du formulaire -->
                                <input type="hidden" name="id" value="<?php echo $voiture['id_vehicule'] ; ?>">
      
                                <button type="submit" style="color : white; display:flex; cursor: pointer;  justify-content:center;align-items: center; background-color : red ; border : none ; width : 50px ; height : 30px ; border-radius : 8px" onclick="return confirm('Voulez-vous vraiment supprimer cette voiture ?')">Delete</button>
                                </form>

					            <form action="./crudvoiture/crudvoitureController.php?action=edit" method="POST"> <!-- Ajout du formulaire -->
                                <input type="hidden" name="iid" value="<?php echo $voiture['id_vehicule'] ; ?>">
                                <button type="submit" style="color : white;   display:flex; justify-content:center;align-items: center; cursor: pointer; background-color : green ; border : none ; width : 50px ; height : 30px ; border-radius : 8px" >Update</button>
                                </form>
                            </div>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</section>
		<section>
			<h2>Top 5 des véhicules réservés</h2>
			<ol>
				<li>Voiture A</li>
				<li>Camion B</li>
				<li>Voiture C</li>
				<li>Camion D</li>
				<li>Voiture E</li>
			</ol>
		</section>
	</main>
</body>
</html>
