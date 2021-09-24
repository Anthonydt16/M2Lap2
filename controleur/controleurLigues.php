<?php
  require_once 'modele/dao/LiguesDAO.php';
  require_once 'modele/dao/ClubDAO.php';

  $uneLigue = new LigueDAO();
  $tabLigue = $uneLigue->getligues();

  $unClub = new ClubDAO();
  $tabClub = $unClub->getclubs();

  /*echo var_dump($tabLigue);*/
	require_once 'vue/vueLigues.php' ;
