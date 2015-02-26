<?php
/* Vue général */

class IndexView{

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
				<link rel="stylesheet" href="css/foundation.min.css">
				<link rel="stylesheet" href="css/normalize.css">
				<link rel="stylesheet" href="css/hack.css">
				<script src="/js/vendor/modernizr.js"></script>
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
			      		<h1><a href="./index.php">DK-Quest - Cataclysm</a></h1>
			    	</li>
			     	<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			    	<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			  	</ul>

			  	<section class="top-bar-section">
			    <!-- Right Nav Section -->
			    	<ul class="right">
			    	<li class="active"><a href="./addQuest.php">Add a quest</a></li>
			      		<li class="has-dropdown">
					        <a href="#">Zones</a>
					        <ul class="dropdown">
					          	<li><a href="../index.php">DK-Quest - Wotlk</a></li>
					          	<li><a href="index.php">Dk-Quest - Cataclysm</a></li>
					        </ul>
			      		</li>
			   	 	</ul>
			  	</section>
			</nav>
		';
		echo($html);
	}


	//show table with quest
	public function table($questsArray){
		$html = '';
		$html.= '
			<table width="100%">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nom</th>
						<th>Statut</th>
						<th>Dernier test ou modif</th>
						<th>Link du rapport de bug si existant</th>
						<th>Commentaire</th>
					</tr>
				</thead>
				<tbody>
			';
			foreach ($questsArray as $aQuest => $quest) {
			$html.=	'
					<tr>
						<td>'.$quest->getId().'</td>
						<td>'.$quest->getName().'</td>
						<td>'.$quest->getSituation().'</td>
						<td>'.$quest->getLastModif().'</td>
						<td><a href="'.$quest->getLinkBugReport().'"> '.$quest->getLinkBugReport().'</a></td>
						<td>'.$quest->getComment().'</td>
					</tr>';
			}
			$html.=	'
					</tbody>
				</table>
		';
		return $html;
	}

	//show the tab and the tab content (table with quests for each zone)
	public function tab($questsHyjal, $questsVash, $questsTrefond, $questsUldum, $questsCrepu)
	{
		$html = '';
		$html.= '
			<ul class="tabs" data-tab role="tablist">
			  	<li class="tab-title active"><a href="#panel1">Hyjal</a></li>
			  	<li class="tab-title"><a href="#panel2">Vash\'Jir</a></li>
			  	<li class="tab-title"><a href="#panel3">Le tréfond</a></li>
			  	<li class="tab-title"><a href="#panel4">Uldum</a></li>
			  	<li class="tab-title"><a href="#panel5">Les Hautes terres du crépuscule</a></li>
			</ul>
			<div class="tabs-content">
			  	<div class="content active" id="panel1">
			    	<p>'.$this->table($questsHyjal).'</p>
			  	</div>
				<div class="content" id="panel2">
			    	<p>'.$this->table($questsVash).'</p>
			  	</div>
			  	<div class="content" id="panel3">
			    	<p>'.$this->table($questsTrefond).'</p>
			  	</div>
			  	<div class="content" id="panel4">
			    	<p>'.$this->table($questsUldum).'</p>
			  	</div>
			  
			  	<div class="content" id="panel5">
			    	<p>'.$this->table($questsCrepu).'</p>
			  	</div>
			</div>
		';
		echo($html);
	}

	public function endTable(){
		$html = '';
		$html.='
			</tbody>
			</table>
		';
		echo($html);
	}

	public function closeDiv(){
		echo('</div>');
	}

	public function tr(){
		echo'<tr>';
	}

	public function endTr(){
		echo'</tr>';
	}

	//Close body and include some JS files
	public function closeBody(){
		$html = '';
		$html.='
			<script src="/js/vendor/jquery.js"></script>
			<script src="/js/vendor/fastclick.js"></script>
			<script src="/js/foundation.min.js"></script>
			<script>$(document).foundation();</script>
			</body>
		';
		echo($html);
	}

	public function closeHTML(){
		echo'</html>';
	}


}
?>