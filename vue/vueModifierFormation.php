<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php

			echo '<div class="formulaireModifAjout">';

			echo '<form action="index.php?m2lMP=validerModificationFormation" method="POST">';
			foreach ($tabformaDAO as $key){//créé un affichage avec des champs à remplir qui seront récupérés pour modifier une formation

				echo '<input class="inputFormulaire" type="hidden" id="idForma" name="idForma" value="'.$key['idForma'].'"/>';

				echo '<p class="nomChampsModifierFormation">Intitulé de la formation <input class="inputFormulaire" type="text" id="intitule" name="intitule" value="'.$key['intitule'].'"/></p>';

				echo '<p class="nomChampsModifierFormation">Description de la formation <input class="inputFormulaire" type="text" id="descriptif" name="descriptif" value="'.$key['descriptif'].'"/></p>';

				echo '<p class="nomChampsModifierFormation">Durée de la formation <input class="inputFormulaire" type="text" id="duree" name="duree" value="'.$key['duree'].'"/></p>';

				echo '<p class="nomChampsModifierFormation">Date d\'ouverture des inscriptions <input class="inputFormulaire" type="text" id="ouvertureInscription" name="ouvertureInscription" value="'.$key['dateOuvertinscriptions'].'"/></p>';

				echo '<p class="nomChampsModifierFormation">Date de fermeture des inscriptions <input class="inputFormulaire" type="text" id="fermetureInscription" name="fermetureInscription" value="'.$key['dateClotureInscriptions'].'"/></p>';

				echo '<p class="nomChampsModifierFormation">Date de début de la formation <input class="inputFormulaire" type="text" id="debutFormation" name="debutFormation" value="'.$key['DateDebutFormation'].'"/></p>';

				echo '<p class="nomChampsModifierFormation">Nombre de places total <input class="inputFormulaire" type="text" id="effectifMax" name="effectifMax" value="'.$key['EffectifMax'].'"/></p>';

				echo '</br>';
			}

			echo '<input class="boutonFormaModifAjout" type="submit" name="alter" value="Modifier" onclick="modifierFormation()"/>';//boutton valider la modification de la formation
			echo '</form>';

			echo '<form action="index.php?m2lMP=formation" method="POST">';//retourne sur la vue formation après avoir appuyer sur le bouton
			echo '<input class="boutonFormaModifAjout" type="submit" name="annuler" value="Annuler"/>';//boutton annuler la modification de la formation
			echo '</form>';

			echo '</div>';

      ?>
    </div>

  </main>
  <footer>
    <?php include 'bas.php' ;?>
  </footer>
</div>
