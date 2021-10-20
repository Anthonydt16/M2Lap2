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
  public function getmesformations($idUser){
    $requeteObtenirMesFormations = DBConnex::getInstance()->prepare("
    SELECT intitule, descriptif, duree, dateOuvertinscriptions, dateClotureInscriptions, DateDebutFormation, EffectifMax, EtatInscrit
    FROM formation, inscrire, utilisateur
    WHERE utilisateur.idUser = :idUser
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

  /*
  *Récupère les formations auxquelles l'utilisateur connecté est inscrit et où il n'a pas encore été accepté de façon à afficher
  *ces dernières dans la select barre
  */
  public function getmesformationenattente($idUser){
    $requeteFormationAttente = DBConnex::getInstance()->prepare("
    SELECT formation.idForma, intitule
    FROM formation, inscrire, utilisateur
    WHERE utilisateur.idUser = :idUser
      AND DateDebutFormation > NOW()
      AND EtatInscrit ='0'
      AND inscrire.idForma = formation.idForma
      AND inscrire.idUser = utilisateur.idUser
    ORDER BY DateDebutFormation
    ");
    $requeteFormationAttente->bindParam(":idUser", $idUser);
    $requeteFormationAttente->execute();
    $donneeFormationAttente=$requeteFormationAttente->fetchAll(PDO::FETCH_ASSOC);
    return $donneeFormationAttente;
  }
}
