<?php
require_once 'lib/tab.php' ;
$tabContrat = [];
$tabBulletin = [];

//DAObulletin
$lesBulletinDAO = new BulletinDAO();
$lesContratDAO = new ContratDAO();

//DAOcontrat
if(isset($_GET['m2lMPModifieB'])){
   $_SESSION['m2lMPModifieB']= $_GET['m2lMPModifieB'];
   $idBulletin =$_SESSION['m2lMPModifieB'];

    $unBulletin= new Bulletin();

    $tabunbulletin = $lesBulletinDAO->unBulletin($idBulletin);
    $unBulletin->hydrate($tabunbulletin);
    $_SESSION['unBulletin'] = serialize($unBulletin);
}

if(isset($_GET['m2lMPModifieC'])){
   $_SESSION['m2lMPModifieC']= $_GET['m2lMPModifieC'];
   $idContrat =$_SESSION['m2lMPModifieC'];
    //fais une classe DTO COntrat
    $lesContratDAO= new ContratDAO();
    $unContrat= new Contrat();
    $tabunContrat = $lesContratDAO->contratFindId($idContrat);
    var_dump($tabunContrat);
    $unContrat->hydrate($tabunContrat);
    $_SESSION['unContrat'] = serialize($unContrat);


}


$leContrat = new ContratDAO();
if(isset($_SESSION['unUtilisateur'])){
  $user = unserialize($_SESSION['unUtilisateur']);
  $tabContrat=$leContrat->contratUser($user->getidUser());

  $tabBulletin= $lesBulletinDAO->bulletinFull();


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
     $tabBulletin=$lesBulletinDAO->bulletinFull();


  //$leContrat->hydrate($tabContrat);
}
else{
  //sinon contrzt et bulletin perso
  var_dump($tabBulletin);
}
//formulaire ajout
  $formulaireBulletin = new Formulaire('post', 'index.php', 'fBulletin', 'fBulletin','multipart/form-data');
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('ajouter un bulletin'));
  $formulaireBulletin->ajouterComposantTab();
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('Mois :'));
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('BMois', 'BMois', '', 1, 'Entrez le mois', '', ''));
	$formulaireBulletin->ajouterComposantTab();
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('année :'));
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('Bannee', 'Bannee', '', 1, 'Entrez l année ' , '', ''));
  $formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('le bulletin en PDF : '));
  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerUploadFilder('file', 'Bpdf', 'Bpdf','',1));
  $formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerLabel('le nom de l interesser  : '));
	$formulaireBulletin->ajouterComposantLigne($formulaireBulletin->creerInputTexte('Bnom', 'Bnom', '',  1, 'le nom', '', ''));
	$formulaireBulletin->ajouterComposantTab();

  $formulaireBulletin->ajouterComposantLigne($formulaireBulletin-> creerInputSubmit('submitConnexBulletin', 'submitConnexBulletin', 'Valider'));
  $formulaireBulletin->ajouterComposantTab();
  $formulaireBulletin->creerFormulaire();

