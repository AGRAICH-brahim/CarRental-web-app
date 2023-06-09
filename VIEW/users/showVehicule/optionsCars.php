<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Options de la voiture</title>
	<link rel="stylesheet" href="../../../VIEW/css/optionCars.css">
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
 	<div class="option-choix">
		<div class="choisissez">
			<h2>CHOISISSEZ VOS OPTIONS</h2>
			<h3 style="color:black; display: flex; position: relative;left: 100px;font-family: Arial, sans-serif;width: 40%;">Nombre de jour de Location : <?php echo $numberOfDays; ?> Jours</h3>

		</div>
		<div class="ligne">
			<div class="line1"></div>
			<div class="line1"></div>
		</div>
		<div class="input-choix">
			<div class="choix1">
                <div class="totale_prix">
					<div>
						<input type="radio" name="myRadio" id="radio1" checked>
						<label for="radio1">Couverture basique</label>
					</div>
					<div >
						<label> <?php 
						echo $prix_totale_avec_options  ; ?> DH</label>
					</div>
				</div>
				<DIV>
					<p>La couverture basique est incluse dans le tarif de location. 
						Elle limite votre responsabilité financière en cas de dommages causés au véhicule à la hauteur du montant de la franchise.
						 Des garanties complémentaires peuvent être cochées pour une couverture personnalisée.</p>
				</DIV>
				<div>
					<p class="p1">J'opte pour la location classique avec franchise</p>
				</div>
			</div>
			<div class="choix2">
            <div class="totale_prix">
					<div>
                        <input type="radio" name="myRadio" id="radio2">
				        <label for="radio2">Couverture totale " 0 Risque + 0 Franchise "</label>
					</div>
					<div>
						27832 DH
					</div>
				</div>
				<DIV>
					<p>Le pack confort+ annule votre responsabilité financière en cas de dommages causés au véhicule du fait d'une 
						collision ou d'une tentative de vol (SPCDW). Il inclut la protection dans le cas de dommages causés aux pare-brise 
						(bris de glace) et crevaison simple (WWI). Le pack confort+ inclut également la protection du conducteur et des
						 passagers du véhicule en cas de préjudice corporel ou décès et/ou dommage (PAI)Le pack confort+ annule votre 
						 responsabilité financière en cas de dommages causés au véhicule du fait d'une collision ou d'une tentative de 
						 vol (SPCDW). Il inclut la protection dans le cas de dommages causés aux pare-brise (bris de glace) et crevaison 
						 simple (WWI). Le pack confort+ inclut également la protection du conducteur et des passagers du véhicule en cas 
						 de préjudice corporel ou décès et/ou dommage (PAI).</p>
				</DIV>
				<div>
					<p class="p2">J'opte pour la location all inclusive avec 0 franchise</p>
				</div>
			</div>
			</div>
		</div>
	</div>

	<?php  foreach ($groupedOptions as $type => $optionsGroup) {  ?>
	<?php if (!empty($optionsGroup)) { ?>
        <?php if ($type=='Franchises') { ?>
            
    <div class="containner1">

		<div>
			<h2><?php echo $type ?></h2>
			<h4>La Franchise accident de ce véhicule est de 14 400 DH</h4>
		</div>
		<div class="section1">
			
			<?php foreach ($optionsGroup as $option) { ?>
			<div class="contenue">
				<div>
					<img src="../../admin/crudoption/<?php echo $option['image'] ?>" >
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
						<div><h4>TOTALE : <?php echo $option['prixOption'] * $numberOfDays ?>  DH </h4></div>
						<div><p><?php echo $option['prixOption'] ?>  DH / jour</p></div>
					</div>
					<div class="boutton">  
						<form action="" method="post">
							<input type="hidden" name="id_option" value="<?php echo $option['id_option']; ?>">
							<input type="hidden" name="prix_option" value="<?php echo $option['prixOption']; ?>">
							<button type="submit" name="add_option" id="btn_add_<?php echo $option['id_option']; ?>" class="<?php echo (in_array($option['id_option'], $_SESSION['selected_options']) ? 'selected' : ''); ?>">Ajouter</button>
						</form>
                    </div>
				</DIV>
				
			</div>
			
			<?php } ?>
		</div>
        
	</div>
	
            <?php } else {  ?>
            
        <div class="containner1">

            <div>
                <h2><?php echo $type ?></h2>
                <h4>La Franchise accident de ce véhicule est de 14 400 DH</h4>
            </div>
            <div class="section1">
                
                <?php foreach ($optionsGroup as $option) { ?>
                <div class="contenue">
                    <div>
                        <img src="../../admin/crudoption/<?php echo $option['image'] ?>" >
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
                            <div><h4>TOTALE : <?php echo $option['prixOption'] * $numberOfDays ?>  DH </h4></div>
							<div><p><?php echo $option['prixOption'] ?>  DH / jour</p></div>
                        </div>
                        <div class="boutton">  


						<form action="" method="post">
							<input type="hidden" name="id_option" value="<?php echo $option['id_option']; ?>">
							<input type="hidden" name="prix_option" value="<?php echo $option['prixOption']; ?>">
							<button type="submit" name="add_option" id="btn_add_<?php echo $option['id_option']; ?>" class="<?php echo (in_array($option['id_option'], $_SESSION['selected_options']) ? 'selected' : ''); ?>">Ajouter</button>
						</form>


                        </div>
                    </DIV>
					<style>
	 .boutton button.selected {
    background-color: green;
    color: white;
	box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
	   /* Autres styles personnalisés pour les boutons sélectionnés */
}


</style>      
                </div>
                
                <?php } ?>
            </div>
            
        </div>
		
        <?php } ?>
        <?php } ?>
    <?php  } ?>
</section>


<div class="validation">
	<form action="../validerReservationController/validerpayerController.php?action=insri-client" method="post">
		<button type="submit">Valider votre réservation</button>
	</form>
</div>

<footer>
    <p>© 2023 Location de voitures. Tous droits réservés.</p>
    </footer>
</body>
</html>