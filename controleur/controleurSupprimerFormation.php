<?php
  require_once 'modele/dao/SupprimerFormationDAO.php';

  $idForma = $_POST['forma'];


  $formaDAO = new SupprimerFormationDAO();
  $formaDAO -> supprimerFormation($idForma);


 	require_once 'controleur/controleurPrincipal.php' ;
  //require_once 'vue/vueFormation.php';
 ?>
