<?php

$user = $_GET["user"];
$dbhost = "localhost";
$dbuser = "test";
$dbpass = "123";
$db = "mail";
$user="";

try
{
	$bdd = new PDO('mysql:host=localhost;dbname='.$db.';charset=utf8', $dbuser, $dbpass);
}
catch (Exception $e)
{
		die('Erreur : ' . $e->getMessage());
}

if (isset($_GET["user"])){
	$user = $_GET["user"];
}

if (isset($_POST["message"]) && (isset($_POST["destinataire"]))){    
	$req = $bdd->prepare('INSERT INTO donnee (destinataire,expediteur,date,message) VALUES (?,?,NOW(),?)');
	$req->execute(array($_POST["destinataire"],$user,$_POST["message"]));
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<script>
			function Recu(user){
				xhr = new XMLHttpRequest();
				xhr.open('GET', 'http://localhost/liste.php?user=' + user);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						document.getElementById('liste').innerHTML = xhr.responseText;
					}
				}	
			}
			
			function affichageRecu(id){
				xhr = new XMLHttpRequest();
				xhr.open('GET', 'http://localhost/affichageMessage.php?id=' + id);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						document.getElementById('affichage').innerHTML = xhr.responseText;
					}
				}	
			}
			
			function NouveauMessage(user){
				xhr = new XMLHttpRequest();
				xhr.open('GET', 'http://localhost/nouveauMessage.php?user=' + user);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						document.getElementById('affichage').innerHTML = xhr.responseText;
					}
				}	
			}
			
			function supprimer(id,user){
				xhr = new XMLHttpRequest();
				xhr.open('DELETE', 'http://localhost/supprimer.php?id=' + id);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						 Recu(user);
					}
				}	
				
			}
			
						
			function envoyer(){
				
				
			}
			
			
		</script>
	
		<div id="barre">
			<a href="#" onClick="NouveauMessage('<?=$user?>')">Nouveau message</a>
			<a href="#" onClick="Recu('<?=$user?>')">Boite de réception</a>
		</div>
		<div id="menu">
			 <div id="liste">
			  
			 </div>
			 <div id="affichage">
			  
			 </div>
		</div>
	</body>
</html>