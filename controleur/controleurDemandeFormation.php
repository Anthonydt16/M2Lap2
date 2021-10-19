<?php
require_once 'modele/dao/DemandeFormationDAO.php';

$uneDemande = new DemandeFormationDAO();
$tabDemandeFormation = $uneDemande->getinscriptions();

require_once 'vue/vueDemandeFormation.php' ;
