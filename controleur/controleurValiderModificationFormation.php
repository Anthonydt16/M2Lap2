<?php
  require_once 'modele/dao/ModifierFormationDAO.php';
  require_once 'modele/dao/FormationDAO.php';

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



  $uneFormation = new FormationDAO();
  $tabFormation = $uneFormation->getformation();

  $uneFormationResponsable = new FormationDAO();
  $tabFormationResponsable = $uneFormationResponsable->getformationresponsable();

  require_once 'vue/vueFormation.php' ;
