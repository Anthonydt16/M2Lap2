<?php
class DemandeFormationDAO extends PDO{

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

public function getdemandeformation(/*$login*/){
      $requete = DBConnex::getInstance()->prepare("
      SELECT ((EffectifMax)-(count(inscrire.idForma))) as PlacesRestantes, intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation
      FROM inscrire, formation
      WHERE inscrire.idForma = formation.idForma
        AND DateDebutFormation > NOW()
      GROUP BY formation.idForma
      ORDER BY DateDebutFormation
      ");
      $requete->bindParam(":login", $login);
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
    }
}
