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
	$req = $bdd->prepare("SELECT * FROM donnee WHERE id=?");
	$req -> execute(array($_GET["id"]));

	while ($donnees = $req->fetch()) {
	echo  "</br><p>Le : ".$donnees['date']."<br/>De : <b>".$donnees['expediteur']."</b><br/>A : <b>".$donnees['destinataire']."</b><br/><br/>".$donnees['message']."</p>";
	}
}	
?>