//modification bulletin
  $formulaireBulletinModif = new Formulaire('post', 'index.php', 'fBulletin', 'fBulletin','multipart/form-data');
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('modifier le bulletin'));
  $formulaireBulletinModif->ajouterComposantTab();
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('Mois :'));
	$formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('BMois', 'BMois', ' ', 1, 'Entrez le mois', '', ''));
	$formulaireBulletinModif->ajouterComposantTab();
  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('année :'));
  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('Bannee', 'Bannee', ' ', 1, 'Entrez l année ' , '', ''));
  $formulaireBulletinModif->ajouterComposantTab();

  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('le bulletin en PDF : '));
  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerUploadFilder('file', 'Bpdf', 'Bpdf','',1));
  $formulaireBulletinModif->ajouterComposantTab();



  $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif-> creerInputSubmit('submitConneMBulletinM', 'submitConnexBulletinM', 'Valider'));
  $formulaireBulletinModif->ajouterComposantTab();
  $formulaireBulletinModif->creerFormulaire();

      //le formulaire pour les modif
  if(isset($_GET['m2lMPModifieB'])){
    $formulaireBulletinModif = new Formulaire('post', 'index.php', 'fBulletin', 'fBulletin','multipart/form-data');
    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('modifier le bulletin'));
    $formulaireBulletinModif->ajouterComposantTab();
    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('Mois :'));
    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('BMois', 'BMois', $unBulletin->getMois() , 1, 'Entrez le mois', '', ''));
    $formulaireBulletinModif->ajouterComposantTab();
    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('année :'));
    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerInputTexte('Bannee', 'Bannee',$unBulletin->getAnnee() , 1, 'Entrez l année ' , '', ''));
    $formulaireBulletinModif->ajouterComposantTab();

    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerLabel('le bulletin en PDF : '));
    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif->creerUploadFilder('file', 'Bpdf', 'Bpdf','',1));
    $formulaireBulletinModif->ajouterComposantTab();


    $formulaireBulletinModif->ajouterComposantLigne($formulaireBulletinModif-> creerInputSubmit('submitConnexBulletinM', 'submitConnexBulletinM', 'Valider'));
    $formulaireBulletinModif->ajouterComposantTab();
    $formulaireBulletinModif->creerFormulaire();
  }

  $formulaireContrat = new Formulaire('post', 'index.php', 'fContrat', 'fContrat','');

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



  $formulaireContratModif = new Formulaire('post', 'index.php', 'fContratM', 'fContratM','');

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
	$formulaireContratModif->ajouterComposantLigne($formulaireContratModif-> creerInputSubmit('submitConnexContratM', 'submitConnexContratM', 'Valider'));
	$formulaireContratModif->ajouterComposantTab();

	$formulaireContratModif->creerFormulaire();

  //attribuer les valeur au form
  if(isset($_GET['m2lMPModifieC'])){
    $formulaireContratModif = new Formulaire('post', 'index.php', 'fContratM', 'fContratM','');

    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('Ajouter un Contrat'));
    $formulaireContratModif->ajouterComposantTab();

    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('Date debut :'));
    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('ADateDebM', 'ADateDebM', $unContrat->getDateDebut(), 1, 'ajouter la date', '', ''));
    $formulaireContratModif->ajouterComposantTab();

    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('Date Fin :'));
    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('DateFinM', 'DateFinM',  $unContrat->getDateFin(), 1, 'ajouter la date fin ', '', ''));
    $formulaireContratModif->ajouterComposantTab();

    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('le type de contrat : '));
    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('AcontratM', 'AcontratM',  $unContrat->getTypeContrat(),  1, 'le contrat', '', ''));
    $formulaireContratModif->ajouterComposantTab();
    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerLabel('le nombre d heure : '));
    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif->creerInputTexte('AheureNbM', 'AheureNbM',  $unContrat->getNbHeures(), 1, 'le nombre heure', '', ''));
    $formulaireContratModif->ajouterComposantTab();
    $formulaireContratModif->ajouterComposantLigne($formulaireContratModif-> creerInputSubmit('submitConnexContratM', 'submitConnexContratM', 'Valider'));
    $formulaireContratModif->ajouterComposantTab();

    $formulaireContratModif->creerFormulaire();
  }
    $options =[];
    foreach ($tabContrat as $key) {
      array_push($options, $key['idContrat']);
    }







    $formulaireSuppContrat = new Formulaire('post', '', 'fSContratModif', 'fSContratModif','');
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat->creerLabel('selectionner le contrat a supprimer :'));
    $formulaireSuppContrat->ajouterComposantTab();
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat->creerLabel('contrat :'));
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat->creerSelect('idContrat', 'ContratSelect', 'selectionner un Contrat', $options));
    $formulaireSuppContrat->ajouterComposantTab();
    $formulaireSuppContrat->ajouterComposantLigne($formulaireSuppContrat-> creerInputSubmit('submitConnex', 'submitConnex', 'supprimer'));
    $formulaireSuppContrat->ajouterComposantTab();

    $formulaireSuppContrat->creerFormulaire();


  $options1 =[];
  foreach ($tabBulletin as $key) {
    array_push($options1, $key['idbulletin']);
  }

  $formulaireSuppBulletin = new Formulaire('post', '', 'fSBulletinModif', 'fSBulletinModif','');
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin->creerLabel('selectionner le bulletin a supprimer :'));
  $formulaireSuppBulletin->ajouterComposantTab();
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin->creerLabel('bulletin :'));
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin->creerSelect('idBulletin', 'BulletinSelect', 'selectionner un bulletin', $options1));
  $formulaireSuppBulletin->ajouterComposantTab();
  $formulaireSuppBulletin->ajouterComposantLigne($formulaireSuppBulletin-> creerInputSubmit('submitConnex', 'submitConnex', 'supprimer'));
  $formulaireSuppBulletin->ajouterComposantTab();

  $formulaireSuppBulletin->creerFormulaire();

}
else{

    $tabContrat=$lesContratDAO->contratUser($user->getidUser());

}
//ajout contrat
if(isset($_POST['Acontrat'])){
  if(isset($_POST['submitConnexContrat'])){
    $unUtilisateur = new UtilisateurDAO();


    foreach ($unUtilisateur->UtilisateurRecupID($_POST['Anom']) as $key => $value) {
      $idUser = $value;
    }

    $idNewContrat = count($tabContrat) + 1;

    $lesContratDAO->ajoutContrat($idNewContrat,$_POST['ADateDeb'],$_POST['DateFin'],$_POST['Acontrat'],$_POST['AheureNb'],$idUser);
  }
}
//ajout bulletin
if(isset($_POST['submitConnexBulletin'])){
  //verifie si le nom existe dans un contrat
  if($lesContratDAO->verifSiLeNomExiste($_POST['Bnom']) == false){
    echo '<script>window.alert("le nom na pas de contrat");</script>';
  }
  else{
    foreach ($lesContratDAO->verifSiLeNomExiste($_POST['Bnom']) as $key => $value) {
      echo $_POST['Bnom']." = ".$value;

        if($_POST['Bnom'] == $value){
          $unUtilisateur = new UtilisateurDAO();

          $idNewBuletin = count($tabBulletin) + 1;

          foreach ($lesContratDAO->RecupIDContrat($_POST['Bnom']) as $key => $value){
            $idUserBulletin = $value;
          }
          //ajout du pdf
          $repertoireDestination = dirname(dirname(__FILE__)) . "\pdf\\";
          $nomDestation = "bulletin_". date("YmHis") . ".pdf";
          if(is_uploaded_file($_FILES['Bpdf']['tmp_name'])){
            rename($_FILES['Bpdf']['tmp_name'], $repertoireDestination . $nomDestation);
          }
          $lesBulletinDAO->ajoutBulletin($idNewBuletin,$_POST['BMois'],$_POST['Bannee'],$nomDestation , $idUserBulletin);
        }



      }
    }
  }


