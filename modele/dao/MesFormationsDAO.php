<?php
class MesFormationDAO extends PDO{

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
  Récupère les formations auxquelles l'utilisateur connecté est inscrit pour lui afficher ses futures formations.
  */
  public function getmesformations(){
    $requeteObtenirMesFormations = DBConnex::getInstance()->prepare("
    SELECT intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax
    FROM formation, inscrire, utilisateur
    WHERE idUser = :idUser
      AND EtatInscrit = '1'
      AND DateDebutFormation > NOW()
      AND inscrire.idForma = formation.idForma
      AND inscrire.idUser = utilisateur.idUser
    ORDER BY DateDebutFormation
    Limit 3
    ");
    $requeteObtenirMesFormations->bindParam(":idUser", $idUser);
    $requeteObtenirMesFormations->execute();
    $donneeObtenirMesFormations=$requeteObtenirMesFormations->fetchAll(PDO::FETCH_ASSOC);
    return $donneeObtenirMesFormations;
  }
}
