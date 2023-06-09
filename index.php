<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./VIEW/css/style.css" />
    <title>ViheculeSpace</title>
</head>
<body class="bac" >
<header> 
    <nav>
      <ul>      
        <img  src="./VIEW/images/my_logo_app.png"/>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Voitures</a></li>
        <li><a href="#">Réservations</a></li>
        <li><a href="#">À propos</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
        <div class="buttons">
			<a href="CONTROLLER/user/connexion/usersController.php?action=login" class="login">Login</a>
			<a href="CONTROLLER/user/connexion/usersController.php?action=signup" class="signup">Signup</a>
		    </div>
    </nav>
  </header>
</br>
</br>
    <section id="reservation">
		<div class="container container_reservation">
      <div class="title">
        <div class="title_content">
          <img  src="./VIEW/images/my_logo_app.png"/>
          <span>Wanna rent a car ? </span>
          <span> c </span>
        </div>
        <div class="line"></div>
      </div>
			<!-- <h2 style="color : yellow">Réserver une voiture</h2> -->
			<form action="#" method="post">
				<div>
					<label for="date-debut">
            <img src="./VIEW/images/started.png" />
            <span>Date de début </span>
          </label>
					<input type="date" id="date-debut" name="date-debut">
				</div>
				<div>
					<label for="date-fin">
            <img src="./VIEW/images/finished.png" />
            <span>Date de fin</span> 
          </label>
					<input type="date" id="date-fin" name="date-fin">
				</div>
				<div>
					<label for="lieu-depart">
            <img src="./VIEW/images/location.png" />
            <span>Agence de départ</span>
          </label>
					<select id="lieu-depart" name="lieu-depart">
						<option value="">Sélectionnez une ville</option>
						<option value="Casablanca">Casablanca</option>
						<option value="Rabat">Rabat</option>
						<option value="Salé">Salé</option>
						<option value="Agadir">Agadir</option>
					</select>
				</div>
				<div>
					<label for="lieu-depart">
            <img src="./VIEW/images/location.png" />
            <span>Agence de retour</span>
          </label>
					<select id="lieu-depart" name="lieu-depart">
						<option value="">Sélectionnez une ville</option>
						<option value="Casablanca">Casablanca</option>
						<option value="Rabat">Rabat</option>
						<option value="Salé">Salé</option>
						<option value="Agadir">Agadir</option>
					</select>
				</div>
				<div>
            <button type="submit">RECHERCHER UN VEHICULE</button>
				</div>
			</form>
		</div>
	</section>
    <div class="background" > 
            
        </div>

</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div class="title__1">
<H1>Pourquoi nous <SNAP class="title___1">faire confiance</snap>  ?</H1>
</div>
<section id="features">
    <div class="div1">
      <h2 class="H2-">Rapport qualité-prix</h2>
      <p class="text">Nous nous faisons un plaisir de proposer à nos clients les meilleurs tarifs grâce à des réductions que les agences de location mettent à notre disposition.</p>
    </div>
    <div class="div1">
      <h2 class="H2-">Options de location flexibles</h2>
      <p class="text">Nous offrons une gamme d'options de location pour répondre à vos besoins, que vous ayez besoin d'une voiture pour une journée ou pour un mois.</p>
    </div>
    <div class="div1">
      <h2 class="H2-">Service clientèle exceptionnel</h2>
      <p class="text">Notre équipe est disponible pour répondre à toutes vos questions et vous aider à trouver la voiture parfaite pour votre voyage.</p>
    </div>
  </section>
 
  
    <section id="cta">
    <h2>Réservez dès maintenant et économisez</h2>
    <p>Obtenez 10% de réduction sur votre première location en réservant dès maintenant.</p>
    <a href="#" class="button">Réserver maintenant</a>
  </section>
    <footer>
    <p>© 2023 Location de voitures. Tous droits réservés.</p>
    </footer>
</body>
</html>