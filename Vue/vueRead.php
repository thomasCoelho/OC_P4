<?php $this->titre = "Lecture"; ?>

<section id="section-read">
	<h1 id="title-read">Lecture de Un billet simple pour l'Alaska</h1>
	<?php foreach ($billets as $billet): ?>
	<div class="present-read">
		<img class="img-read" src="contenu/images/img-chap3.jpg">
		<div class="div-text-read">
		<h2 class="title-chapter-read">Chapitre <?php echo($billet['billet_id']); ?></h2>
		<div class="text-chapter-read"><?php echo($billet['billet_text']); ?></div>
		<a class="button-chapter-read" href="index.php?action=Lecture&amp;id=<?php echo($billet['billet_id']); ?>"><i class="fas fa-book book-read"></i>LIRE</a>  
		</div>
	</div>
	<?php endforeach; ?>
</section>