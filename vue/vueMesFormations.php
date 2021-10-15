<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php
			$testCondition=0;
      foreach ($tabMesFormations as $key){ //retourne les formations auxquelles l'utilisateur connecté est inscrit.
        echo '<div class="divBtnForma">';
        echo '<p class=texteFormation>'.$key['intitule'].'</p>';
        echo '<p class=texteFormation>'.$key['descriptif'].'</p>';
        echo '<p class=texteFormation>'.'Durée : '.$key['duree'].'</p>';
        echo '<p class=texteFormation>'.'Ouverture inscriptions : '.$key['dateOuvertinscriptions'].'</p>';
        echo '<p class=texteFormation>'.'Fermeture inscriptions : '.$key['dateClotureInscriptions'].'</p>';
        echo '<p class=texteFormation>'.'Début Formation : '.$key['DateDebutFormation'].'</p>';
        echo '<p class=texteFormation>'.'Effectif Max : '.$key['EffectifMax'].'</p>';
        echo '<a class="btnFormation">Inscrit</a>';
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
