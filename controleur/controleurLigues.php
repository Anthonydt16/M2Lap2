<?php
  require_once 'modele/dao/DAOLigues.php';

  $ListeLigue = new Ligue();
  $tabLigue = $ListeLigue->Ligue();

  echo var_dump($tabLigue);
	require_once 'vue/vueLigues.php' ;
