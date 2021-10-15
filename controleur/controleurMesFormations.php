<?php
require_once 'modele/dao/MesFormationsDAO.php';

$idUser = $_SESSION['idUtilisateur']['idUser'];

$mesFormations = new MesFormationDAO();
$tabMesFormations = $mesFormations->getmesformations();


require_once 'vue/vueMesFormations.php' ;
