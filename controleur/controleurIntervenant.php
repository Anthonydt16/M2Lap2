<?php
$LUtilisateur = new utilisateurDAO();


$tabLesUtilisateur = $LUtilisateur->lesUtilisateur();
$optionUser = [];
$LesUtilisateur =[];
foreach ($tabLesUtilisateur as $key => $unTabUtilisateur) {

  $Utilisateur = new Utilisateur();
  $Utilisateur->Hydrate($unTabUtilisateur);

  array_Push($LesUtilisateur, $Utilisateur);
  $lastIdUser= $Utilisateur->getIdUser();
}

foreach ($LesUtilisateur as $key => $UnUtilisateur) {
  //garde en memoire idUSer

    array_Push($optionUser, $UnUtilisateur->getIdUser());
}

$formulaireSelectIntervenant = new Formulaire('get', 'index.php', 'fSelectInter', 'fSelectInter','');

$formulaireSelectIntervenant->ajouterComposantLigne($formulaireSelectIntervenant->creerLabel('Selectionne un Intervenant  :'));
$formulaireSelectIntervenant->ajouterComposantLigne($formulaireSelectIntervenant->creerSelect('SelectInter', 'SelectInter', 'Selectionne', $optionUser) );
$formulaireSelectIntervenant->ajouterComposantTab();

$formulaireSelectIntervenant->ajouterComposantLigne($formulaireSelectIntervenant-> creerInputSubmit('submitSelectInter', 'submitSelectInter', 'Valider'));
$formulaireSelectIntervenant->ajouterComposantTab();

$formulaireSelectIntervenant->creerFormulaire();


