<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php
			$testCondition=0;

			echo '<div class="selectBarre">';
			echo '<form action="index.php?m2lMP=annulerInscription" method="POST">';//formulaire annuler l'inscription

			echo '<label for="form-select">Sélectionnez une formation à annuler :  </label>';
			echo '<select name="forma" id="forma">';//barre de sélection de la formation
			foreach ($selectMesFormations as $key){
					echo '<option value="'.$key['idForma'].'">'.$key['intitule'].'</option>';
			}
			echo '</select>';

			echo '<input class="boutonForma" type="submit" name="delete" value="Annuler"/>';//bouton annuler l'inscritpion
			echo '</div>';


      foreach ($tabMesFormations as $key){ //retourne les formations auxquelles l'utilisateur connecté est inscrit.
        echo '<div class="divBtnForma">';
        echo '<p class=texteFormation>'.$key['intitule'].'</p>';
        echo '<p class=texteFormation>'.$key['descriptif'].'</p>';
        echo '<p class=texteFormation>'.'Durée : '.$key['duree'].'</p>';
        echo '<p class=texteFormation>'.'Ouverture inscriptions : '.$key['dateOuvertinscriptions'].'</p>';
        echo '<p class=texteFormation>'.'Fermeture inscriptions : '.$key['dateClotureInscriptions'].'</p>';
        echo '<p class=texteFormation>'.'Début Formation : '.$key['DateDebutFormation'].'</p>';
        echo '<p class=texteFormation>'.'Effectif Max : '.$key['EffectifMax'].'</p>';
				$etatInscription = $key['EtatInscrit'];
				if($etatInscription=='0'){
					echo '<p class=texteFormationEnAttente>État de l\'inscription : En attente</p>';
				}
				elseif($etatInscription=='1'){
					echo '<p class=texteFormationInscrit>État de l\'inscription : Inscrit</p>';
				}
        echo '</div>';
				$testCondition++;
      }
			if ($testCondition == 0){ //retourne le message si aucune formation n'apparait sur la page.
				echo '<p class=MsgNoFormation>'.'Vous n'."'".'êtes inscrit à aucune formation pour le moment.'.'</p>';
			}
      ?>
    </div>

  </main>
  <footer>
    <?php include 'bas.php' ;?>
  </footer>
</div>
