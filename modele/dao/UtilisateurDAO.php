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
      $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
      return $donnee;

    }
    public function UtilisateurRecupID($nom){
        $requete = DBConnex::getInstance()->prepare("SELECT idUser FROM `utilisateur` where nom = :nom ");
        $requete->bindParam(":nom",$nom);
        $requete->execute();
        $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
        return $donnee;
    }
    public function Utilisateurmdp($idUser){
        $requete = DBConnex::getInstance()->prepare("SELECT mdp FROM `utilisateur` where idUser = :idUser ");
        $requete->bindParam(":idUser",$idUser);
        $requete->execute();
        $donnee =  $requete->fetch(PDO::FETCH_ASSOC);
        return $donnee;
    }

    public function lesUtilisateur(){
        $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur`");
        $requete->execute();
        $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnee;

      }
// faire la disociation des requete entre ligue/ fonction /club
      public function UtilisateurListFonctIdLigue(){
          $requete = DBConnex::getInstance()->prepare("SELECT f.idFonct , l.idLigue, c.idClub  FROM `ligue` as l, utilisateur as u, fonction as f , club as c where c.idClub = u.idClub and f.idFonct = u.idFonct and l.idLigue = u.idUser");
          $requete->execute();
          $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
          return $donnee;
      }
      public function recupIdFonct(){
          $requete = DBConnex::getInstance()->prepare("SELECT idFonct FROM `fonction`");
          $requete->execute();
          $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
          return $donnee;
      }
      public function recupIdLigue(){
          $requete = DBConnex::getInstance()->prepare("SELECT idLigue FROM `ligue`");
          $requete->execute();
          $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
          return $donnee;
      }
      public function recupIdClub(){
          $requete = DBConnex::getInstance()->prepare("SELECT idClub FROM `club`");
          $requete->execute();
          $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
          return $donnee;
      }

      public function updateIntervenant(){
          $requete = DBConnex::getInstance()->prepare("UPDATE utilisateur SET `nom` = :nom, `prenom` = :prenom, `login`= :login,  `mdp` = :mdp, `statut` = :statut, `typeUser` = :typeUser, `idFonct` = :idFonct, `idLigue` = :idLigue, `idClub` = :idClub WHERE idUser = :idUser");
          $requete->execute();
          // :nom,
          // :prenom,
          // :login,
          // :mdp,
          // :statut,
          // :typeUser,
          // :idFonct,
          // :idLigue,
          // :idClub
          $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
          return $donnee;
      }


}
