<?php
class DBConnex extends PDO{

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

    public function connexion($unDsn,$unUser,$unPass){
        try{
            $uneConnex = new PDO($unDsn, $unUser, $unPass);
            return $uneConnex;
        }
        catch(PDOException $e){
            die("erreur de connexion !".$e->getMessage());
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
    public function contrat(){

        $requete = DBConnex::getInstance()->prepare("SELECT * FROM contrat");
        $requete->execute();
        $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnee;
    }
    public function contratUser($id){
        $requete = DBConnex::getInstance()->prepare("SELECT * FROM contrat where idUser = :id");

        $requete->bindParam(":id",$id);
        $requete->execute();
        $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnee;
    }
    public function bulletin($idContrat){

        $requete = DBConnex::getInstance()->prepare("SELECT * FROM bulletin where idContrat = :idContrat");
        $requete->bindParam(":idContrat",$idContrat);
        $requete->execute();
        $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnee;
    }
    public function nomContrat($idContrat){

        $requete = DBConnex::getInstance()->prepare("SELECT U.nom,U.prenom FROM utilisateur AS U, contrat AS C where C.idUser = U.idUser AND C.idContrat = :numIDContrat");
        $requete->bindParam(":numIDContrat",$idContrat);
        $requete->execute();
        $donnee =  $requete->fetchAll(PDO::FETCH_ASSOC);
        return $donnee;
    }
}
