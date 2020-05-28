<?php $this->titre = "Edition d'un billet"; ?>

<?php if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
		if($_SESSION['pseudo'] == $_COOKIE['idSession']){
			 $this->titre = "Ecriture d'un chapitre"; ?>

<h1 id="title-admin-write">Modifier un chapitre</h1>
	<form id="form-admin-write" method="post" action="index.php?action=traitementAdminWrite&amp;edit=true&amp;billet=<?php echo $billet['billet_id']; ?>">
		<div id="div-img-title-admin-writer">
			<div class="div-flex-admin-writer">
				<textarea id="img-wysiswg" name="img-edit-write" placeholder="Insérer l'image ici"><?php echo($billet['billet_image']); ?></textarea>
			</div>
			<div class="div-flex-admin-writer">
			    <input type="text" name="title-edit-write" id="input-title-admin-write" placeholder="TITRE" value="<?php echo($billet['billet_title']); ?>">
	    	</div>
		</div>
	    <textarea id="textarea-wysiswg" name="text-edit-write"><?php echo($billet['billet_text']); ?></textarea>
		<div>
		<input type="radio" name="radio-edit" id="radio1" class="css-checkbox" value="Modifier" checked="checked"/>
		<label for="radio1" class="css-label cb0 radGroup2">MODIFIER</label>
		<input type="radio" name="radio-edit" id="radio2" class="css-checkbox" value="Supprimer" />
		<label for="radio2" class="css-label cb0 radGroup2">SUPPRIMER</label>
		</div>
		<input type="submit" value="Enregistrer" id="submit-admin-write"></submit>
	</form>			
<?php }
	} ?>