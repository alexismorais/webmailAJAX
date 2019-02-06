<?php

$dbhost = "localhost";
$dbuser = "test";
$dbpass = "123";
$db = "mail";
$user = "";
$liste = "";

if (isset($_GET["user"])){
	$user = $_GET["user"];
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname='.$db.';charset=utf8', $dbuser, $dbpass);
	}
	catch (Exception $e)
	{
			die('Erreur : ' . $e->getMessage());
	}

	$req = $bdd->prepare("SELECT * FROM donnee WHERE destinataire=? ORDER BY date DESC");
	$req->execute(array($_GET["user"]));
	
	while ($donnees = $req->fetch()) {
		$apercu = substr($donnees['message'], 0, 20);
		if(strlen($donnees['message'])>20){
			$apercu .="...";
		}
        
		$liste .= "
			<li>
				<a id=\"selectionMail\"  href=\"#\" onclick=\"affichageRecu(".$donnees['id'].")\">
					Le ".$donnees['date']." <b>".$donnees['expediteur']."</b> : ".$apercu."
				</a>
				<a id=\"croix\" onClick=\"supprimer(".$donnees['id'].",'".$user."')\" href=\"#\">
				x
				</a>
			</li>";   
	}
}





?>
<ul>
	<?=$liste?>
</ul>