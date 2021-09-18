<?php
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
$EnTete = array("idContrat", "dateDebut", "dateFin", "typeContrat", "nbHeures", "idUser");
  foreach($tab as $ligne){

    echo'<div class="accordion" id="accordionExample">';
  	  echo'<div class="accordion-item">';
  	   echo '<h2 class="accordion-header" id="headingOne">';
  	     echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  	        n°'.$ligne['idContrat'].' de contrat et lId user :'.$ligne['idUser'].'
  	      </button>';
  	  echo  '</h2>';
  	    echo'<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">';
  	    echo  '<div class="accordion-body">';

  	         echo tab($tab,$EnTete);

  	     echo '</div>';
  	   echo '</div>';
  	 echo '</div>';

  	echo '</div>';
  }

}
