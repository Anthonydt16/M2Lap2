<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php
      foreach ($tabDemandeFormation as $key){
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
      ?>
		</div>

	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
