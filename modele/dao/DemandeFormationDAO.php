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

    public function getinscriptions(){//récupère toutes les inscriptions qui sont en attentes pour les afficher
      $requete = DBConnex::getInstance()->prepare("
      SELECT formation.idForma, intitule, nom, prenom, statut, DateInscription, utilisateur.idUser
      FROM inscrire, utilisateur, formation
      WHERE EtatInscrit = '0'
      AND inscrire.idForma = formation.idForma
      AND inscrire.idUser = utilisateur.idUser
      GROUP BY formation.idForma
      ");
      $requete->execute();
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;
    }
}
