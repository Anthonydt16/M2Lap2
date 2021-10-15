<?php
  require_once 'modele/dao/AjouterFormationDAO.php';

  $formaDAO = new AjouterFormationDAO();
  $formaDAO -> ajouterformation();

  $formaIdDAO = new AjouterFormationDAO();
  $formaIdDAO -> getlastid();

 	require_once 'vue/vueAjouterFormation.php' ;
 ?>
