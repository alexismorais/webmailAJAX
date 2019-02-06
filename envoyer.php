<?php

//Info base
$dbhost = "localhost";
$dbuser = "test";
$dbpass = "123";
$db = "mail";

try
{
	$bdd = new PDO('mysql:host=localhost;dbname='.$db.';charset=utf8', $dbuser, $dbpass);
}
catch (Exception $e)
{
		die('Erreur : ' . $e->getMessage());
}

if (isset($_POST["message"]) && (isset($_POST["destinataire"])) && (isset($_POST["user"]))){    
	$req = $bdd->prepare('INSERT INTO donnee (destinataire,expediteur,date,message) VALUES (?,?,NOW(),?)');
	$req->execute(array($_POST["destinataire"],$_POST["user"],$_POST["message"]));
}


?>