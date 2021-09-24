<?php

require_once 'lib/tab.php' ;
$tabContrat = [];
$user = unserialize($_SESSION['unUtilisateur']);
if($user->getIdFonct()==3){
  $tabContrat=$uneConnex->contrat();

  $formulaireBulletinAndContrat = new Formulaire('post', 'index.php', 'fBulletin', 'fBulletin');
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('ajouter un bulletin'));
  $formulaireBulletinAndContrat->ajouterComposantTab();
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('Mois :'));
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('Mois', 'Mois', '', 1, 'Entrez le mois', '', ''));
	$formulaireBulletinAndContrat->ajouterComposantTab();

	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('le bulletin en PDF : '));
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('pdf', 'pdf', '',  1, 'hop ajoute je pdf', '', ''));
	$formulaireBulletinAndContrat->ajouterComposantTab();

  $formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('le nom de l interesser  : '));
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('nom', 'nom', '',  1, 'le nom', '', ''));
	$formulaireBulletinAndContrat->ajouterComposantTab();
  $formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('Ajouter un Contrat'));
  $formulaireBulletinAndContrat->ajouterComposantTab();
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('Date debut :'));
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('DateDeb', 'DateDeb', '', 1, 'ajouter la date', '', ''));
	$formulaireBulletinAndContrat->ajouterComposantTab();

	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('la date de fin : '));
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('DateFin', 'DateFin',  1, 'ajouter la date', '', ''));
	$formulaireBulletinAndContrat->ajouterComposantTab();

  $formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('le type de contrat : '));
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('contrat', 'contrat', '',  1, 'le contrat', '', ''));
	$formulaireBulletinAndContrat->ajouterComposantTab();
  $formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('le nombre d heure : '));
  $formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('heureNb', 'heureNb', '', 1, 'le nombre heure', '', ''));
  $formulaireBulletinAndContrat->ajouterComposantTab();
  $formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerLabel('le nom de l interesser  : '));
  $formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat->creerInputTexte('nom', 'nom', '', 1, '', 'le nom', '', ''));
  $formulaireBulletinAndContrat->ajouterComposantTab();
	$formulaireBulletinAndContrat->ajouterComposantLigne($formulaireBulletinAndContrat-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
	$formulaireBulletinAndContrat->ajouterComposantTab();

	$formulaireBulletinAndContrat->creerFormulaire();

  $formulaireContrat = new Formulaire('post', 'index.php', 'fContrat', 'fContrat');
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('modifier un Contrat'));
  $formulaireContrat->ajouterComposantTab();
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('Date debut :'));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('DateDeb', 'DateDeb', '', 1, 'ajouter la date', '', ''));
  $formulaireContrat->ajouterComposantTab();

  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('le bulletin en PDF : '));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('DateFin', 'DateFin',  1, 'ajouter la date', '', ''));
  $formulaireContrat->ajouterComposantTab();

  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('le type de contrat : '));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('contrat', 'contrat', '',  1, 'le contrat', '', ''));
  $formulaireContrat->ajouterComposantTab();
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('le nombre d heure : '));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('heureNb', 'heureNb', '', 1, 'le nombre heure', '', ''));
  $formulaireContrat->ajouterComposantTab();
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('le nom de l interesser  : '));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('nom', 'nom', '', 1, '', 'le nom', '', ''));
  $formulaireContrat->ajouterComposantTab();
  $formulaireContrat->ajouterComposantLigne($formulaireContrat-> creerInputSubmit('submitConnex', 'submitConnex', 'Valider'));
  $formulaireContrat->ajouterComposantTab();

  $formulaireContrat->creerFormulaire();


  $formulaireBulletin = new Formulaire('post', 'index.php', 'fBulletinModif', 'fBulletinModif');
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('ajouter un bulletin'));
  $formulaireBulletin->ajouterComposantTab();
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('Mois :'));
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('Mois', 'Mois', '', 1, 'Entrez le mois', '', ''));
  $formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('le bulletin en PDF : '));
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('pdf', 'pdf', '',  1, 'hop ajoute je pdf', '', ''));
  $formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('le nom de l interesser  : '));
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('nom', 'nom', '',  1, 'le nom', '', ''));
  $formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->creerFormulaire();





}
else{
  echo $user->getidUser();
    $tabContrat=$uneConnex->contratUser($user->getidUser());

}



require_once 'vue/vueContrat.php' ;
