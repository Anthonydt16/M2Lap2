<?php
require_once 'modele/dao/param.php';
require_once 'modele/dao/dBconnex.php';
require_once 'modele/dto/Utilisateur.php';


//nouvelle objet connex
$uneConnex = new DBConnex(Param::$dsn, Param::$user, Param::$pass);
if(isset($_GET['SelectInter'])){
	$_SESSION['SelectInter'] = $_GET['SelectInter'];
}
if(isset($_GET['m2lMP'])){
	$_SESSION['m2lMP']= $_GET['m2lMP'];
}

else
{
	if(!isset($_SESSION['m2lMP'])){
		$_SESSION['m2lMP']="accueil";
	}
}

if(isset($_POST["login"])){

	if(!empty($_POST["login"])){
	 //verification bon mdp et login

		//connex bdd
		$maConnex = $uneConnex->connexion(Param::$dsn, Param::$user, Param::$pass);
		//recup des login et MDP

		$login= $uneConnex->login($maConnex,$_POST["login"]);
		$mdp = $uneConnex->password($maConnex,md5($_POST["mdp"]));

		$tabUtilisateur = $uneConnex->Utilisateur($login);
		$idUtilisateur= $uneConnex->UtilisateurRecupIDByLogin($login);

		//teste si le mdp et le login correspond
		if($mdp == md5($_POST["mdp"]) && $login == $_POST["login"]){

			$_SESSION['identification'] = $_POST["login"];

			$_SESSION['type']=$uneConnex->type($maConnex,$_SESSION['identification'],md5($_POST["mdp"]));
			$_SESSION['status']=$uneConnex->status($maConnex,$_SESSION['identification'],md5($_POST["mdp"]));
			//instanciation de la classe

			$_SESSION['idUtilisateur']=$idUtilisateur;

			$unUtilisateur= new Utilisateur();
			$unUtilisateur->hydrate($tabUtilisateur);
			$_SESSION['unUtilisateur'] = serialize($unUtilisateur);
			$_SESSION['m2lMP'] = "Accueil";
		}
		else{
			//si echec affichage de l'erreur.

			?>
				<script>
				function

				alert("une erreur a etais detecté dans le mot de passe ou le login ressayez.");

				</script>
			<?php
		}
	}
}

$m2lMP = new Menu("m2lMP");
//$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Déconexion"));
if( !empty($_SESSION['identification'])){
	//menu si l'utilisateur est log




	//secretaire
	if($_SESSION['type'] == "1" ){
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Déconexion"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("contrat", "Contrat"));

	}
	//menu intervenant
	if($_SESSION['type'] == "2" ){

		if($_SESSION['status']=="Benevole"){
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("InformationPersonnel", "InformationPersonnel"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("contrat", "Contrat"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("formation", "Formation"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("mesFormations", "MesFormations"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Déconnexion"));
		}
		elseif($_SESSION['status']=="salarie"){
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("InformationPersonnel", "InformationPersonnel"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("contrat", "Contrat"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("formation", "Formation"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("mesFormations", "MesFormations"));
			$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Déconnexion"));
		}

	}
	//menu responsable DHR
	if($_SESSION['type'] == "3" ){

		$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("contrat", "Contrat"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("intervenant", "Intervenant"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("InformationPersonnel", "InformationPersonnel"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Déconnexion"));


	}
	//menu responsable formation
	if($_SESSION['type'] == "4" ){
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("formation", "Formation"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("demandeFormation", "Dde Inscription"));
		$m2lMP->ajouterComposant($m2lMP->creerItemLien("deconnexion", "Déconnexion"));
	}



}
else{
	//menu si l'utilisateur est pas log
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("accueil", "Accueil"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("services", "Services"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("locaux", "Locaux"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("ligues", "Ligues"));
	$m2lMP->ajouterComposant($m2lMP->creerItemLien("connexion", "Se connecter"));
}



$menuPrincipalM2L = $m2lMP->creerMenu($_SESSION['m2lMP'],'m2lMP');


include_once dispatcher::dispatch($_SESSION['m2lMP']);
