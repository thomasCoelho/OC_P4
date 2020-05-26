<?php $this->titre = "Connexion"; ?>

<section id="section-connect">
	<h1 id="title-connect">Se connecter</h1>
	<form id="form-connect"  method="post" action="index.php?action=traitementAdminConnect" autocomplete="off">
		<input type="text" class="input-connect" name="pseudo-connect" placeholder="Pseudo" required>
		<input type="password" class="input-connect" name="password-connect" placeholder="Mot de passe" required>
		<?php if(!empty($_COOKIE['wrongPass'])){ ?>
			<p id="wrong-password"><?php echo $_COOKIE['wrongPass']; ?></p>
		<?php } ?>
		<input type="submit" id="submit-connect">
	</form>
</section>