<?php
  require_once 'modele/dao/AjouterFormationDAO.php';

  if(isset($_POST['insert'])){

    $formaIdDAO = new AjouterFormationDAO();
    $tabLastIdForma = $formaIdDAO -> getlastid();

    $lastIdForma = $tabLastIdForma[0]['newForma'];//permet d'obtenir sous forme de texte l'id de la nouvelle formation

    /*
    *permet de récupérer les données entrées dans le formulaire d'ajout afin de les utiliser dans la requete sql
    */
    $intitule = $_POST['intitule'];
    $descriptif = $_POST['descriptif'];
    $duree = $_POST['duree'];
    $ouvertureInscription = $_POST['ouvertureInscription'];
    $fermetureInscription = $_POST['fermetureInscription'];
    $debutFormation = $_POST['debutFormation'];
    $effectifMax = $_POST['effectifMax'];


    $formaDAO = new AjouterFormationDAO();
    $formaDAO -> ajouterformation($lastIdForma, $intitule, $descriptif, $duree, $ouvertureInscription, $fermetureInscription, $debutFormation, $effectifMax);

    require_once 'vue/vueAjouterFormation.php' ;
  }


 ?>
