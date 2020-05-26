<?php $this->titre = "Ecriture d'un chapitre"; ?>

<h1 id="title-admin-write">Commencer l'écriture d'un nouveau chapitre</h1>
<form id="form-admin-write" method="post" action="index.php?action=traitementAdminWrite">
	<div id="div-img-title-admin-writer">
		<div class="div-flex-admin-writer">
			<textarea id="img-wysiswg" name="img-admin-write" placeholder="Insérer l'URL de l'image ici"></textarea>
		</div>
		<div class="div-flex-admin-writer">
		    <input type="text" name="title-admin-write" id="input-title-admin-write" placeholder="TITRE">
    	</div>
	</div>
    <textarea id="textarea-wysiswg" name="text-admin-write"></textarea>
	<input type="submit" value="Enregistrer" id="submit-admin-write">
</form>