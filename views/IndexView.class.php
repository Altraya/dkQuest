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
			      		<h1><a href="./index.php">DK-Quest - Wotlk</a></h1>
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
					          	<li><a href="#">Royaume de l\'est</a></li>
					          	<li><a href="./kalimdor.php">Kalimdor</a></li>
					          	<li><a href="#">Outreterre</a></li>
					          	<li><a href="./norfendre.php">Norfendre</a></li>

					        </ul>
			      		</li>
			      		<li class="has-dropdown">
					        <a href="#">Extension</a>
					        <ul class="dropdown">
					          	<li><a href="./index.php">DK-Quest - Wotlk</a></li>
					          	<li><a href="./cata/index.php">Dk-Quest - Cataclysm</a></li>
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
						<td><a href="http://www.dkprod.ch/dkdb/?quest='.$quest->getId().'">'.$quest->getId().'</a></td>
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
	//not use anymore
	public function tab($questsNorfendre, $questsOutreterre, $questsKalimdor, $questsRoyaumeEst)
	{
		$html = '';
		$html.= '
			<ul class="tabs" data-tab role="tablist">
			  	<li class="tab-title active"><a href="#panel1">Norfendre</a></li>
			  	<li class="tab-title"><a href="#panel2">Outreterre</a></li>
			  	<li class="tab-title"><a href="#panel3">Kalimdor</a></li>
			  	<li class="tab-title"><a href="#panel4">Royaume de l\'est</a></li>
			</ul>
			<div class="tabs-content">
			  	<div class="content active" id="panel1">
			    	<p>'.$this->table($questsNorfendre).'</p>
			  	</div>
				<div class="content" id="panel2">
			    	<p>'.$this->table($questsOutreterre).'</p>
			  	</div>
			  	<div class="content" id="panel3">
			    	<p>'.$this->table($questsKalimdor).'</p>
			  	</div>
			  	<div class="content" id="panel4">
			    	<p>'.$this->table($questsRoyaumeEst).'</p>
			  	</div>
			</div>
		';
		echo($html);
	}

	//show the tab and the tab content (table with quests for each zone on norfendre)
	public function tabNorfendre($questsNorfendre)
	{
		$questsToundraBoreenne = $questsNorfendre['Toundra Boreenne'];
		$questsFjordHurlant = $questsNorfendre['Fjord Hurlant'];
		$questsDesolation = $questsNorfendre['Désolation des dragons'];
		$questsBassin = $questsNorfendre['Bassin de Sholazar'];
		$questsCouronne = $questsNorfendre['Couronne de glace'];
		$questsZul = $questsNorfendre['Zul Drak'];
		$questsPics = $questsNorfendre['Pics foudroyés'];
		$questsForet = $questsNorfendre['Fôret du chant de cristal'];

		$html = '';
		$html.= '
			<ul class="tabs" data-tab role="tablist">
			  	<li class="tab-title active"><a href="#panel1">Toundra Boreenne</a></li>
			  	<li class="tab-title"><a href="#panel2">Fjord Hurlant</a></li>
			  	<li class="tab-title"><a href="#panel3">Désolation des dragons</a></li>
			  	<li class="tab-title"><a href="#panel4">Bassin de Sholazar</a></li>
			  	<li class="tab-title"><a href="#panel5">Couronne de glace</a></li>
			  	<li class="tab-title"><a href="#panel6">Zul Drak</a></li>
			  	<li class="tab-title"><a href="#panel6">Pics foudroyés</a></li>
			  	<li class="tab-title"><a href="#panel6">Fôret du chant de cristal</a></li>
			</ul>
			<div class="tabs-content">
			  	<div class="content active" id="panel1">
			    	<p>'.$this->table($questsToundraBoreenne).'</p>
			  	</div>
				<div class="content" id="panel2">
			    	<p>'.$this->table($questsFjordHurlant).'</p>
			  	</div>
			  	<div class="content" id="panel3">
			    	<p>'.$this->table($questsDesolation).'</p>
			  	</div>
			  	<div class="content" id="panel4">
			    	<p>'.$this->table($questsBassin).'</p>
			  	</div>
				<div class="content" id="panel5">
			    	<p>'.$this->table($questsCouronne).'</p>
			  	</div>
			  	<div class="content" id="panel6">
			    	<p>'.$this->table($questsZul).'</p>
			  	</div>
			  	<div class="content" id="panel7">
			    	<p>'.$this->table($questsPics).'</p>
			  	</div>
			  	<div class="content" id="panel8">
			    	<p>'.$this->table($questsForet).'</p>
			  	</div>
			</div>
		';
		echo($html);
	}

