<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php
			$user = unserialize($_SESSION['unUtilisateur']);
			$FonctUser = $user->getIdFonct();
			if ($FonctUser==4){
				echo '<a class="btnFormationAjouter" role="button">Ajouter une formation</a>';
				foreach ($tabFormationResponsable as $key){
					echo '<div class="divBtnForma">';
					echo '<input type="image" src="images/croix.png" class="btnSuppForma" role="button"/>';
					echo '<p class=texteFormation>'.$key['intitule'].'</p>';
					echo '<p class=texteFormation>'.$key['descriptif'].'</p>';
					echo '<p class=texteFormation>'.'Durée : '.$key['duree'].'</p>';
					echo '<p class=texteFormation>'.'Ouverture inscriptions : '.$key['dateOuvertinscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Fermeture inscriptions : '.$key['dateClotureInscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Début Formation : '.$key['DateDebutFormation'].'</p>';
					echo '<p class=texteFormation>'.'PlacesRestantes : '.$key['PlacesRestantes'].'</p>';
					echo '<a class="btnFormation" role="button">Modifier</a>';
					echo '</div>';
				}
			}

			else{
				//fonction qui s'incrémente quand on entre dans la condition d'affichage pour ne pas afficher le message d'erreur même si on y entre
				$testCondition=0;
				foreach ($tabFormation as $key){
					echo '<div class="divBtnForma">';
					echo '<p class=texteFormation>'.$key['intitule'].'</p>';
					echo '<p class=texteFormation>'.$key['descriptif'].'</p>';
					echo '<p class=texteFormation>'.'Durée : '.$key['duree'].'</p>';
					echo '<p class=texteFormation>'.'Ouverture inscriptions : '.$key['dateOuvertinscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Fermeture inscriptions : '.$key['dateClotureInscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Début Formation : '.$key['DateDebutFormation'].'</p>';
					echo '<p class=texteFormation>'.'Effectif Max : '.$key['EffectifMax'].'</p>';
					echo '<input class="btnFormation" type="submit" name="select" value="S'."'".'inscrire'.'" onclick="select()" />';
					//echo '<a class="btnFormation1" role="button" value="envoyer">S'."'".'inscrire'.'</a
					//echo '<a class="btnFormation" role="button" value="envoyer">S'."'".'inscrire'.'</a>';
					echo '</div>';
					$testCondition++;
				}
				//permet de montrer à l'utilisateur s'il n'y a pas de futures formations ou de formations en cours
				if($testCondition==0){
					echo '<p class=MsgNoFormation>'.'Il n'."'".'y a pas de nouvelles formations pour le moment !'.'</p>';
				}
			}
			?>
		</div>

	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
