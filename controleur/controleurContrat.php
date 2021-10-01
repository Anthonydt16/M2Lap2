<?php

require_once 'lib/tab.php' ;
$tabContrat = [];
$tabBulletin = [];
//DAObulletin
$lesBulletinDAO = new BulletinDAO();
$lesContrat = new ContratDAO();

//DAOcontrat
$leContrat = new ContratDAO();
if(isset($_SESSION['unUtilisateur'])){
  $user = unserialize($_SESSION['unUtilisateur']);



  if(!empty($_POST['idContrat'])){
    //recuperation des id bulletin en ref au contrat
    $tabIdBulletin = $lesBulletinDAO->groupeBulletinRapportContrat($_POST['idContrat']);
    foreach ($tabIdBulletin as $key){
        $lesBulletinDAO->bulletinSupp($key['idbulletin']);
    }

    $leContrat->contratSupp($_POST['idContrat']);

  }
  if(!empty($_POST['idBulletin'])){
    $lesBulletinDAO->bulletinSupp($_POST['idBulletin']);
  }

  if($user->getIdFonct()==3){
    //recuperation donnée contrat et bulletin rh
    $tabContrat=$leContrat->contrat();
     $lesBulletinDAO->bulletinFull();


  //$leContrat->hydrate($tabContrat);
}
else{
  //sinon contrzt et bulletin perso

  $tabContrat=$leContrat->contratUser($user->getidUser());

  $tabBulletin= $lesBulletinDAO->bulletinFull();
}
//formulaire ajout
  $formulaireBulletin = new Formulaire('post', 'index.php', 'fBulletin', 'fBulletin');
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('ajouter un bulletin'));
  $formulaireBulletin->ajouterComposantTab();
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('Mois :'));
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('BMois', 'BMois', '', 1, 'Entrez le mois', '', ''));
	$formulaireBulletin->ajouterComposantTab();
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('année :'));
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('Bannee', 'Bannee', '', 1, 'Entrez l année ' , '', ''));
  $formulaireBulletin->ajouterComposantTab();

	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('le bulletin en PDF : '));
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('Bpdf', 'Bpdf', '',  1, 'hop ajoute je pdf', '', ''));
	$formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('le nom de l interesser  : '));
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('Bnom', 'Bnom', '',  1, 'le nom', '', ''));
	$formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin-> creerInputSubmit('submitConnexBulletin', 'submitConnexBulletin', 'Valider'));
  $formulaireBulletin->ajouterComposantTab();
  $formulaireBulletin->creerFormulaire();

