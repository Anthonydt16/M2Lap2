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

  foreach($array as $ligne => $value){

    echo'<div class="accordion" id="accordionExample">
  	  <div class="accordion-item">
  	    <h2 class="accordion-header" id="headingOne">
  	      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
  	        n°'.$value['idContrat'].' de contrat
  	      </button>
  	    </h2>
  	    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
  	      <div class="accordion-body">
  					<?php
  	        echo tab($tabContrat,$EnTete);
  					?>
  	      </div>
  	    </div>
  	  </div>

  	</div>';
  }

}
