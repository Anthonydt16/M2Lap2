<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>

		<?php

			foreach ($tabLigue as $key){
				echo '<a class="btn btn-primary" id= href="http://localhost/code/controleurLigues?m2lMP='.$key['nomLigue'].' role="button">Voir tout les club de '.$key['nomLigue'].'</a>';
		}

		?>


	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