//show the tab and the tab content (table with quests for each zone)
	public function tabKalimdor($questsKalimdor)
	{

		$questsAzshara = $questsKalimdor['Azshara'];
		$questsBerceau = $questsKalimdor['Berceau de l\'hiver'];
		$questsUnGoro = $questsKalimdor['Cratère d\'Un Goro'];
		$questsDurotar = $questsKalimdor['Durotar'];
		$questsDesolace = $questsKalimdor['Désolace'];
		$questsFeralas = $questsKalimdor['Féralas'];
		$questsGangrebois = $questsKalimdor['Gangrebois'];
		$questsSerresRocheuses = $questsKalimdor['Les Serres-Rocheuses'];
		$questsTarides = $questsKalimdor['Les Tarides'];
		$questsMarecage = $questsKalimdor['Marécage d\'Âprefange'];
		$questsMillePointes = $questsKalimdor['Mille pointes'];
		$questsMulgore = $questsKalimdor['Mulgore'];
		$questsOrneval = $questsKalimdor['Orneval'];
		$questsRefletDeLune = $questsKalimdor['Reflet de Lune'];
		$questsSilithus = $questsKalimdor['Silithus'];
		$questsSombrivage = $questsKalimdor['Sombrivage'];
		$questsTanaris = $questsKalimdor['Tanaris'];
		$questsTeldrassil = $questsKalimdor['Teldrassil'];
		$questsBrumeAzur = $questsKalimdor['Île de Brume-azur'];
		$questsBrumeSang = $questsKalimdor['Île de Brume-sang'];

		$html = '';
		$html.= '
			<ul class="tabs" data-tab role="tablist">
			  	<li class="tab-title active"><a href="#panel1">Azshara</a></li>
			  	<li class="tab-title"><a href="#panel2">Berceau de l\'hiver</a></li>
			  	<li class="tab-title"><a href="#panel3">Cratère d\'Un Goro</a></li>
			  	<li class="tab-title"><a href="#panel4">Durotar</a></li>
			  	<li class="tab-title"><a href="#panel5">Désolace</a></li>
			  	<li class="tab-title"><a href="#panel6">Féralas</a></li>
			  	<li class="tab-title"><a href="#panel7">Gangrebois</a></li>
			  	<li class="tab-title"><a href="#panel8">Les Serres-Rocheuses</a></li>
			  	<li class="tab-title"><a href="#panel9">Les Tarides</a></li>
			  	<li class="tab-title"><a href="#panel10">Marécage d\'Âprefange</a></li>
			  	<li class="tab-title"><a href="#panel11">Mille pointes</a></li>
			  	<li class="tab-title"><a href="#panel12">Mulgore</a></li>
			  	<li class="tab-title"><a href="#panel13">Orneval</a></li>
			  	<li class="tab-title"><a href="#panel14">Reflet de Lune</a></li>
			  	<li class="tab-title"><a href="#panel15">Silithus</a></li>
			  	<li class="tab-title"><a href="#panel16">Sombrivage</a></li>
			  	<li class="tab-title"><a href="#panel17">Tanaris</a></li>
			  	<li class="tab-title"><a href="#panel18">Teldrassil</a></li>
			  	<li class="tab-title"><a href="#panel19">Île de Brume-azur</a></li>
			  	<li class="tab-title"><a href="#panel20">Île de Brume-sang</a></li>
			</ul>
			<div class="tabs-content">
			  	<div class="content active" id="panel1">
			    	<p>'.$this->table($questsAzshara).'</p>
			  	</div>
				<div class="content" id="panel2">
			    	<p>'.$this->table($questsBerceau).'</p>
			  	</div>
			  	<div class="content" id="panel3">
			    	<p>'.$this->table($questsUnGoro).'</p>
			  	</div>
			  	<div class="content" id="panel4">
			    	<p>'.$this->table($questsDurotar).'</p>
			  	</div>
				<div class="content" id="panel5">
			    	<p>'.$this->table($questsDesolace).'</p>
			  	</div>
			  	<div class="content" id="panel6">
			    	<p>'.$this->table($questsFeralas).'</p>
			  	</div>
			  	<div class="content" id="panel7">
			    	<p>'.$this->table($questsGangrebois).'</p>
			  	</div>
			  	<div class="content" id="panel8">
			    	<p>'.$this->table($questsSerresRocheuses).'</p>
			  	</div>
			  	<div class="content" id="panel9">
			    	<p>'.$this->table($questsTarides).'</p>
			  	</div>
			  	<div class="content" id="panel10">
			    	<p>'.$this->table($questsMarecage).'</p>
			  	</div>
			  	<div class="content" id="panel11">
			    	<p>'.$this->table($questsMillePointes).'</p>
			  	</div>
			  	<div class="content" id="panel12">
			    	<p>'.$this->table($questsMulgore).'</p>
			  	</div>
			  	<div class="content" id="panel13">
			    	<p>'.$this->table($questsOrneval).'</p>
			  	</div>
			  	<div class="content" id="panel14">
			    	<p>'.$this->table($questsRefletDeLune).'</p>
			  	</div>
			  	<div class="content" id="panel15">
			    	<p>'.$this->table($questsSilithus).'</p>
			  	</div>
			  	<div class="content" id="panel16">
			    	<p>'.$this->table($questsSombrivage).'</p>
			  	</div>
			  	<div class="content" id="panel17">
			    	<p>'.$this->table($questsTanaris).'</p>
			  	</div>
			  	<div class="content" id="panel18">
			    	<p>'.$this->table($questsTeldrassil).'</p>
			  	</div>
			  	<div class="content" id="panel19">
			    	<p>'.$this->table($questsBrumeAzur).'</p>
			  	</div>
			  	<div class="content" id="panel20">
			    	<p>'.$this->table($questsBrumeSang).'</p>
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

	public function messageIndex(){
		$html ='';
		$html.='
			<center><h1>Bienvenue sur le DKquest</h1></center>
			<div class="panel">
				<p>
					Cette appli vous permet :<br/><br/>
						- De savoir directement l\'id d\'une quete.<br/>
						- De savoir si elle est bug fonctionnelle ou débug.<br/>
						- Si elle est simplement fonctionnelle la partie commentaire vous permet d\'avoir une précision pour la validation de la quête<br/> 
						<small>Par exemple : se coller au pnj pour réussir à la valider.</small><br/>
						- De savoir la dernière date de moditication ou de test de la quête.<br/>
						- Si elle est bug d\'avoir directement le rapport de bug de la quête en question.<br/>
						<small>Pour tout centraliser et ne pas avoir à chercher.</small><br/>
						<br/>
					Vous pouvez directement add les quêtes que vous rencontrez.<br/>
					<br/>
					Cliquez sur le menu zone pour trouver les quêtes d\une zone précise. Pour add une quête cliquez sur le bouton add a quest.<br/>
					<br/>
					Fonctionnalitées manquante et en cours de dev :<br/>
						- Mettre les liens de la DkDB pour les ids pour vous renvoyer directement sur la quête.<br/>
						- Faire les zones : Royaume de l\'est et Outreterre.<br/>
						- Une fonction de recherche par nom / id / statut / rapport de bug.<br/>	
						- Permettre d\'ajouter des quêtes ailleurs qu\'en Norfendre.<br/>			
				</p>
			</div>
		';
		echo($html);
	}

	public function footer(){
		$html = '';
		$html.='
			<center><p><small>Puissent vos jours être longs, et vos difficultés passagères.</small></p></center>
		';
		echo($html);
	}

}
?>