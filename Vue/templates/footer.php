<footer>
	<ul id="ul-footer-menu">
		<li class="footer-menu"><a href="index.php?action=Accueil">ACCUEIL</a></li>
		<li class="footer-menu" ><a href="index.php?action=Lecture">LECTURE</li>
		<li class="footer-menu"><a href="index.php#section-biography?action=Accueil">BIOGRAPHIE</a></li>
		<li class="footer-menu"><a href="index.php?action=Contact">CONTACT</a></li>
		<?php 
		if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
		if($_SESSION['pseudo'] == $_COOKIE['idSession']){?>		
		<li class="footer-menu"><a href="index.php?action=Deconnection">DECONNECTION</a></li><?php
		}
		}else{ ?>
		<li class="footer-menu"><a href="index.php?action=AdminConnect"><i class="fas fa-user-shield"></i></a></li><?php } ?>
	</ul>	
	<p id="text-footer"><i class="far fa-copyright"></i> 2020 Thomas COELHO - Projet 4 Openclassrooms.</p>
</footer>