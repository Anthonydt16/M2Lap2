<?php
require_once 'modele/dao/FormationDAO.php';

$uneFormation = new FormationDAO();
$tabFormation = $uneFormation->getformation();

$uneFormationResponsable = new FormationDAO();
$tabFormationResponsable = $uneFormationResponsable->getformationresponsable();


require_once 'vue/vueFormation.php' ;
