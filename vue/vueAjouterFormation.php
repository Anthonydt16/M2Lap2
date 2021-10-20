<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php
			/*
			*permet d'afficher un formulaire dans lequel nous pouvons ajouter des informations à une nouvelle formation
			*/
			echo '<div class="formulaireModifAjout">';

			echo '<form action="index.php?m2lMP=validerAjoutFormation" method="POST">';

			echo '<p class="nomChampsModifierFormation">Intitulé de la formation <input class="inputFormulaire" type="text" id="intitule" name="intitule"/></p>';

			echo '<p class="nomChampsModifierFormation">Description de la formation <input class="inputFormulaire" type="text" id="descriptif" name="descriptif"/></p>';

			echo '<p class="nomChampsModifierFormation">Durée de la formation <input class="inputFormulaire" type="text" id="duree" name="duree"/></p>';

			echo '<p class="nomChampsModifierFormation">Date d\'ouverture des inscriptions <input class="inputFormulaire" type="text" id="ouvertureInscription" name="ouvertureInscription" value="yyyy-mm-jj"/></p>';

			echo '<p class="nomChampsModifierFormation">Date de fermeture des inscriptions <input class="inputFormulaire" type="text" id="fermetureInscription" name="fermetureInscription" value="yyyy-mm-jj"/></p>';

			echo '<p class="nomChampsModifierFormation">Date de début de la formation <input class="inputFormulaire" type="text" id="debutFormation" name="debutFormation" value="yyyy-mm-jj"/></p>';

			echo '<p class="nomChampsModifierFormation">Nombre de places total <input class="inputFormulaire" type="text" id="effectifMax" name="effectifMax"/></p>';

			echo '</br>';

			echo '<input class="boutonFormaModifAjout" type="submit" name="insert" value="Ajouter" onclick="ajouterformation()"/>';//boutton valider la modification de la formation
			echo '</form>';

			echo '<form action="index.php?m2lMP=formation" method="POST">';
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
