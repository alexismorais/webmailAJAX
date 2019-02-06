<?php
$user="";
if (isset($_GET["user"])){
	$user = $_GET["user"];
}
?>


<form id="formulaire" onsubmit="return envoyer()">
	<input name="user" type="hidden" value="<?=$user?>">
	<div id="destinataire">
		<label for="destinataire">Destinataire</label>
		<input type="text" name="destinataire" id="textDestinataire" class="champ" maxlength="20"/>
	</div>
	
	<div id="message">
		<label for="message">Message</label>
		<input type="text" name="message" id="textMessage" maxlength="300"/>
	</div>
	<input class="btn" value="Envoyer" type="submit">
</form>