<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>

		<?php


		//Vérification connecter ou non
		if(isset($_SESSION['identification'])){
		  $user = unserialize($_SESSION['unUtilisateur']);

			//vérification secrétaire ou non
			$user = unserialize($_SESSION['unUtilisateur']);
			$FonctUser = $user->getIdFonct();
			if($FonctUser==1){
				//Afficher avec bouton modifier, supprimer et ajouter
				foreach ($tabLigue as $keyL){
					echo '<div class="Ligue">';
							echo '<h1>'.$keyL['nomLigue'].'</h1>';
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
					echo '<h1>'.$keyL['nomLigue'].'</h1>';
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
					echo '<h1>'.$keyL['nomLigue'].'</h1>';
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




?>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
