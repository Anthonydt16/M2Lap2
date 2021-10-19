<?php
  require_once 'modele/dao/ModifierFormationDAO.php';
  require_once 'modele/dao/SupprimerFormationDAO.php';
  require_once 'modele/dao/FormationDAO.php';
  $idForma = $_POST['forma'];


  if (isset($_POST['alter'])){

    $formaDAO = new ModifierFormationDAO();
    $tabformaDAO = $formaDAO-> affichageFormationAModifier($idForma);

    require_once 'vue/vueModifierFormation.php';
  }



  if(isset($_POST['delete'])){

    $formaDAO1 = new SupprimerFormationDAO();
    $formaDAO1 -> supprimerInscrireFormation($idForma);

    $formaDAO = new SupprimerFormationDAO();
    $formaDAO -> supprimerFormation($idForma);




    $uneFormation = new FormationDAO();
    $tabFormation = $uneFormation->getformation();

    $uneFormationResponsable = new FormationDAO();
    $tabFormationResponsable = $uneFormationResponsable->getformationresponsable();

    require_once 'vue/vueFormation.php' ;
  }


 ?>
