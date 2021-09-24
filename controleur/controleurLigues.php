<?php
  require_once 'modele/dao/DAOLigues.php';

  $uneLigue = new LigueDAO();
  $tabLigue = $uneLigue->getligues();

  echo var_dump($tabLigue);
	require_once 'vue/vueLigues.php' ;
