<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>

		<?php

			foreach ($tabLigue as $keyL){
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
		}

		?>


	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
