<?php
//remet a zero les sessions
$_SESSION = NULL;

//permet la redirection
$_SESSION['m2lMP']="accueil";
header('location: index.php');
