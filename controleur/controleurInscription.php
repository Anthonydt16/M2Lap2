<?php
  require_once 'modele/dao/formationDAO.php';

  $idForma = $_POST['forma'];
  $idUser = $_SESSION['idUtilisateur']['idUser'];


  $formaDAO = new FormationDAO();
  $formaDAO -> demandeInscription($idForma, $idUser);



  $uneFormation = new FormationDAO();
  $tabFormation = $uneFormation->getformation($idUser);
 	require_once 'controleur/controleurFormation.php' ;
 ?>
