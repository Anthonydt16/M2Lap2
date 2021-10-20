<?php
  require_once 'modele/dao/AnnulerInscriptionDAO.php';
  require_once 'modele/dao/MesFormationsDAO.php';

  $idForma = $_POST['forma'];
  $idUser = $_SESSION['idUtilisateur']['idUser'];

  $annulerInscriptionDAO = new AnnulerInscriptionDAO();//permet de supprimer l'enregistrement dans la base de donnée si l'utilisateur n'a pas encore été accepté
  $annulerInscriptionDAO -> annulerinscription($idUser, $idForma);

  /*
  *permet de revenir sur la page Mes Formations en rechargant les formations
  */
  $mesFormations = new MesFormationDAO();
  $tabMesFormations = $mesFormations->getmesformations($idUser);

  $mesFormationsAttente = new MesFormationDAO();
  $selectMesFormations = $mesFormationsAttente->getmesformationenattente($idUser);

  require_once 'vue/vueMesFormations.php';
?>