//modification bulletin
  $formulaireBulletinModif = new Formulaire('post', 'index.php', 'fBulletin', 'fBulletin');
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('ajouter un bulletin'));
  $formulaireBulletinModif->ajouterComposantTab();
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('Mois :'));
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('BMois', 'BMois', '', 1, 'Entrez le mois', '', ''));
	$formulaireBulletinModif->ajouterComposantTab();
  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('année :'));
  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('Bannee', 'Bannee', '', 1, 'Entrez l année ' , '', ''));
  $formulaireBulletinModif->ajouterComposantTab();

	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('le bulletin en PDF : '));
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('Bpdf', 'Bpdf', '',  1, 'hop ajoute je pdf', '', ''));
	$formulaireBulletinModif->ajouterComposantTab();

  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('le nom de l interesser  : '));
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('Bnom', 'Bnom', '',  1, 'le nom', '', ''));
	$formulaireBulletinModif->ajouterComposantTab();

  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif-> creerInputSubmit('submitConnexBulletin', 'submitConnexBulletin', 'Valider'));
  $formulaireBulletinModif->ajouterComposantTab();
  $formulaireBulletinModif->creerFormulaire();

  $formulaireContrat = new Formulaire('post', 'index.php', 'fContrat', 'fContrat');

  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('Ajouter un Contrat'));
  $formulaireContrat->ajouterComposantTab();

	$formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('Date debut :'));
	$formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('ADateDeb', 'ADateDeb', '', 1, 'ajouter la date', '', ''));
	$formulaireContrat->ajouterComposantTab();

  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('Date Fin :'));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('DateFin', 'DateFin', '', 1, 'ajouter la date fin ', '', ''));
  $formulaireContrat->ajouterComposantTab();

  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('le type de contrat : '));
	$formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('Acontrat', 'Acontrat', '',  1, 'le contrat', '', ''));
	$formulaireContrat->ajouterComposantTab();
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('le nombre d heure : '));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('AheureNb', 'AheureNb', '', 1, 'le nombre heure', '', ''));
  $formulaireContrat->ajouterComposantTab();
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerLabel('le nom de l interesser  : '));
  $formulaireContrat->ajouterComposantLigne($formulaireContrat->creerInputTexte('Anom', 'Anom', '', 1, 'le nom', '', '', ''));
  $formulaireContrat->ajouterComposantTab();
	$formulaireContrat->ajouterComposantLigne($formulaireContrat-> creerInputSubmit('submitConnexContrat', 'submitConnexContrat', 'Valider'));
	$formulaireContrat->ajouterComposantTab();

	$formulaireContrat->creerFormulaire();



  $formulaireContratModif = new Formulaire('post', 'index.php', 'fContratM', 'fContratM');

  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('Ajouter un Contrat'));
  $formulaireContratModif->ajouterComposantTab();

	$formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('Date debut :'));
	$formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('ADateDebM', 'ADateDebM', '', 1, 'ajouter la date', '', ''));
	$formulaireContratModif->ajouterComposantTab();

  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('Date Fin :'));
  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('DateFinM', 'DateFinM', '', 1, 'ajouter la date fin ', '', ''));
  $formulaireContratModif->ajouterComposantTab();

  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('le type de contrat : '));
	$formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('AcontratM', 'AcontratM', '',  1, 'le contrat', '', ''));
	$formulaireContratModif->ajouterComposantTab();
  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('le nombre d heure : '));
  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('AheureNbM', 'AheureNbM', '', 1, 'le nombre heure', '', ''));
  $formulaireContratModif->ajouterComposantTab();
  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('le nom de l interesser  : '));
  $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('AnomM', 'AnomM', '', 1, 'le nom', '', '', ''));
  $formulaireContratModif->ajouterComposantTab();
	$formulaireContratModif->ajouterComposantLigne($formulaireContratModif-> creerInputSubmit('submitConnexContrat', 'submitConnexContrat', 'Valider'));
	$formulaireContratModif->ajouterComposantTab();

	$formulaireContratModif->creerFormulaire();
    $options =[];
    foreach ($tabContrat as $key) {
      array_push($options, $key['idContrat']);
    }







    $formulaireSuppContrat = new Formulaire('post', '', 'fSContratModif', 'fSContratModif');
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat->creerLabel('selectionner le contrat a supprimer :'));
    $formulaireSuppContrat->ajouterComposantTab();
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat->creerLabel('contrat :'));
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat->creerSelect('idContrat', 'ContratSelect', 'selectionner un Contrat', $options));
    $formulaireSuppContrat->ajouterComposantTab();
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat-> creerInputSubmit('submitConnex', 'submitConnex', 'supprimer'));
    $formulaireSuppContrat->ajouterComposantTab();

    $formulaireSuppContrat->creerFormulaire();


  $options =[];
  foreach ($tabBulletin as $key) {
    array_push($options, $key['idbulletin']);
  }

  $formulaireSuppBulletin = new Formulaire('post', '', 'fSBulletinModif', 'fSBulletinModif');
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin->creerLabel('selectionner le bulletin a supprimer :'));
  $formulaireSuppBulletin->ajouterComposantTab();
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin->creerLabel('bulletin :'));
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin->creerSelect('idBulletin', 'BulletinSelect', 'selectionner un bulletin', $options));
  $formulaireSuppBulletin->ajouterComposantTab();
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin-> creerInputSubmit('submitConnex', 'submitConnex', 'supprimer'));
  $formulaireSuppBulletin->ajouterComposantTab();

  $formulaireSuppBulletin->creerFormulaire();

}
else{

    $tabContrat=$lesContrat->contratUser($user->getidUser());

}
//ajout contrat
if(isset($_POST['Acontrat'])){
  if(isset($_POST['submitConnexContrat'])){
    $unUtilisateur = new UtilisateurDAO();


    foreach ($unUtilisateur->UtilisateurRecupID($_POST['Anom']) as $key => $value) {
      $idUser = $value;
    }

    $idNewContrat = count($tabContrat) + 1;

    $lesContrat->ajoutContrat($idNewContrat,$_POST['ADateDeb'],$_POST['DateFin'],$_POST['Acontrat'],$_POST['AheureNb'],$idUser);
  }
}
//ajout bulletin
if(isset($_POST['BMois'])){

  if(isset($_POST['submitConnexBulletin'])){
    $unUtilisateur = new UtilisateurDAO();

    $idNewBuletin = count($tabBulletin) + 1;
    foreach ($lesContrat->RecupIDContrat($_POST['Bnom']) as $key => $value){
      $idUserBulletin = $value;
    }

    $lesBulletinDAO->ajoutBulletin($idNewBuletin,$_POST['BMois'],$_POST['Bannee'],$_POST['Bpdf'] , $idUserBulletin);

  }
  echo "il faut indiquer le nom de famille.";
}

require_once 'vue/vueContrat.php' ;