//modificatiob bulletin
if(isset($_POST['BMois'])){
    if(isset($_POST['submitConnexBulletinM'])){


        $idNewBuletin = count($tabBulletin) + 1;
        //ajout du pdf
        $repertoireDestination = dirname(dirname(__FILE__)) . "\pdf\\";
        $nomDestation = "bulletin_". date("YmHis") . ".pdf";
        var_dump($_FILES);
        if(is_uploaded_file($_FILES['Bpdf']['tmp_name'])){
          rename($_FILES['Bpdf']['tmp_name'], $repertoireDestination . $nomDestation);
        }
        $unBulletin=unserialize($_SESSION['unBulletin']);
        $lesBulletinDAO->updateBulletin($unBulletin->getIdbulletin(),$_POST['BMois'],$_POST['Bannee'], $nomDestation,$unBulletin->getIdContrat() );




  }
}
//modification contrat
if(isset($_POST['ADateDebM'])){
    if(isset($_POST['submitConnexContratM'])){


        $unContrat=unserialize($_SESSION['unContrat']);
        $lesContratDAO->UpdateContrat($unContrat->getIdContrat(),$_POST['ADateDebM'],$_POST['DateFinM'], $_POST['AcontratM'], $_POST['AheureNbM'], $unContrat->getIdUser());




  }
}

require_once 'vue/vueContrat.php' ;
//Bulletin update
