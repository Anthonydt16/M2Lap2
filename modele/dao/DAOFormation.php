<?php
class FormationDAO extends PDO{

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

  public function getformation(){

      $requete = DBConnex::getInstance()->prepare("SELECT idForma, intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax FROM formation Order by DateDebutFormation");
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
  }
}
