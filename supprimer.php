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

if(isset($_GET["id"])){
    $prep = $bdd->prepare('DELETE FROM donnee WHERE id=?');
	$prep->execute(array($_GET["id"]));
	console.log("OK");
}	
?>