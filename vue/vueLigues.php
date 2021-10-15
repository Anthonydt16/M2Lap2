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

								//Formulaire ajouter Ligue
								echo "<div class='FormLigueClub'>";

										echo'<form action="'. $_SERVER['PHP_SELF'] .'" method="post">';
										$formulaireAjoutLigue->afficherFormulaire();
										echo'</form>';

										// Formulaire Modifier Ligue

												$formulaireModifLigue->afficherFormulaire();


								// Formulaire supprimer Ligue

										$formulaireSuppLigue->afficherFormulaire();
										echo "</div>";


								//Formulaire ajouter Club
								echo "<div class='FormLigueClub'>";

										echo'<form action="'. $_SERVER['PHP_SELF'] .'" method="post">';
										$formulaireAjoutClub->afficherFormulaire();
										echo'</form>';

										// Formulaire Modifier Club

												$formulaireModifClub->afficherFormulaire();



								// Formulaire supprimer Club

										$formulaireSuppClub->afficherFormulaire();
										echo "</div>";
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

			//Afficher pour les non connecté
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

					//Fonction Ajout Ligue
					if(isset($_POST['AjoutidLigue'])){

						if(isset($_POST['submitAjoutLigue'])){

							$uneLigue->ajoutLigue($_POST['AjoutidLigue'], $_POST['AjoutNomLigue'], $_POST['AjoutadresseLigue'], $_POST['AjoutDescriptif']);

						}
					}

					//Fonction supprimer Ligue
					if(isset($_POST['SupprLigue'])){

						if(isset($_POST['submitSupprLigue'])){

							$uneLigue->suppLigue($_POST['SupprLigue']);

						}
					}

					//Fonction Modifier Ligue
					if(isset($_POST['ModifidLigue'])){

						if(isset($_POST['submitModifLigue'])){

							$uneLigue->updateLigue($_POST['ModifidLigue'], $_POST['ModifNomLigue'], $_POST['ModifadresseLigue'], $_POST['ModifDescriptif']);

						}
					}

					//Fonction Ajout Club
					if(isset($_POST['AjoutidClub'])){

						if(isset($_POST['submitAjoutClub'])){

							$unClub->ajoutClub($_POST['AjoutidClub'], $_POST['AjoutnomClub'], $_POST['AjoutadresseClub'], $_POST['AjoutidLigueClub'], $_POST['AjoutidCommune']);

						}
					}

					//Fonction supprimer Club
					if(isset($_POST['SupprClub'])){

						if(isset($_POST['submitSupprClub'])){

							$unClub->suppClub($_POST['SupprClub']);

						}
					}

					//Fonction Modifier Club
					if(isset($_POST['ModifieridClub'])){

						if(isset($_POST['submitModifierClub'])){

							$unClub->updateClub($_POST['ModifieridClub'], $_POST['ModifiernomClub'], $_POST['ModifieradresseClub'], $_POST['ModifieridLigueClub'], $_POST['ModifieridCommune']);

						}
					}


?>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
