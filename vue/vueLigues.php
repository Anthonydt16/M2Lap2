<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>

		<?php

		//Vérification connecter ou non
		if(isset($_SESSION['unUtilisateur'])){
		  $user = unserialize($_SESSION['unUtilisateur']);

			//vérification secrétaire ou non
			$user = unserialize($_SESSION['unUtilisateur']);
			$FonctUser = $user->getIdFonct();
			if($FonctUser==1){

				//Afficher avec bouton modifier, supprimer et ajouter
				echo'<button id="boutonAjouterLigue" type="button" class="btn btn-primary btn-lg btn-block">Ajouter une Ligue/Clubs</button>';
				echo'<button id="boutonModifLigue" type="button" class="btn btn-primary btn-lg btn-block">Modifier la Ligue/Clubs</button>';
				echo'<button id="boutonSupprLigue" type="button" class="btn btn-primary btn-lg btn-block">Supprimer la Ligue/Clubs</button>';
				foreach ($tabLigue as $keyL){
					echo '<div class="Ligue">';
							echo '<h1>Ligue de '.$keyL['nomLigue'].'</h1>';
							echo '<p>'.$keyL['descriptif'].'</p>';
								foreach ($tabClub as $keyC) {
									if($keyL['idLigue']==$keyC['idLigue']){
										echo '<ul>';
				  					echo '<li><a>'.$keyC['nomClub'].'</a></li>';
										echo '<a>~'.$keyC['adresseClub'].'</a>';
										echo '</ul>';
									}
								}
				echo '</div>';
				}


			}
			//afficher sans les Bouton (pour tout autre que la secrétaire)
			else{
				foreach ($tabLigue as $keyL){
					echo '<div class="Ligue">';
					echo '<h1>Ligue de '.$keyL['nomLigue'].'</h1>';
					echo '<p>'.$keyL['descriptif'].'</p>';
				foreach ($tabClub as $keyC) {
					if($keyL['idLigue']==$keyC['idLigue']){
						echo '<ul>';
						echo '<li><a>'.$keyC['nomClub'].'</a></li>';
						echo '<a>~'.$keyC['adresseClub'].'</a>';
						echo '</ul>';
				   }
				}
					echo '</div>';
				}
					}
			}


?>

<!-- Formulaire ajouter Invisible -->
<div id='invisibleAjoutLigue'>

	<?php
	if($user->getIdFonct()==1){

		$formulaireAjoutLigue->afficherFormulaire();



	?>
	<button id="boutonRetourAjoutLigue" class="btn btn-primary" type="submit">Retour</button>
	<?php }?>
</div>

<!-- Formulaire supprimer Invisible -->
<div id='invisibleSupprLigue'>

	<?php
	if($user->getIdFonct()==1){


		$formulaireSuppLigue->afficherFormulaire();

	?>
	<button id="boutonRetourSupprLigue" class="btn btn-primary" type="submit">Retour</button>
<?php }?>
</div>

<!-- Formulaire Modifier Invisible -->
<div id='invisibleModifLigue'>

	<?php

	if($user->getIdFonct()==1){
		$formulaireModifLigue->afficherFormulaire();
	?>
	<button id="boutonRetourModifLigue" class="btn btn-primary" type="submit">Retour</button>
<?php }?>
</div>

		<script>

		//Formulaire ajouter appartition
		document.getElementById("invisibleAjoutLigue").hidden = true;
		document.getElementById("boutonAjouterLigue")
						.addEventListener("click", function() {
			document.getElementById("invisibleAjoutLigue").hidden = false;

			// document.getElementById("impressionnant").hidden = false;
		}, false);


		document.getElementById("boutonRetourAjoutLigue")
						.addEventListener("click", function() {
			document.getElementById("invisibleAjoutLigue").hidden = true;
			}, false);


			//Formulaire supprimer appartition
			document.getElementById("invisibleSupprLigue").hidden = true;
							.addEventListener("click", function() {
				document.getElementById("invisibleSupprLigue").hidden = false;

				// document.getElementById("impressionnant").hidden = false;
			}, false);

			document.getElementById("boutonRetourSupprLigue")
							.addEventListener("click", function() {
				document.getElementById("invisibleSupprLigue").hidden = true;
				}, false);

				//Formulaire modifier apparition
				document.getElementById("invisibleModifLigue").hidden = true;
				document.getElementById("boutonModifLigue")
								.addEventListener("click", function() {
					document.getElementById("invisibleModifLigue").hidden = false;

					// document.getElementById("impressionnant").hidden = false;
				}, false);


				document.getElementById("boutonRetourModifLigue")
								.addEventListener("click", function() {
					document.getElementById("invisibleModifLigue").hidden = true;
					}, false);

		</script>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
