<?php
  require_once 'modele/dao/ModifierFormationDAO.php';
  require_once 'modele/dao/SupprimerFormationDAO.php';
  require_once 'modele/dao/FormationDAO.php';
  $idForma = $_POST['forma'];


  if (isset($_POST['alter'])){//si le bouton modifier est clické, alors cela nous emmene sur une vue qui affiche la formation sélectionnée

    $formaDAO = new ModifierFormationDAO();
    $tabformaDAO = $formaDAO-> affichageFormationAModifier($idForma);

    require_once 'vue/vueModifierFormation.php';
  }



  if(isset($_POST['delete'])){//si le bouton supprimer est clické, alors cela supprime la formation et cela recharge la page actuelle

    $formaDAO1 = new SupprimerFormationDAO();
    $formaDAO1 -> supprimerInscrireFormation($idForma);

    $formaDAO = new SupprimerFormationDAO();
    $formaDAO -> supprimerFormation($idForma);


    $idUser = $_SESSION['idUtilisateur']['idUser'];//récupère l'id de l'utilisateur connecté

    $uneFormation = new FormationDAO();//permet de recharger la page actuelle
    $tabFormation = $uneFormation->getformation($idUser);

    $uneFormationResponsable = new FormationDAO();
    $tabFormationResponsable = $uneFormationResponsable->getformationresponsable();

    require_once 'vue/vueFormation.php' ;
  }


 ?>
