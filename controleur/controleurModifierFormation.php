<?php
  require_once 'modele/dao/ModifierFormationDAO.php';

  $idForma = $_POST['forma'];


  $formaDAO = new ModifierFormationDAO();
  $formaDAO -> affichageFormationAModifier($idForma);

  require_once 'vue/vueModifierFormation.php';
 ?>
