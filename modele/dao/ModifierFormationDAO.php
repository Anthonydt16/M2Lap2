<?php
class ModifierFormationDAO extends PDO{

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

  /*
  *Permet de modifier la formation sélectionnée
  */
  public function modifierFormation($idForma, $intitule, $descriptif, $duree, $ouvertureInscription, $fermetureInscription, $debutFormation, $effectifMax){
    $requeteModifierFormations = DBConnex::getInstance()->prepare("
    UPDATE formation
    SET intitule = :intitule, descriptif = :descriptif, duree = :duree, dateOuvertinscriptions = :ouvertureInscription, dateClotureInscriptions = :fermetureInscription, DateDebutFormation = :debutFormation, EffectifMax = :effectifMax
    WHERE idForma = :idForma
    ");
    $requeteModifierFormations->bindParam(":idForma", $idForma);
    $requeteModifierFormations->bindParam(":intitule", $intitule);
    $requeteModifierFormations->bindParam(":descriptif", $descriptif);
    $requeteModifierFormations->bindParam(":duree", $duree);
    $requeteModifierFormations->bindParam(":ouvertureInscription", $ouvertureInscription);
    $requeteModifierFormations->bindParam(":fermetureInscription", $fermetureInscription);
    $requeteModifierFormations->bindParam(":debutFormation", $debutFormation);
    $requeteModifierFormations->bindParam(":effectifMax", $effectifMax);
    $requeteModifierFormations->execute();
    $donneeModifierFormations=$requeteModifierFormations->fetchAll(PDO::FETCH_ASSOC);
    return $donneeModifierFormations;
  }

  public function affichageFormationAModifier($idFormaModif){//permet l'affichage de la formation sélectionnée afin de la modifier
    $requeteAffichage = DBConnex::getInstance()->prepare("
    SELECT idForma, intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax
    FROM formation
    WHERE idForma = :idForma
    ");
    $requeteAffichage->bindParam(":idForma", $idFormaModif);
    $requeteAffichage->execute();
    $donneeAffichage=$requeteAffichage->fetchAll(PDO::FETCH_ASSOC);
    return $donneeAffichage;
  }


}
