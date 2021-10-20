<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<div class = center-div>
			<?php
			/*
			*Entete du tableau qui affiche toutes les demandes d'inscription en cour
			*/
			echo '<table border=4 cellspacing=7 cellpadding=7 width=95% class="tableauInscrit">';
			echo '<tr class="headTableau">';
			echo '<th>Formation</th>';
			echo '<th>Nom</th>';
			echo '<th>Prénom</th>';
			echo '<th>Statut</th>';
			echo '<th>Date de demande</th>';
			echo '</tr>';
      foreach ($tabDemandeFormation as $key){//créé une ligne avec un formulaire pour accepter ou refuser une inscription. Les inscriptions sont stockées dans un tableau

				echo '<tr>';
				echo '<form action="index.php?m2lMP=accepterRefuserInscription" method="POST">';
				echo '<td><input type="hidden" id="idForma" name="idForma" value="'.$key['idForma'].'"/></td>';
				echo '<td>'.$key['intitule'].'</td>';
				echo '<td><input type="hidden" id="idUser" name="idUser" value="'.$key['idUser'].'"/></td>';
				echo '<td>'.$key['nom'].'</td>';
				echo '<td>'.$key['prenom'].'</td>';
				echo '<td>'.$key['statut'].'</td>';
				echo '<td>'.$key['DateInscription'].'</td>';
				echo '<td><input class="boutonInscrit" type="submit" name="accept" value="Accepter" onclick="accepterinscription()"/></td>';
				echo '<td><input class="boutonInscrit" type="submit" name="refus" value="Refuser" onclick="refuserinscription()"/></td>';
				echo '</form>';
				echo '</tr>';

      }
			echo '</table>';
      ?>
		</div>

	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
