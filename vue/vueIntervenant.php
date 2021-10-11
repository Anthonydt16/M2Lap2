<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
	<?php
    $formulaireSelectIntervenant->afficherFormulaire();
    if(isset($formulaireModificationInter)){
      $formulaireModificationInter->afficherFormulaire();
    }
  ?>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
