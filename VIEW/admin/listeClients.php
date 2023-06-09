<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dashboard Admin</title>
	<link rel="stylesheet" href="../../VIEW/css/listeClients.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- style de bare de recherche -->
</head>
<body>
	<div class="sidebar">
		<img src="../../VIEW/images/my_logo_app.png" alt="">
		<div class="center">
			<h1>Dashboard</h1>
		<nav>
			<ul>
				<li><a href="adminController.php?action=acceuiladmin"><img src="../../VIEW/images/dashboard.png" alt="">Tableau de bord</a></li>
				<li><a href="./listeClientsController.php?action=listeclients"><img src="../../VIEW/images/client.png" alt="">Clients</a></li>
				<li><a href="adminController.php?action=vehicules"><img src="../../VIEW/images/car.png" alt="">Véhicules</a></li>
				<li><a href="#"><img src="../../VIEW/images/reservation.png" alt="">Réservations</a></li>
				<li><a href="#"><img src="../../VIEW/images/bill.png" alt="">Facturation</a></li>
				<li><a href="#"><img src="../../VIEW/images/settings.png" alt="">Paramètres</a></li>
			</ul>
		</nav>
		</div>
		
	</div>
	<main>
		<header>
			<h1>Bienvenue, Admin</h1>
			<button>Déconnexion</button>
		</header>
						<?php session_start(); // affiche un message
								if (isset($_SESSION['message'])) {
									echo "<p style='position : relative ; left : 500px'>{$_SESSION['message']}</p>";
									unset($_SESSION['message']);
									
									// Vérifier si le temps d'affichage du message est écoulé
									if (isset($_SESSION['show_message_until']) && time() > $_SESSION['show_message_until']) {
										unset($_SESSION['show_message_until']);
										header('Location: index.php');
										exit();
									}
								} ?>

		
	<hr>
	
	  <FORM class="barre_recherche">
        <div>
		<input type="text" placeholder="search" class="search">
		<button type="submit"><i class="fa fa-search"></i>	</button>
        </div>
        
	  </FORM>
	
	<br>
		<section class="tableau">
			<h2>Liste de toutes les Clients</h2>
			<table class="table1">
				<thead>
					<tr>
                        <th>Civilité</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>E-mail</th>
						<th>Telephone</th>
                        <th>id Client</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($clients as $client) { ?>
					<tr>
                    <td><?php echo  $client['civilite'] ?></td>
						<td><?php echo  $client['nom']  ; ?></td>
						<td><?php echo  $client['prenom'] ; ?></td>
						<td><?php echo  $client['email'] ; ?></td>
						<td><?php echo  $client['telephone']; ?></td>
						<td><?php echo  $client['id_client']; ?></td>
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
