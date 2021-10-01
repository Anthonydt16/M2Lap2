<?php
require_once 'modele/dao/FormationDAO.php';

$mesFormations = new FormationDAO();
$tabMesFormations = $mesFormations->getmesformations();

require_once 'vue/vueMesFormations.php' ;
