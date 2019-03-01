<?php
$user="";
if (isset($_GET["user"])){
	$user = $_GET["user"];
}
?>

<div id="divAffichage">
	<form id="formulaire" onsubmit="return envoyer()">
		<input name="user" type="hidden" value="<?=$user?>">
		<div id="destinataire">
			<label for="destinataire" id="labelDestinataire">Destinataire</label>
			<input type="text" name="destinataire" id="textDestinataire"  maxlength="20"/>
		</div>
		<div id="message">
			<label for="message" class="labelFormulaire">Message</label><br/>
			<textarea type="text" name="message" id="textMessage" maxlength="300"/></textarea>
		</div>
		<br/>
		<input value="Envoyer" id="btnEnvoyer" type="submit">
	</form>
</div>