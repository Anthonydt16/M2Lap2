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

								//Formulaire ajouter
								echo "<div id='AjoutLigue'>";

										echo'<form action="'. $_SERVER['PHP_SELF'] .'" method="post">';
										$formulaireAjoutLigue->afficherFormulaire();
										echo'<form>';
								echo '</div>';

								// Formulaire supprimer
								echo "<div id='SupprLigue'>";

										$formulaireSuppLigue->afficherFormulaire();
								echo '</div>';

								// Formulaire Modifier
								echo "<div id='ModifLigue'>";

										$formulaireModifLigue->afficherFormulaire();
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

					//Fonction Ajout
					if(isset($_POST['AjoutidLigue'])){

						if(isset($_POST['submitAjoutLigue'])){

							$uneLigue->ajoutLigue($_POST['AjoutidLigue'], $_POST['AjoutNomLigue'], $_POST['AjoutadresseLigue'], $_POST['AjoutDescriptif']);

						}
					}

					//Fonction supprimer A finir
					if(isset($_POST['SupprLigue'])){

						if(isset($_POST['submitSupprLigue'])){

							$uneLigue->suppLigue($_POST['SupprLigue']);

						}
					}

					//Fonction Modifier A Finir
					if(isset($_POST['ModifidLigue'])){

						if(isset($_POST['submitModifLigue'])){

							$uneLigue->updateLigue($_POST['ModifidLigue'], $_POST['ModifNomLigue'], $_POST['ModifadresseLigue'], $_POST['ModifDescriptif']);

						}
					}

?>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
