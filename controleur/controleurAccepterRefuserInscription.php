<?php
 	require_once 'modele/dao/AccepterRefuserInscriptionDAO.php';
  require_once 'modele/dao/DemandeFormationDAO.php';

  
  $idForma = $_POST['idForma'];
  $idUser = $_POST['idUser'];


  if(isset($_POST['accept'])){
    $AccepterDAO = new AccepterRefuserInscriptionDAO();
    $AccepterDAO -> accepterinscription($idUser, $idForma);
  }

  if(isset($_POST['refus'])){
    $RefusDAO = new AccepterRefuserInscriptionDAO();
    $RefusDAO -> refuserinscription($idUser, $idForma);
  }


  $uneDemande = new DemandeFormationDAO();
  $tabDemandeFormation = $uneDemande->getinscriptions();
  require_once 'vue/vueDemandeFormation.php';
 ?>
