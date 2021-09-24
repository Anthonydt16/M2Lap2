<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php
			//fonction qui s'incrémente quand on entre dans la condition d'affichage pour ne pas afficher le message d'erreur même si on y entre
			$testCondition=0;
			foreach ($tabFormation as $key){
				//si la date d'ouverture des inscriptions est anterieure à la date du jour, et que la date de fermeture est après la date du jour, Ou que la date de cloture est après à la date du jour, alors afficher les différentes formations
				if($key['dateOuvertinscriptions']<date("Y-m-d") && $key['dateClotureInscriptions']<date("Y-m-d") || $key['dateOuvertinscriptions']>date("Y-m-d"))
				{
					echo '<div class="divBtnForma">';
					echo '<p class=texteFormation>'.$key['intitule'].'</p>';
					echo '<p class=texteFormation>'.$key['descriptif'].'</p>';
					echo '<p class=texteFormation>'.'Durée : '.$key['duree'].'</p>';
					echo '<p class=texteFormation>'.'Ouverture inscriptions : '.$key['dateOuvertinscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Fermeture inscriptions : '.$key['dateClotureInscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Déput Formation : '.$key['DateDebutFormation'].'</p>';
					echo '<p class=texteFormation>'.'Effectif Max : '.$key['EffectifMax'].'</p>';
					echo '<a class="btnFormation" href=""'.' role="button">S'."'".'inscrire'.'</a>';
					echo '</div>';
				}
				else{
					$testCondition++;
				}
			}
			//permet de montrer à l'utilisateur s'il n'y a pas de futures formations ou de formations en cours
			if(!$testCondition==0){
				echo '<p>'.'Il n'."'".'y a pas de nouvelles formations pour le moment !'.'</p>';
			}
			?>
		</div>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
