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
  $formulaireSuppLigue->ajouterComposantLigne($formulaireSuppLigue->creerLabel('Supprimer une Ligue (Supprimer tous les clubs dedans)'));
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

  //Formulaire Ajouter Club
  $formulaireAjoutClub = new Formulaire('post', 'index.php', 'fAjoutClub', 'fAjoutClub');
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerLabel('Ajouter un club'));
  $formulaireAjoutClub->ajouterComposantTab();
  $formulaireAjoutClub->ajouterComposantTab();
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerLabel('id Club à ajouter:'));
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerInputTexte('AjoutidClub', 'AjoutidClub', '', 1, 'Entrez l id du club', '', ''));
  $formulaireAjoutClub->ajouterComposantTab();
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerLabel('Nom du Club :'));
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerInputTexte('AjoutnomClub', 'AjoutnomClub', '', 1, 'Entrez le Nom du club ' , '', ''));
  $formulaireAjoutClub->ajouterComposantTab();
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerLabel('Adresse du Club:'));
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerInputTexte('AjoutadresseClub', 'AjoutadresseClub', '', 1, 'Entrez l adresse du club ' , '', ''));
  $formulaireAjoutClub->ajouterComposantTab();
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerLabel('id de la ligue rataché:'));
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerInputTexte('AjoutidLigueClub', 'AjoutidLigueClub', '', 1, 'Entrez un id de ligue ' , '', ''));
  $formulaireAjoutClub->ajouterComposantTab();
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerLabel('id de la Commune:'));
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerInputTexte('AjoutidCommune', 'AjoutidCommune', '', 1, 'Entrez l id de la commune ' , '', ''));
  $formulaireAjoutClub->ajouterComposantTab();
  $formulaireAjoutClub->ajouterComposantLigne($formulaireAjoutClub->creerInputSubmit('submitAjoutClub', 'submitAjoutClub', 'Valider'));
  $formulaireAjoutClub->ajouterComposantTab();

  $formulaireAjoutClub->creerFormulaire();


  //Formulaire Modifier Club
  $formulaireModifClub = new Formulaire('post', 'index.php', 'fAjoutClub', 'fAjoutClub');
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerLabel('Modifier un club'));
  $formulaireModifClub->ajouterComposantTab();
  $formulaireModifClub->ajouterComposantTab();
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerLabel('id Club à Modifier:'));
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerInputTexte('ModifieridClub', 'ModifieridClub', '', 1, 'Entrez l id du club à modifier', '', ''));
  $formulaireModifClub->ajouterComposantTab();
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerLabel('Nom du Club :'));
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerInputTexte('ModifiernomClub', 'ModifiernomClub', '', 1, 'Entrez le nouveau Nom du club ' , '', ''));
  $formulaireModifClub->ajouterComposantTab();
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerLabel('Adresse du Club:'));
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerInputTexte('ModifieradresseClub', 'ModifieradresseClub', '', 1, 'Entrez la nouvelle adresse du club ' , '', ''));
  $formulaireModifClub->ajouterComposantTab();
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerLabel('id de la ligue rataché:'));
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerInputTexte('ModifieridLigueClub', 'ModifieridLigueClub', '', 1, 'Entrez un id de ligue ' , '', ''));
  $formulaireModifClub->ajouterComposantTab();
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerLabel('id de la Commune:'));
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerInputTexte('ModifieridCommune', 'ModifieridCommune', '', 1, 'Entrez l id de la commune ' , '', ''));
  $formulaireModifClub->ajouterComposantTab();
  $formulaireModifClub->ajouterComposantLigne($formulaireModifClub->creerInputSubmit('submitModifierClub', 'submitModifierClub', 'Valider'));
  $formulaireModifClub->ajouterComposantTab();

  $formulaireModifClub->creerFormulaire();


  //Formulaire Supprimer Club
  $formulaireSuppClub = new Formulaire('post', 'index.php', 'fSupprClub', 'fSupprClub');
  $formulaireSuppClub->ajouterComposantLigne($formulaireSuppClub->creerLabel('Supprimer un Club'));
  $formulaireSuppClub->ajouterComposantTab();
  $formulaireSuppClub->ajouterComposantLigne($formulaireSuppClub->creerLabel('Nom du Club à supprimer :'));
  $formulaireSuppClub->ajouterComposantLigne($formulaireSuppClub->creerInputTexte('SupprClub', 'SupprClub', '', 1, 'Entrez le nom du club à supprimer', '', ''));
  $formulaireSuppClub->ajouterComposantTab();
  $formulaireSuppClub->ajouterComposantLigne($formulaireSuppClub->creerInputSubmit('submitSupprClub', 'submitSupprClub', 'Valider'));
  $formulaireSuppClub->ajouterComposantTab();

  $formulaireSuppClub->creerFormulaire();



					//Fonction Ajout Ligue
					if(isset($_POST['AjoutidLigue'])){

						if(isset($_POST['submitAjoutLigue'])){

							$uneLigue->ajoutLigue($_POST['AjoutidLigue'], $_POST['AjoutNomLigue'], $_POST['AjoutadresseLigue'], $_POST['AjoutDescriptif']);

						}
					}

					//Fonction supprimer Ligue
					if(isset($_POST['SupprLigue'])){

						if(isset($_POST['submitSupprLigue'])){

							$uneLigue->suppLigue($_POST['SupprLigue']);

						}
					}

					//Fonction Modifier Ligue
					if(isset($_POST['ModifidLigue'])){

						if(isset($_POST['submitModifLigue'])){

							$uneLigue->updateLigue($_POST['ModifidLigue'], $_POST['ModifNomLigue'], $_POST['ModifadresseLigue'], $_POST['ModifDescriptif']);

						}
					}

					//Fonction Ajout Club
					if(isset($_POST['AjoutidClub'])){

						if(isset($_POST['submitAjoutClub'])){

							$unClub->ajoutClub($_POST['AjoutidClub'], $_POST['AjoutnomClub'], $_POST['AjoutadresseClub'], $_POST['AjoutidLigueClub'], $_POST['AjoutidCommune']);

						}
					}

					//Fonction supprimer Club
					if(isset($_POST['SupprClub'])){

						if(isset($_POST['submitSupprClub'])){

							$unClub->suppClub($_POST['SupprClub']);

						}
					}

					//Fonction Modifier Club
					if(isset($_POST['ModifieridClub'])){

						if(isset($_POST['submitModifierClub'])){

							$unClub->updateClub($_POST['ModifieridClub'], $_POST['ModifiernomClub'], $_POST['ModifieradresseClub'], $_POST['ModifieridLigueClub'], $_POST['ModifieridCommune']);

						}
					}
					
					
	require_once 'vue/vueLigues.php' ;