//verifie si le session existe bien
if(isset($_SESSION['SelectInter'])){
  foreach ($LesUtilisateur as $key => $UnUtilisateur) {


    if($UnUtilisateur->getIdUser() == $_SESSION['SelectInter'] ){
      $idUser= $UnUtilisateur->getIdUser();
      //memoriser le nom
      $nom= $UnUtilisateur->getNom();
      $formulaireModificationInter = new Formulaire('post', '', 'ModificationInter', 'ModificationInter','');

      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('Nom  :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerInputTexte('nomI', 'nomI', $UnUtilisateur->getNom() , 1 , "" , "") );
      $formulaireModificationInter->ajouterComposantTab();

      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('prenom  :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerInputTexte('prenomI', 'prenomI', $UnUtilisateur->getPrenom() , 1 , "" , "") );
      $formulaireModificationInter->ajouterComposantTab();

      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('login  :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerInputTexte('loginI', 'loginI', $UnUtilisateur->getLogin() , 1 , "" , "") );
      $formulaireModificationInter->ajouterComposantTab();


      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('le Statut  :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerInputTexte('StatutI', 'StatutI', $UnUtilisateur->getStatut() , 1 , "" , "") );
      $formulaireModificationInter->ajouterComposantTab();


        //Creation du tab
        $optionsTypeUser =[];
        //on push dans le tab la valeur de base pour l'affichage
        array_Push($optionsTypeUser, $UnUtilisateur->getTypeUser());
        foreach ($LUtilisateur->Utilisateur($UnUtilisateur->getLogin()) as $key) {
          //la condition pour eviter les doublon
          if($UnUtilisateur->getTypeUser() != $key['typeUser']){
              array_push($optionsTypeUser, $key['typeUser']);
          }

        }
        $optionsidFonct =[];
        array_Push($optionsidFonct, $UnUtilisateur->getIdFonct());
        foreach ($LUtilisateur->recupIdFonct() as $key => $value) {

          if($UnUtilisateur->getIdFonct() != $value['idFonct']){

            array_push($optionsidFonct, $value['idFonct']);
          }

        }

        $optionsidLigue =[];
        array_Push($optionsidLigue, $UnUtilisateur->getIdLigue());

        foreach ($LUtilisateur->recupIdLigue() as $key => $value) {
          if($UnUtilisateur->getIdLigue() != $value['idLigue']){
            array_push($optionsidLigue, $value['idLigue']);
          }

        }

        $optionIdClub =[];
        array_push($optionIdClub, $UnUtilisateur->getIdClub());
        foreach ($LUtilisateur->recupIdClub()  as $key => $value) {

          if($UnUtilisateur->getIdClub() != $value['idClub']){
            array_push($optionIdClub, $value['idClub']);
          }

        }






      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('type User :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerSelect('typeUser', 'typeUserSelect', 'selectionner un type Contrat', $optionsTypeUser));
      $formulaireModificationInter->ajouterComposantTab();
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('id de la fonction'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerSelect('idFonct', 'idFonctSelect', 'selectionner un id Fonct', $optionsidFonct));
      $formulaireModificationInter->ajouterComposantTab();
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('l id ligue :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerSelect('idLigue', 'idLigueSelect', 'selectionner un id Ligue', $optionsidLigue));
      $formulaireModificationInter->ajouterComposantTab();
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('l id Club :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerSelect('idClub', 'idClubSelect', 'selectionner un id Club', $optionIdClub));
      $formulaireModificationInter->ajouterComposantTab();

      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter-> creerInputSubmit('submitValidModif', 'submitValidModif', 'Valider'));
      $formulaireModificationInter->ajouterComposantTab();
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter-> creerInputSubmit('submitValidSupp', 'submitValidSupp', 'Supprimer'));
      $formulaireModificationInter->ajouterComposantTab();

      $formulaireModificationInter->creerFormulaire();
    }
    $formulaireAjoutInter = new Formulaire('post', '', 'AjoutInter', 'AjoutInter','');

    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('Nom  :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerInputTexte('nomA', 'nomA', "" , 1 , "" , "") );
    $formulaireAjoutInter->ajouterComposantTab();

    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('prenom  :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerInputTexte('prenomA', 'prenomA', "" , 1 , "" , "") );
    $formulaireAjoutInter->ajouterComposantTab();

    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('login  :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerInputTexte('loginA', 'loginA', "" , 1 , "" , "") );
    $formulaireAjoutInter->ajouterComposantTab();

    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('Mot de Passe :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerInputMdp('mdpA', 'mdpA',  1, 'Entrez votre mot de passe', ''));
    $formulaireAjoutInter->ajouterComposantTab();


    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('le Statut  :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerInputTexte('StatutA', 'StatutA', "" , 1 , "" , "") );
    $formulaireAjoutInter->ajouterComposantTab();


      //Creation du tab
      $optionsTypeUserA =[];

      foreach ($LUtilisateur->Utilisateur($UnUtilisateur->getLogin()) as $key) {

            array_push($optionsTypeUserA, $key['typeUser']);

      }

      $optionsidFonctA =[];
      foreach ($LUtilisateur->recupIdFonct() as $key => $value) {
          array_push($optionsidFonctA, $value['idFonct']);
      }
      $optionsidLigueA =[];


      foreach ($LUtilisateur->recupIdLigue() as $key => $value) {
          array_push($optionsidLigueA, $value['idLigue']);
      }
      array_push($optionsidLigueA,"");
      $optionIdClubA =[];
      foreach ($LUtilisateur->recupIdClub()  as $key => $value) {


          array_push($optionIdClubA, $value['idClub']);


      }
      array_push($optionIdClubA,"");





    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('type User :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerSelect('typeUserA', 'typeUserSelectA', 'selectionner un type Contrat', $optionsTypeUserA));
    $formulaireAjoutInter->ajouterComposantTab();
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('id de la fonction'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerSelect('idFonctA', 'idFonctSelectA', 'selectionner un id Fonct', $optionsidFonctA));
    $formulaireAjoutInter->ajouterComposantTab();
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('l id ligue :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerSelect('idLigueA', 'idLigueSelectA', 'selectionner un id Ligue', $optionsidLigueA));
    $formulaireAjoutInter->ajouterComposantTab();
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerLabel('l id Club :'));
    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter->creerSelect('idClubA', 'idClubSelectA', 'selectionner un id Club', $optionIdClubA));
    $formulaireAjoutInter->ajouterComposantTab();

    $formulaireAjoutInter->ajouterComposantLigne($formulaireAjoutInter-> creerInputSubmit('submitValidAjout', 'submitValidAjout', 'Ajouter'));
    $formulaireAjoutInter->ajouterComposantTab();

    $formulaireAjoutInter->creerFormulaire();
  }

    if(isset($_POST['submitValidModif'])){
      if($_POST['idLigue'] == null && $_POST['idClub'] == null){
        $LUtilisateur->updateIntervenantNull($idUser,$_POST['nomI'],$_POST['prenomI'],$_POST['loginI'],$_POST['StatutI'],$_POST['typeUser'],$_POST['idFonct'],$_POST['idLigue'],$_POST['idClub']);

        $tabLesUtilisateur = $LUtilisateur->lesUtilisateur();
      }
      echo $idUser.$_POST['nomI'].$_POST['prenomI'].$_POST['loginI'].$_POST['StatutI'].$_POST['typeUser'].$_POST['idFonct'].$_POST['idLigue'].$_POST['idClub'];
      $LUtilisateur->updateIntervenant($idUser,$_POST['nomI'],$_POST['prenomI'],$_POST['loginI'],$_POST['StatutI'],$_POST['typeUser'],$_POST['idFonct'],$_POST['idLigue'],$_POST['idClub']);


    }
    if(isset($_POST['submitValidSupp'])){
        $unContrat = new ContratDAO();

         if (null == $unContrat->verifSiLeNomExiste($nom)) {
           $LUtilisateur->deleteinter($idUser);
               echo '<script>window.alert("suppression terminer");</script>';

         }
         else {
               echo '<script>window.alert("il possede un contrat d abord supp c est contrat");</script>';
         }
    }

    if(isset($_POST['submitValidAjout'])){
      if($_POST['idLigueA'] == null && $_POST['idClubA'] == null){
              $LUtilisateur->ajoutIntervenant($lastIdUser+1,md5($_POST['mdpA']),$_POST['nomA'],$_POST['prenomA'],$_POST['loginA'],$_POST['StatutA'],$_POST['typeUserA'],$_POST['idFonctA'],"NULL","NULL");

        $tabLesUtilisateur = $LUtilisateur->lesUtilisateur();
      }
      $LUtilisateur->ajoutIntervenant($lastIdUser+1,md5($_POST['mdpA']),$_POST['nomA'],$_POST['prenomA'],$_POST['loginA'],$_POST['StatutA'],$_POST['typeUserA'],$_POST['idFonctA'],$_POST['idLigueA'],$_POST['idClubA']);


    }

}

require_once 'vue/vueIntervenant.php' ;
