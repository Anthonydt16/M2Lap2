<?php
class UtilisateurDAO extends PDO{
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
      } catch (Exception $e) {
          echo $e->getMessage();
          die("Impossible de se connecter.") ;
      }
  }

  public function login($connex,$login){

      $requete = DBConnex::getInstance()->prepare("SELECT login FROM `utilisateur` WHERE login = :login;");
      $requete->bindParam(":login",$login);
      $requete->execute();
      $donnee = $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee['login'];

  }
  public function password($connex,$mdp){

      $requete = DBConnex::getInstance()->prepare("SELECT mdp FROM `utilisateur` WHERE mdp = :mdp ;");
      $requete->bindParam(":mdp",$mdp);
      $requete->execute();
      $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee['mdp'];
  }
  public function type($connex,$login, $mdp){
      $requete = DBConnex::getInstance()->prepare("SELECT idFonct FROM `utilisateur` where login = :login AND 	mdp = :mdp;");
      $requete->bindParam(":mdp",$mdp);
      $requete->bindParam(":login",$login);
      $requete->execute();
      $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee['idFonct'];
      }
  public function status($connex,$login, $mdp){
      $requete = DBConnex::getInstance()->prepare("SELECT statut FROM `utilisateur` where login = :login AND 	mdp = :mdp;");
      $requete->bindParam(":mdp",$mdp);
      $requete->bindParam(":login",$login);
      $requete->execute();
      $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee['statut'];
  }

  public function Utilisateur($login){
      $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur` where login = :login ");
      $requete->bindParam(":login",$login);
      $requete->execute();
      $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
      return $donnee;

    }
    public function UtilisateurRecupID($nom){
        $requete = DBConnex::getInstance()->prepare("SELECT idUser FROM `utilisateur` where nom = :nom ");
        $requete->bindParam(":nom",$nom);
        $requete->execute();
        $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
        return $donnee;
    }
}
