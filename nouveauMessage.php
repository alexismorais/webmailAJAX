<?php
if (isset($_GET["user"])){
	$user = $_GET["user"];
}
?>


<form id="envoi" action="home.php?user=<?=$user?>" method="post">
	
	<div id="destinataire">
		<label for="destinataire">Destinataire</label>
		<input type="text" name="destinataire" maxlength="20"/>
	</div>
	
	<div id="message">
		<label for="message">Message</label>
		<input type="text" name="message" maxlength="300"/>
	</div>
	
	<input type="submit" value="Envoyer">
</form>