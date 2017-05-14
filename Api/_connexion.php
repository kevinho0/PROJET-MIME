<?php
// -------------------------------------------------------------------------

/*
$host = "127.0.0.1"; // voir hébergeur
$user = "LS78_userara"; // identifiant de votre BD (vide ou "root" en local)
$pass = "Cg3ob9@7"; // mot de passe de votre BD (vide en local)
$bdd = "LS78_aradb"; // nom de la BD
*/
$host = "localhost"; // voir hébergeur
$user = "root"; // identifiant de votre BD (vide ou "root" en local)
$pass = ""; // mot de passe de votre BD (vide en local)
$bdd = "l3mime"; // nom de la BD

// -------------------------------------------------------------------------
// connexion a la base de donnees
@mysql_connect($host,$user,$pass) or die("Impossible de se connecter");
@mysql_select_db("$bdd") or die("Impossible de se connecter");
// -------------------------------------------------------------------------
?>
