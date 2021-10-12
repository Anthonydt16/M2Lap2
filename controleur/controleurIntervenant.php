<?php
$LUtilisateur = new utilisateurDAO();


$tabLesUtilisateur = $LUtilisateur->lesUtilisateur();
$optionUser = [];
$LesUtilisateur =[];
foreach ($tabLesUtilisateur as $key => $unTabUtilisateur) {

  $Utilisateur = new Utilisateur();
  $Utilisateur->Hydrate($unTabUtilisateur);

  array_Push($LesUtilisateur, $Utilisateur);
}

foreach ($LesUtilisateur as $key => $UnUtilisateur) {

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


      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerLabel('le Satut  :'));
      $formulaireModificationInter->ajouterComposantLigne($formulaireModificationInter->creerInputTexte('SatutI', 'SatutI', $UnUtilisateur->getStatut() , 1 , "" , "") );
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
// faire la disociation des requete entre ligue/ fonction /club
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

      $formulaireModificationInter->creerFormulaire();
    }
  }

}

require_once 'vue/vueIntervenant.php' ;
