<?php
//remet a zero les sessions
$_SESSION['identification'] = [];
$_SESSION['mdp'] = [];

//permet la redirection
$_SESSION['m2lMP']="accueil";
header('location: index.php');

