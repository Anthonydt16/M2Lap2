<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>

		<?php
		$user = unserialize($_SESSION['unUtilisateur']);
		$FonctUser = $user->getIdFonct();
		if($FonctUser==1){
			echo'<button id="boutonForm" type="button" class="btn btn-primary btn-lg btn-block">Ajouter une Ligue</button>';

		}
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
						if($FonctUser==1){
							echo'<button id="boutonForm" type="button" class="btn btn-primary btn-lg btn-block">Modifier la Ligue</button>';
							echo'<button id="boutonForm" type="button" class="btn btn-primary btn-lg btn-block">Supprimer la Ligue</button>';
						}
				echo '</div>';
		}
		?>



	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
