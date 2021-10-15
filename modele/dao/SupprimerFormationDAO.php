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
  public function supprimerFormation($idForma){
    $requeteSupprimerInscrits = DBConnex::getInstance()->prepare("
    DELETE FROM inscrire
    WHERE idForma = :idForma
    ")
    $requeteSupprimerInscrits->bindParam(":idForma", $idForma);
    $requeteSupprimerInscrits->execute();
    $donneeSupprimerInscrits=$requeteSupprimerInscrits->fetchAll(PDO::FETCH_ASSOC);

    $requeteSupprimerFormations = DBConnex::getInstance()->prepare("
    DELETE FROM formation
    WHERE idForma = :idForma
    ");
    $requeteSupprimerFormations->bindParam(":idForma", $idForma);
    $requeteSupprimerFormations->execute();
    $donneeSupprimerFormations=$requeteSupprimerFormations->fetchAll(PDO::FETCH_ASSOC);
    return $donneeSupprimerInscrits, $donneeSupprimerFormations;
  }
}
