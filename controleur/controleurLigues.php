<?php
  require_once 'modele/dao/LiguesDAO.php';
  require_once 'modele/dao/ClubDAO.php';

  $uneLigue = new LigueDAO();
  $tabLigue = $uneLigue->getligues();

  $unClub = new ClubDAO();
  $tabClub = $unClub->getclubs();



  //Formulaire Ajouter Ligue
  $formulaireAjoutLigue = new Formulaire('post', 'index.php', 'fAjoutLigue', 'fAjoutLigue');
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerLabel('Ajouter une Ligue'));
  $formulaireAjoutLigue->ajouterComposantTab();
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerLabel('id Ligue :'));
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerInputTexte('AjoutidLigue', 'AjoutidLigue', '', 1, 'Entrez l id de la ligue', '', ''));
  $formulaireAjoutLigue->ajouterComposantTab();
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerLabel('Nom de la ligue :'));
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerInputTexte('AjoutNomLigue', 'AjoutNomLigue', '', 1, 'Entrez le Nom de la Ligue ' , '', ''));
  $formulaireAjoutLigue->ajouterComposantTab();
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerLabel('Adresse de la ligue :'));
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerInputTexte('AjoutadresseLigue', 'AjoutadresseLigue', '', 1, 'Entrez l adresse de la Ligue ' , '', ''));
  $formulaireAjoutLigue->ajouterComposantTab();
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerLabel('Descriptif :'));
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerInputTexte('AjoutDescriptif', 'AjoutDescriptif', '', 1, 'Entrez un Descriptif pour la ligue ' , '', ''));
  $formulaireAjoutLigue->ajouterComposantTab();
  $formulaireAjoutLigue->ajouterComposantLigne($formulaireAjoutLigue->creerInputSubmit('submitAjoutLigue', 'submitAjoutLigue', 'Valider'));
  $formulaireAjoutLigue->ajouterComposantTab();

  $formulaireAjoutLigue->creerFormulaire();

  //Formulaire Supprimer Ligue
  $formulaireSuppLigue = new Formulaire('post', 'index.php', 'fSupprLigue', 'fSupprLigue');
  $formulaireSuppLigue->ajouterComposantLigne($formulaireSuppLigue->creerLabel('Supprimer une Ligue'));
  $formulaireSuppLigue->ajouterComposantTab();
  $formulaireSuppLigue->ajouterComposantLigne($formulaireSuppLigue->creerLabel('Nom de la Ligue à supprimer :'));
  $formulaireSuppLigue->ajouterComposantLigne($formulaireSuppLigue->creerInputTexte('SupprLigue', 'SupprLigue', '', 1, 'Entrez le nom de la ligue à supprimer', '', ''));
  $formulaireSuppLigue->ajouterComposantTab();
  $formulaireSuppLigue->ajouterComposantLigne($formulaireSuppLigue->creerInputSubmit('submitSupprLigue', 'submitSupprLigue', 'Valider'));
  $formulaireSuppLigue->ajouterComposantTab();

  $formulaireSuppLigue->creerFormulaire();

  //Formulaire Modification Ligue
  $formulaireModifLigue = new Formulaire('post', 'index.php', 'fAjoutLigue', 'fAjoutLigue');
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerLabel('Modifier une Ligue'));
  $formulaireModifLigue->ajouterComposantTab();
  $formulaireModifLigue->ajouterComposantTab();
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerLabel('id Ligue à modifier:'));
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerInputTexte('ModifidLigue', 'ModifidLigue', '', 1, 'Entrez l id de la ligue', '', ''));
  $formulaireModifLigue->ajouterComposantTab();
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerLabel('Nouveau nom de la ligue :'));
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerInputTexte('ModifNomLigue', 'ModifNomLigue', '', 1, 'Entrez le Nom de la Ligue ' , '', ''));
  $formulaireModifLigue->ajouterComposantTab();
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerLabel('Nouvelle adresse de la ligue :'));
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerInputTexte('ModifadresseLigue', 'ModifadresseLigue', '', 1, 'Entrez l adresse de la Ligue ' , '', ''));
  $formulaireModifLigue->ajouterComposantTab();
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerLabel('Nouveau descriptif :'));
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerInputTexte('ModifDescriptif', 'ModifDescriptif', '', 1, 'Entrez un Descriptif pour la ligue ' , '', ''));
  $formulaireModifLigue->ajouterComposantTab();
  $formulaireModifLigue->ajouterComposantLigne($formulaireModifLigue->creerInputSubmit('submitModifLigue', 'submitModifLigue', 'Valider'));
  $formulaireModifLigue->ajouterComposantTab();

  $formulaireModifLigue->creerFormulaire();


	require_once 'vue/vueLigues.php' ;
