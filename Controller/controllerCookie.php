<?php 

class Cookies{

	function testCookieConnect(){
		if(isset($_COOKIE['idSession']) AND $_COOKIE['idSession'] != NULL){
			if($_SESSION['pseudo'] == $_COOKIE['idSession']){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function setCookies($idCookie, $valueCookie){
		setcookie($idCookie, $valuecookie, time() + 24*3600, null, null, false, true);
	}
}