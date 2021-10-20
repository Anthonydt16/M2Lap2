<?php
  require_once 'modele/dao/ModifierFormationDAO.php';
  require_once 'modele/dao/FormationDAO.php';

  /*
  *récupère toutes les variables entrées dans la modification pour les utiliser dans la requete sql
  */
  $idFormaModif = $_POST['idForma'];
  $intitule = $_POST['intitule'];
  $descriptif = $_POST['descriptif'];
  $duree = $_POST['duree'];
  $ouvertureInscription = $_POST['ouvertureInscription'];
  $fermetureInscription = $_POST['fermetureInscription'];
  $debutFormation = $_POST['debutFormation'];
  $effectifMax = $_POST['effectifMax'];


  $modifierFormaDAO = new ModifierFormationDAO();
  $modifierFormaDAO -> modifierFormation($idFormaModif, $intitule, $descriptif, $duree, $ouvertureInscription, $fermetureInscription, $debutFormation, $effectifMax);


  /*
  *Permet de revenir sur la vue formation
  */
  $idUser = $_SESSION['idUtilisateur']['idUser'];//récupère l'id de l'utilisateur connecté

  $uneFormation = new FormationDAO();
  $tabFormation = $uneFormation->getformation($idUser);

  $uneFormationResponsable = new FormationDAO();
  $tabFormationResponsable = $uneFormationResponsable->getformationresponsable();

  require_once 'vue/vueFormation.php' ;
