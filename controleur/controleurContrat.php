<?php

require_once 'lib/tab.php' ;

$tabContrat=$uneConnex->contrat();
$user = unserialize($_SESSION['unUtilisateur']);


// foreach ($tabContrat as $key) {
//   echo "<br>".$key['idContrat'];
//   echo "<br>".$key['dateDebut'];
//   echo "<br>".$key['dateFin'];
//   echo "<br>".$key['typeContrat'];
//   echo "<br>".$key['nbHeures'];
//   echo "<br>".$key['idUser'];
//   echo "</br>----------------------";
// }
// var_dump($tabContrat);
//
// var_dump($user);
require_once 'vue/vueContrat.php' ;
