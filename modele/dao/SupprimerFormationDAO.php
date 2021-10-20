<?php
class SupprimerFormationDAO extends PDO{

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
  public function supprimerInscrireFormation($idForma){//supprime les formations avec l'id sélectionné dans la table 'inscrire' pour simuler le DELETE ON CASCADE
    $requeteSupprimerInscrits = DBConnex::getInstance()->prepare("
    DELETE FROM inscrire
    WHERE idForma = :idForma
    ");
    $requeteSupprimerInscrits->bindParam(":idForma", $idForma);
    $requeteSupprimerInscrits->execute();
    $donneeSupprimerInscrits=$requeteSupprimerInscrits->fetchAll(PDO::FETCH_ASSOC);
    return $donneeSupprimerInscrits;
  }

  public function supprimerFormation($idForma){//supprime la formation avec l'id sélectionné dans la table formation
    $requeteSupprimerFormations = DBConnex::getInstance()->prepare("
    DELETE FROM formation
    WHERE idForma = :idForma
    ");
    $requeteSupprimerFormations->bindParam(":idForma", $idForma);
    $requeteSupprimerFormations->execute();
    $donneeSupprimerFormations=$requeteSupprimerFormations->fetchAll(PDO::FETCH_ASSOC);
    return $donneeSupprimerFormations;
  }
}
