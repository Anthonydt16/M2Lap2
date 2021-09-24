<div class="conteneur">
	<header>
		<?php include 'haut.php' ;?>
	</header>
	<main>
	<?php menuDeroulant($tabContrat);?>
<button id="boutonForm" type="button" class="btn btn-primary btn-lg btn-block">ajouter un contrat ou un bulletin de salaire</button>
<button id="boutonModifSuppContrat" type="button" class="btn btn-primary btn-lg btn-block">modifier ou supprimer les contrats </button>
<button id="boutonModifSuppBulletin" type="button" class="btn btn-primary btn-lg btn-block">modifier ou supprimer les bulletins</button>

	<div id='invisible'>

			<?php
			$formulaireBulletinAndContrat->afficherFormulaire();
			?>
			<button id="boutonRetour" class="btn btn-primary" type="submit">Retour</button>
	</div>

	<div id='invisibleModifContrat'>

			<?php
			$formulaireContrat->afficherFormulaire();
			?>
			<button id="boutonRetourContrat" class="btn btn-primary" type="submit">Retour</button>
	</div>

	<div id='invisibleModifBulletin'>

			<?php
			$formulaireBulletin->afficherFormulaire();
			?>
			<button id="boutonRetourBulletin" class="btn btn-primary" type="submit">Retour</button>
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
		  document.getElementById("invisible").hidden = false;

		  // document.getElementById("impressionnant").hidden = false;
		}, false);


		document.getElementById("boutonRetourBulletin")
						.addEventListener("click", function() {
			document.getElementById("invisibleModifBulletin").hidden = true;
			}, false);
//
// document.getElementById("boutonOk")
//         .addEventListener("click", function() {
// 					if(document.getElementById("bienvenue").hidden == true){
// 						document.getElementById("bienvenue").hidden = false;
// 						document.getElementById("impressionnant").hidden = true;
// 					}
//
// }, true);

</script>



</main>
	<footer>
		<?php include 'bas.php' ;?>
	</footer>
</div>
