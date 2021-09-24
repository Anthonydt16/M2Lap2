<?php
require_once 'modele/dao/DAOFormation.php';

$uneFormation = new FormationDAO();
$tabFormation = $uneFormation->getformation();

/*echo var_dump($tabFormation);*/

require_once 'vue/vueFormation.php' ;
