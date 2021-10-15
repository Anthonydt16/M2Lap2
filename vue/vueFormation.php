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
				echo '<div>';
				echo '<div class="selectBarre">';
				echo '<form action="index.php?m2lMP=inscription" method="POST">';
				echo '<input class="ajouter" type="submit" name="insert" value="ajouter" href="vue/vueAjouterFormation.php"/> ';
				echo '<label for="form-select">Sélectionnez une formation :  </label>';
				echo '<select name="forma" id="forma">';
				echo '<option value="">----</option>';
				foreach ($tabFormationResponsable as $key){
						echo '<option value="'.$key['idForma'].'">'.$key['intitule'].'</option>';
				}
				echo '</select>';
				echo '<input class="boutonForma" type="submit" name="delete" value="Supprimer" onclick="supprimerFormation()" />';
				echo '<input class="boutonForma" type="submit" name="alter" value="Modifier" href="vue/vueModifierFormation.php"/>';
				echo '</form>';
				echo '</div>';

				foreach ($tabFormationResponsable as $key){
					echo '<div class="divBtnForma">';
					echo '<p class=texteFormation>'.$key['intitule'].'</p>';
					echo '<p class=texteFormation>'.$key['descriptif'].'</p>';
					echo '<p class=texteFormation>'.'Durée : '.$key['duree'].'</p>';
					echo '<p class=texteFormation>'.'Ouverture inscriptions : '.$key['dateOuvertinscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Fermeture inscriptions : '.$key['dateClotureInscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Début Formation : '.$key['DateDebutFormation'].'</p>';
					echo '<p class=texteFormation>'.'PlacesRestantes : '.$key['PlacesRestantes'].'</p>';
					echo '</div>';
				}
			}

			else{
				//fonction qui s'incrémente quand on entre dans la condition d'affichage pour ne pas afficher le message d'erreur même si on y entre
				$testCondition=0;

				echo '<div>';
				echo '<div class="selectBarre">';
				echo '<form action="index.php?m2lMP=inscription" method="POST">';
				echo '<label for="form-select">Sélectionnez une formation :  </label>';
				echo '<select name="forma" id="forma">';
				echo '<option value="">----</option>';
				foreach ($tabFormation as $key){
						echo '<option value="'.$key['idForma'].'">'.$key['intitule'].'</option>';
				}
				echo '</select>';
				echo '<input type="submit" name="insert" value="S'."'".'inscrire'.'" onclick="demandeInscription()" />';
				echo '</form>';
				echo '</div>';

				foreach ($tabFormation as $key){
					echo '<div class="divBtnForma">';
					echo '<p class=texteFormation>'.$key['intitule'].'</p>';
					echo '<p class=texteFormation>'.$key['descriptif'].'</p>';
					echo '<p class=texteFormation>'.'Durée : '.$key['duree'].'</p>';
					echo '<p class=texteFormation>'.'Ouverture inscriptions : '.$key['dateOuvertinscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Fermeture inscriptions : '.$key['dateClotureInscriptions'].'</p>';
					echo '<p class=texteFormation>'.'Début Formation : '.$key['DateDebutFormation'].'</p>';
					echo '<p class=texteFormation>'.'Effectif Max : '.$key['EffectifMax'].'</p>';
					echo '</div>';
					$testCondition++;
				}
				echo '</div>';
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
