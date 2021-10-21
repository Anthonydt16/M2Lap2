<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
		<p> <h1>indication pour les professeurs :</h1> apres validation des modif ou supp il faut aller sur une autre page pour les voir afficher car il y a un bug</p>

		</script>
	<?php
    $formulaireSelectIntervenant->afficherFormulaire();
    if(isset($formulaireModificationInter)){
      $formulaireModificationInter->afficherFormulaire();
    }
		?>
		<h1>formulaire ajout Intervenant</h1>
		<?php
		$formulaireAjoutInter->afficherFormulaire();
  ?>
	</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
