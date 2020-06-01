<?php $this->titre = $billet['billet_title']; ?>

<section id="section-billet">
	<h1 id="title-billet"><?php echo($billet['billet_title'])?></h1>
	<figure id="figure-billet">
	<img class="img-billet" src="Content/images/img-chap.jpg" alt="Illustration chapitre">
	</figure>
	<?php if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
		if($_SESSION['pseudo'] == $_COOKIE['idSession']){ ?>	
			<div id="div-billet-edit">
				<a href="index.php?action=traitementAdminWrite&amp;billet=<?php echo $billet['billet_id']; ?>" id="billet-edit" class="billet-edit">EDITER</a>
			</div>
<?php }} ?>

	<div class="text-billet"><?php echo(strip_tags(html_entity_decode($billet['billet_text'], ENT_NOQUOTES, '<br>'))); ?></div>
	<span class="date-billet"><?php echo("Publié le : " .$billet['date_fr']); ?></span>
</section>

<section id="section-comment">
	<h1 id="title-comment">Commentaires</h1>
	<button id="button-add-comment">Ajouter un commentaire</button>
	<div id="div-add-comment">
		<form id="form-add-comment" method="post" action="index.php?action=traitementComment">
			<label class="label-add-comment" for="user-pseudo">Votre Prénom</label>
			<input class="input-add-comment" id="user-pseudo" type="text" name="user-pseudo" required>
			<label class="label-add-comment" for="user-text">Votre commentaire</label>
			<textarea class="text-add-comment" id="user-text" name="user-text" required></textarea>
			<div id="hidden-input">		
				<input type="text" name="billet-id" value=<?php echo($billet['billet_id']); ?>>
			</div>
			<input id="submit-add-comment" type="submit" name="user-submit" value="POSTER">
		</form>
	</div>
	<?php foreach ($comments as $comment): ?>
		<div class="div-comment">
			<div class="div-content-comment">
				<span class="comment-pseudo"><?php echo($comment['comment_pseudo']); ?></span>
				<p class="comment-text"><?php echo($comment['comment_text']); ?></p>
				<span class="comment-date">Posté le : <?php echo($comment['comment_date_fr']); ?> </span>
			</div>			
			<div class="div-comment-button">
				<button class="button-signal-comment"><i class="fas fa-exclamation-triangle"></i><a href="index.php?action=Lecture&amp;id=<?php echo($billet['billet_id']); ?>&amp;comment_id=<?php echo($comment['comment_id']); ?>" class="a-signal-comment" > SIGNALER</a></button>
				<?php if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
				if($_SESSION['pseudo'] == $_COOKIE['idSession']){?>		
					<button class="comment-edit">EDITER</button>
			</div>	
			<div class="div-delete-comment">
				<h2 class="title-delete-comment">Êtes-vous sûr de vouloir supprimer ce commentaire ?</h2>
				<p class="text-delete-comment"><?php echo($comment['comment_text']); ?></p>
				<div class="choice-delete-comment">
					<a class="yes-delete-comment" href="index.php?action=Lecture&amp;id=<?php echo $comment['id_billet_comment']; ?>&amp;comment=<?php echo $comment['comment_id']; ?>">OUI</a>
					<button class="no-delete-comment">NON</button>
				</div>
			</div>
				<?php }
				} ?>
		</div>
	<?php endforeach; ?>
</section>