<?php $this->titre = "Accueil Administration"; ?>

<section id="section-signal-comment">
	<h2 class="h2-admin-home">Modération<span class="count"><?php echo($nombreComment); ?>+</span></h2>
	<?php if(empty($noComm)): ?>
		<p>Tout semble bien aller, aucun commentaire n'a été signalé dernièrement.</p>
	<?php  endif;
	foreach ($comments as $comment): ?>
		<div class="container-signal-comment">
			<div class="div-content-comment">
				<span class="comment-pseudo"><?php echo($comment['comment_pseudo']); ?></span>
				<p class="comment-text"><?php echo($comment['comment_text']); ?></p>
				<span class="comment-date">Posté le : <?php echo($comment['comment_date_fr']); ?> </span>
			</div>
			<div class="div-bouton-moderation">
				<button class="button-moderation ignorer-button-moderation"><a href="index.php?action=AdminHome&amp;statusComm=safeComm&amp;comment=<?php echo $comment['comment_id']; ?>">IGNORER</a></button>
				<button class="button-moderation supprimer-button-moderation"><a href="index.php?action=AdminHome&amp;statusComm=deleteComm&amp;comment=<?php echo $comment['comment_id']; ?>">SUPPRIMER</a></button>
			</div>
		</div>
	<?php endforeach;  ?>	
</section>

<section id="section-contact-admin">
	<h2 class="h2-admin-home">Contacts<span class="count"><?php echo($nombreContact); ?>+</span></h2>
	<?php if(empty($noContact)): ?>
		<p>Aucun message ne vous a été envoyé dernièrement.</p>
	<?php  endif;
	foreach ($contacts as $contact): ?>
		<div class="container-contact">
			<div class="div-content-contact">
				<span class="contact-email">De : <?php echo($contact['contact_email']); ?> / <?php echo($contact['contact_prenom']); ?></span>
				<p class="contact-objet"><?php echo($contact['contact_objet']); ?></p>
				<p class="contact-message"><?php echo($contact['contact_message']); ?> </p>
			</div>
			<div class="div-bouton-moderation">
				<button class="button-moderation archiver-button-moderation"><a href="index.php?action=AdminHome&amp;contact=<?php echo $contact['contact_id']; ?>">Archiver</a></button>
			</div>
		</div>
	<?php endforeach; ?>
</section>
