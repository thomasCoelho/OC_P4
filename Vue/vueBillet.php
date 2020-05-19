<?php $this->titre = "Chapitre " .$billet['billet_id']; ?>

<section id="section-billet">
	<h1 id="title-billet"><?php echo($billet['billet_title'])?></h1>
	<figure id="figure-billet">
	<img class="img-billet" src="contenu/images/img-chap3.jpg">
	</figure>
	<?php if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
		if($_SESSION['pseudo'] == $_COOKIE['idSession']){?>	
			<div id="div-billet-edit">
				<a id="billet-edit" class="billet-edit">EDITER</a>
			</div>
<?php }} ?>

	<div class="text-billet"><?php echo($billet['billet_text']); ?></div>
	<span class="date-billet"><?php echo("Publié le : " .$billet['billet_date']); ?></span>	
</section>

<section id="section-comment">
	<h1 id="title-comment">Commentaires</h1>
	<button id="button-add-comment">Ajouter un commentaire</button>
	<div id="div-add-comment">
		<form id="form-add-comment" method="post" action="index.php?action=traitementComment">
			<label class="label-add-comment" for="user-pseudo">Votre Prénom</label>
			<input class="input-add-comment" type="text" name="user-pseudo" required>
			<label class="label-add-comment" for="user-text">Votre commentaire</label>
			<textarea class="text-add-comment" name="user-text" required></textarea>			
			<input type="text" name="billet-id" value=<?php echo($billet['billet_id']); ?>>
			<input id="submit-add-comment" type="submit" name="user-submit" value="POSTER">
		</form>
	</div>
	<?php foreach ($comments as $comment): ?>
	<div class="div-comment">
		<div class="div-header-comment">
		<span class="comment-pseudo"><?php echo($comment['comment_pseudo']); ?></span>
		<span class="comment-date">Posté le : <?php echo($comment['comment_date']); ?> </span>
	</div>
		<p class="comment-text"><?php echo($comment['comment_text']); ?></p>
		<?php if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
		if($_SESSION['pseudo'] == $_COOKIE['idSession']){?>		
		<button class="comment-edit">EDITER</button>
		<div class="div-delete-comment">
			<h2 class="title-delete-comment">Êtes-vous sûr de vouloir supprimer ce commentaire ?</h2>
			<p class="text-delete-comment"><?php echo($comment['comment_text']); ?></p>
			<div class="choice-delete-comment">
				<a class="yes-delete-comment" href="index.php?action=Lecture&amp;id=<?php echo $comment['id_billet_comment']; ?>&amp;comment=<?php echo $comment['comment_id']; ?>">OUI</a>
				<button class="no-delete-comment">NON</button>
			</div>
		</div>
		<?php
		}
		}?>
	</div>
	<?php endforeach; ?>
</section>