<?php
require_once 'modele/dao/MesFormationsDAO.php';

$idUser = $_SESSION['idUtilisateur']['idUser'];//récupère l'id de l'utilisateur connecté

$mesFormations = new MesFormationDAO();
$tabMesFormations = $mesFormations->getmesformations($idUser);

$mesFormationsAttente = new MesFormationDAO();
$selectMesFormations = $mesFormationsAttente->getmesformationenattente($idUser);

require_once 'vue/vueMesFormations.php' ;
