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


  public function modifierFormation($idForma){
    $requeteModifierFormations = DBConnex::getInstance()->prepare("

    ");
    $requeteModifierFormations->bindParam(":idForma", $idForma);
    $requeteModifierFormations->execute();
    $donneeModifierFormations=$requeteModifierFormations->fetchAll(PDO::FETCH_ASSOC);
    return $donneeModifierFormations;
  }

  public function affichageFormationAModifier($idForma){
    $requeteAffichage = DBConnex::getInstance()->prepare("
    SELECT intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax
    FROM formation
    WHERE idForma = :idForma
    ");
    $requeteAffichage->bindParam(":idForma", $idForma);
    $requeteAffichage->execute();
    $donneeAffichage=$requeteAffichage->fetchAll(PDO::FETCH_ASSOC);
    return $donneeAffichage;
  }
}
