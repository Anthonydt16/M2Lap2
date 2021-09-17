<?php

if(!$_SESSION['identification']){

	$formulaireLigue = new Formulaire('post', 'index.php', 'fLigue', 'fLigue');

	$formulaireLigue->ajouterComposantLigne($formulaireLigue->creerLabel('Ligue de Bordeaux'));
	$formulaireLigue->ajouterComposantLigne($formulaireLigue->creerInputImage('Image', 'Image', 'images/lorraine.gif'));
	$formulaireLigue->ajouterComposantTab();


	$formulaireLigue->creerFormulaire();

	require_once 'vue/vueLigues.php' ;

}
