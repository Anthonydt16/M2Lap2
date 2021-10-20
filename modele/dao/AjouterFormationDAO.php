<?php
class AjouterFormationDAO extends PDO{

  private static $instance;

  public static function getInstance(){
      if ( !self::$instance ){
          self::$instance = new DBConnex();
      }
      return self::$instance;
  }

  public function __construct(){
      try {
          parent::__construct(Param::$dsn ,Param::$user, Param::$pass);
      }
      catch (Exception $e) {
          echo $e->getMessage();
          die("Impossible de se connecter.") ;
      }
  }
  //permet au responsable d'ajouter une formation
  public function ajouterformation($lastIdForma, $intitule, $descriptif, $duree, $ouvertureInscription, $fermetureInscription, $debutFormation, $effectifMax){
    $requeteAjouterFormation = DBConnex::getInstance()->prepare("
    INSERT INTO formation
    VALUES(:lastIdForma, :intitule, :descriptif, :duree, :ouvertureInscription, :fermetureInscription, :debutFormation, :effectifMax)
    ");
    $requeteAjouterFormation->bindParam(':lastIdForma', $lastIdForma);
    $requeteAjouterFormation->bindParam(':intitule', $intitule);
    $requeteAjouterFormation->bindParam(':descriptif', $descriptif);
    $requeteAjouterFormation->bindParam(':duree', $duree);
    $requeteAjouterFormation->bindParam(':ouvertureInscription', $ouvertureInscription);
    $requeteAjouterFormation->bindParam(':fermetureInscription', $fermetureInscription);
    $requeteAjouterFormation->bindParam(':debutFormation', $debutFormation);
    $requeteAjouterFormation->bindParam(':effectifMax', $effectifMax);
    $requeteAjouterFormation->execute();
    $donneeAjouterFormation=$requeteAjouterFormation->fetchAll(PDO::FETCH_ASSOC);
    return $donneeAjouterFormation;
  }

  public function getlastid(){//permet de récupérer le dernier id de formation en lui ajoutant 1 de façon à créer un nouvel id de formation
    $requeteGetLastId = DBConnex::getInstance()->prepare("
    SELECT count(idForma)+1 as newForma
    FROM formation
    ");
    $requeteGetLastId->execute();
    $donneeGetLastId=$requeteGetLastId->fetchAll(PDO::FETCH_ASSOC);
    return $donneeGetLastId;
  }
}
