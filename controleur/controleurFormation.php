<?php
require_once 'modele/dao/FormationDAO.php';

$idUser = $_SESSION['idUtilisateur']['idUser'];

$uneFormation = new FormationDAO();
$tabFormation = $uneFormation->getformation($idUser);

$uneFormationResponsable = new FormationDAO();
$tabFormationResponsable = $uneFormationResponsable->getformationresponsable();

require_once 'vue/vueFormation.php' ;
