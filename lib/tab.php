<?php

require_once 'modele/dao/param.php';
require_once 'modele/dao/dBconnex.php';


function tab($array,$enTete){



    echo'<table class="table">';
    echo '<thead>';
    echo"<tr>";
    for($i = 0; $i<count($enTete); $i++){
        echo'<th scope="col">';
        echo $enTete[$i];
        echo"</th>";
    }
    echo"</tr>";
    echo '</thead>';
    echo '<tbody>';



    foreach($array as $ligne => $value){


      echo "<tr>";



      foreach($value as $cell){

          echo "<td>".$cell."</td>";


      }

      echo "</tr>";
    }
    echo '</tbody>';
    echo "</table>";
}

function menuDeroulant($tab){
//nouvelle objet connex
$uneConnex = new DBConnex(Param::$dsn, Param::$user, Param::$pass);
$leBulletin = new BulletinDAO();
$leContrat = new ContratDAO();
$EnTete = array("Numero bulletin", "mois", "année", "lien PDF", "idContrat","Modification");

  foreach($tab as $ligne){
    $tabNomContrat= $leContrat->nomContrat($ligne['idContrat']);
    foreach ($tabNomContrat as $key){
      $nom = $key['nom'];
      $prenom = $key['prenom'];
    }
    $tabBulletin= $leBulletin->bulletin($ligne['idContrat']);
    for($i = 0; $i<count($tabBulletin); $i++){

      array_Push($tabBulletin[$i], '<button id="boutonModifBulletin" type="button" onclick="click();" class="btn btn-secondary btn-lg btn-block">modifier</button>');

    }
    echo'<div class="accordion" id="accordionExample">';
  	  echo'<div class="accordion-item">';
  	   echo '<h2 class="accordion-header" id="'.$ligne['idContrat'].'">';
  	     echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$ligne['idContrat'].'" aria-expanded="true" aria-controls="collapseOne">
  	        n° de contrat '.$ligne['idContrat'].' | nom :'.$nom.' prenom : '.$prenom.'
  	      </button>';
  	  echo  '</h2>';
  	    echo'<div id="collapse'.$ligne['idContrat'].'" class="accordion-collapse collapse show" aria-labelledby="'.$ligne['idContrat'].'" data-bs-parent="#accordionExample">';
  	    echo  '<div class="accordion-body">';


  	         echo tab($tabBulletin,$EnTete);

  	     echo '</div>';
  	   echo '</div>';
  	 echo '</div>';

  	echo '</div>';
  }

}
