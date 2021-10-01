<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>

	<?php
	$beginning = 'foo';
	$end = array(1 => 'bar');
	$result = array_merge((array)$beginning, (array)$end);
	print_r($result);
	menuDeroulant($tabContrat);
	if($user->getIdFonct()==3)
	{
?>
	<button id="boutonForm" type="button" class="btn btn-primary btn-lg btn-block">ajouter un contrat ou un bulletin de salaire</button>
	<button id="boutonModifSuppContrat" type="button" class="btn btn-primary btn-lg btn-block">modifier ou supprimer les contrats </button>
	<button id="boutonModifSuppBulletin" type="button" class="btn btn-primary btn-lg btn-block">modifier ou supprimer les bulletins</button>
<?php
}
?>
	<div id='invisible'>

			<?php
			if($user->getIdFonct()==3){

				$formulaireBulletin->afficherFormulaire();
				$formulaireContrat->afficherFormulaire();



			?>
			<button id="boutonRetour" class="btn btn-primary" type="submit">Retour</button>
			<?php }?>
	</div>

	<div id='invisibleModifContrat'>

			<?php
			if($user->getIdFonct()==3){
				$formulaireContrat->afficherFormulaire();
				$formulaireSuppContrat->afficherFormulaire();

			?>
			<button id="boutonRetourContrat" class="btn btn-primary" type="submit">Retour</button>
		<?php }?>
	</div>

	<div id='invisibleModifBulletin'>

			<?php

			if($user->getIdFonct()==3){
				$formulaireBulletin->afficherFormulaire();

				$formulaireSuppBulletin->afficherFormulaire();

			?>
			<button id="boutonRetourBulletin" class="btn btn-primary" type="submit">Retour</button>
			<?php }?>
	</div>

<script>
document.getElementById("invisible").hidden = true;
document.getElementById("boutonForm")
        .addEventListener("click", function() {
  document.getElementById("invisible").hidden = false;

  // document.getElementById("impressionnant").hidden = false;
}, false);


document.getElementById("boutonRetour")
				.addEventListener("click", function() {
	document.getElementById("invisible").hidden = true;
	}, false);




	document.getElementById("invisibleModifContrat").hidden = true;
	document.getElementById("boutonModifSuppContrat")
	        .addEventListener("click", function() {
	  document.getElementById("invisibleModifContrat").hidden = false;

	  // document.getElementById("impressionnant").hidden = false;
	}, false);


	document.getElementById("boutonRetourContrat")
					.addEventListener("click", function() {
		document.getElementById("invisibleModifContrat").hidden = true;
		}, false);





		document.getElementById("invisibleModifBulletin").hidden = true;
		document.getElementById("boutonModifSuppBulletin")
		        .addEventListener("click", function() {
		  document.getElementById("invisibleModifBulletin").hidden = false;

		  // document.getElementById("impressionnant").hidden = false;
		}, false);


		document.getElementById("boutonRetourBulletin")
						.addEventListener("click", function() {
			document.getElementById("invisibleModifBulletin").hidden = true;
			}, false);


			function OnClick(){
				var myvalue = "bonjour";
				document.getElementById('field1').setAttribute('value', myvalue);
			}



</script>



</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
