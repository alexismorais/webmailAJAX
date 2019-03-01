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
/*
if (isset($_POST["message"]) && (isset($_POST["destinataire"]))){    
	$req = $bdd->prepare('INSERT INTO donnee (destinataire,expediteur,date,message) VALUES (?,?,NOW(),?)');
	$req->execute(array($_POST["destinataire"],$user,$_POST["message"]));
}*/
?>
<html id="pageHome">
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<script>
			function Recu(user){
				xhr = new XMLHttpRequest();
				xhr.open('GET', 'http://localhost/mail/liste.php?user=' + user);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						document.getElementById('liste').innerHTML = xhr.responseText;
					}
				}	
			}
			
			function affichageRecu(id){
				xhr = new XMLHttpRequest();
				xhr.open('GET', 'http://localhost/mail/affichageMessage.php?id=' + id);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						document.getElementById('affichage').innerHTML = xhr.responseText;
					}
				}	
			}
			
			function NouveauMessage(user){
				xhr = new XMLHttpRequest();
				xhr.open('GET', 'http://localhost/mail/nouveauMessage.php?user=' + user);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						document.getElementById('affichage').innerHTML = xhr.responseText;
					}
				}	
			}
			
			function supprimer(id,user){
				xhr = new XMLHttpRequest();
				xhr.open('DELETE', 'http://localhost/mail/supprimer.php?id=' + id);
				xhr.send(null);
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						 Recu(user);
						 document.getElementById('affichage').innerHTML = "";
					}
				}
			}
							
			function envoyer(){
				formElement = document.getElementById("formulaire");
				xhr = new XMLHttpRequest();
				xhr.open("POST", "envoyer.php");
				xhr.send(new FormData(formElement));
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						document.getElementById('textMessage').value="";
						document.getElementById('textDestinataire').value="";
					}
				}
				return false;
			}
		
			
			
		</script>
	
		<div id="barre">
			</br>
			<a href="#" class="btnBar" onClick="NouveauMessage('<?=$user?>')">Nouveau message</a>
			<a href="#" class="btnBar" onClick="Recu('<?=$user?>')">Boite de réception</a>
			<a href="index.php" class="btnBar">Deconnexion</a>
		</div>
		<div id="menu">
			 <div id="liste" style="overflow:auto">
			 </div>
			 <div id="affichage">
			  
			 </div>
		</div>
	</body>
</html>