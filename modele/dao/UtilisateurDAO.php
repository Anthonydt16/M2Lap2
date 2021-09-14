<?php
public static function UNUtilisateur(){
    $result =[];
    $requete = DBConnex::getInstance()->prepare("SELECT * FROM `utilisateur` where login = :login ");
    $requete->bindParam(":login",$login);
    $requete->execute();
    $donnee =  $requete->fetch(PDO::FETCH_ASSOC);

    // if(!empty($donnee)){
    //     foreach ($donnee as $key ) {
            
    //     }
    // }
}
