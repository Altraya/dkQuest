<?php
/* Vue général */

class generalView{

	public function __construct(){
	}

	public function header($pageTitle){
		$html = "";
		$html.= '
		<!doctype html>
		<html lang="fr">
			<head>
				<meta charset="utf-8">
				<title>'.$pageTitle.'</title>
				<link rel="stylesheet" href="css/foundation.css">
				<link rel="stylesheet" href="css/normalize.css">
			</head>
		<body>';

		echo($html);
	}

	//pin up the topBar of the site
	public function topBar(){
		$html = "";
		$html.='
			<nav class="top-bar" data-topbar role="navigation">
			  	<ul class="title-area">
			    	<li class="name">
			      		<h1><a href="#">Karakayn Darluok Quest</a></h1>
			    	</li>
			     	<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			    	<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			  	</ul>

			  	<section class="top-bar-section">
			    <!-- Right Nav Section -->
			    	<ul class="right">
			      		<li class="active"><a href="#">Right Button Active</a></li>
			      		<li class="has-dropdown">
					        <a href="#">Right Button Dropdown</a>
					        <ul class="dropdown">
					          	<li><a href="#">First link in dropdown</a></li>
					          	<li class="active"><a href="#">Active link in dropdown</a></li>
					        </ul>
			      		</li>
			   	 	</ul>
			  	</section>
			</nav>
		';
		echo($html);
	}

	public function closeBody(){
		echo'</body>';
	}

	public function closeHTML(){
		echo'</html>'
	}
};
?>