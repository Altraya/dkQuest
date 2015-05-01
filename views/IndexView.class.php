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
				';
				$this->googleAnalytic();
		$html.='
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
					          	<li><a href="./royaumeDeLest.php">Royaume de l\'est</a></li>
					          	<li><a href="./kalimdor.php">Kalimdor</a></li>
					          	<li><a href="./outreterre.php">Outreterre</a></li>
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
			  	<li class="tab-title"><a href="#panel7">Pics foudroyés</a></li>
			  	<li class="tab-title"><a href="#panel8">Fôret du chant de cristal</a></li>
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

	//show the tab and the tab content (table with quests for each zone on norfendre)
	public function tabOutreterre($questsOutreterre)
	{

		$html = '';
		$html.= '
			<ul class="tabs" data-tab role="tablist">
			  	<li class="tab-title active"><a href="#panel1">Forêt de Terokkar</a></li>
			  	<li class="tab-title"><a href="#panel2">Les Tranchantes</a></li>
			  	<li class="tab-title"><a href="#panel3">Marécage de Zangar</a></li>
			  	<li class="tab-title"><a href="#panel4">Nagrand</a></li>
			  	<li class="tab-title"><a href="#panel5">Péninsule des Flammes infernales</a></li>
			  	<li class="tab-title"><a href="#panel6">Raz-de-Néant</a></li>
			  	<li class="tab-title"><a href="#panel7">Vallée d\'Ombrelune</a></li>
			</ul>
			<div class="tabs-content">
			';
			$num = 1;
			foreach ($questsOutreterre as $keyQ => $questOT) {
				if($num == 1)
				{
					$html.='
					<div class="content active" id="panel'.$num.'">
			    		<p>'.$this->table($questOT).'</p>
			  		</div>
				';
				}
				else
				{
					$html.='
						<div class="content" id="panel'.$num.'">
				    		<p>'.$this->table($questOT).'</p>
				  		</div>
					';
				}	
				$num ++;
			}
			
			$html.='
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

	//show the tab and the tab content (table with quests for each zone)
	public function tabRoyaumeEst($questsRoyaumeEst)
	{

		$questsBoisPenombre = $questsRoyaumeEst['Bois de la Pénombre'];
		$questsBoisChantsEternels = $questsRoyaumeEst['Bois des Chants éternels'];
		$questsClairiereTirisfal = $questsRoyaumeEst['Clairières de Tirisfal'];
		$questsContreforts = $questsRoyaumeEst['Contreforts de Hautebrande'];
		$questsDunMorogh = $questsRoyaumeEst['Dun Morogh'];
		$questsDeuillevent = $questsRoyaumeEst['Défilé de Deuillevent'];
		$questsElwynn = $questsRoyaumeEst['Forêt d\'Elwynn'];
		$questsPinsArgentes = $questsRoyaumeEst['Forêt des Pins argentés'];
		$questsGorges = $questsRoyaumeEst['Gorge des Vents brûlants'];
		$questsArathi = $questsRoyaumeEst['Hautes-terres d\'Arathi'];
		$questsCarmine = $questsRoyaumeEst['Les carmines'];
		$questsHinterlands = $questsRoyaumeEst['Les Hinterlands'];
		$questsPaluns = $questsRoyaumeEst['Les Paluns'];
		$questsTerresFantomes = $questsRoyaumeEst['Les Terres fantômes'];
		$questsLochModan = $questsRoyaumeEst['Loch Modan'];
		$questsMaleterresEst = $questsRoyaumeEst['Maleterres de l\'est'];
		$questsMaleterresOuest = $questsRoyaumeEst['Maleterres de l\'ouest'];
		$questsMaraisChagrin = $questsRoyaumeEst['Marais des Chagrins'];
		$questsMarcheOuest = $questsRoyaumeEst['Marche de l\'Ouest'];
		$questsSteppesArdentes = $questsRoyaumeEst['Steppes ardentes'];
		$questsTerresFoudroyes = $questsRoyaumeEst['Terres foudroyées'];
		$questsTerresIngrates = $questsRoyaumeEst['Terres ingrates'];
		$questsValleeStrangleronce = $questsRoyaumeEst['Vallée de Strangleronce'];
		$questQuelDanas = $questsRoyaumeEst['Île de Quel\'Danas'];

		$html = '';
		$html.= '
			<ul class="tabs" data-tab role="tablist">
			  	<li class="tab-title active"><a href="#panel1">Bois de la Pénombre</a></li>
			  	<li class="tab-title"><a href="#panel2">Bois des Chants éternels</a></li>
			  	<li class="tab-title"><a href="#panel3">Clairières de Tirisfal</a></li>
			  	<li class="tab-title"><a href="#panel4">Contreforts de Hautebrande</a></li>
			  	<li class="tab-title"><a href="#panel5">Dun Morogh</a></li>
			  	<li class="tab-title"><a href="#panel6">Défilé de Deuillevent</a></li>
			  	<li class="tab-title"><a href="#panel7">Forêt d\'Elwynn</a></li>
			  	<li class="tab-title"><a href="#panel8">Forêt des Pins argentés</a></li>
			  	<li class="tab-title"><a href="#panel9">Gorge des Vents brûlants</a></li>
			  	<li class="tab-title"><a href="#panel10">Hautes-terres d\'Arathi</a></li>
			  	<li class="tab-title"><a href="#panel11">Les carmines</a></li>
			  	<li class="tab-title"><a href="#panel12">Les Hinterlands</a></li>
			  	<li class="tab-title"><a href="#panel13">Les Paluns</a></li>
			  	<li class="tab-title"><a href="#panel14">Les Terres fantômes</a></li>
			  	<li class="tab-title"><a href="#panel15">Loch Modan</a></li>
			  	<li class="tab-title"><a href="#panel16">Maleterres de l\'est</a></li>
			  	<li class="tab-title"><a href="#panel17">Maleterres de l\'ouest</a></li>
			  	<li class="tab-title"><a href="#panel18">Marais des Chagrins</a></li>
			  	<li class="tab-title"><a href="#panel19">Marche de l\'Ouest</a></li>
			  	<li class="tab-title"><a href="#panel20">Steppes ardente</a></li>
			  	<li class="tab-title"><a href="#panel21">Terres foudroyées</a></li>
			  	<li class="tab-title"><a href="#panel22">Terres ingrates</a></li>
			  	<li class="tab-title"><a href="#panel23">Vallée de Strangleronce</a></li>
			  	<li class="tab-title"><a href="#panel24">Île de Quel\'Danas</a></li>
			</ul>
			<div class="tabs-content">
			  	<div class="content active" id="panel1">
			    	<p>'.$this->table($questsBoisPenombre).'</p>
			  	</div>
				<div class="content" id="panel2">
			    	<p>'.$this->table($questsBoisChantsEternels).'</p>
			  	</div>
			  	<div class="content" id="panel3">
			    	<p>'.$this->table($questsClairiereTirisfal).'</p>
			  	</div>
			  	<div class="content" id="panel4">
			    	<p>'.$this->table($questsContreforts).'</p>
			  	</div>
				<div class="content" id="panel5">
			    	<p>'.$this->table($questsDunMorogh).'</p>
			  	</div>
			  	<div class="content" id="panel6">
			    	<p>'.$this->table($questsDeuillevent).'</p>
			  	</div>
			  	<div class="content" id="panel7">
			    	<p>'.$this->table($questsElwynn).'</p>
			  	</div>
			  	<div class="content" id="panel8">
			    	<p>'.$this->table($questsPinsArgentes).'</p>
			  	</div>
			  	<div class="content" id="panel9">
			    	<p>'.$this->table($questsGorges).'</p>
			  	</div>
			  	<div class="content" id="panel10">
			    	<p>'.$this->table($questsArathi).'</p>
			  	</div>
			  	<div class="content" id="panel11">
			    	<p>'.$this->table($questsCarmine).'</p>
			  	</div>
			  	<div class="content" id="panel12">
			    	<p>'.$this->table($questsHinterlands).'</p>
			  	</div>
			  	<div class="content" id="panel13">
			    	<p>'.$this->table($questsPaluns).'</p>
			  	</div>
			  	<div class="content" id="panel14">
			    	<p>'.$this->table($questsTerresFantomes).'</p>
			  	</div>
			  	<div class="content" id="panel15">
			    	<p>'.$this->table($questsLochModan).'</p>
			  	</div>
			  	<div class="content" id="panel16">
			    	<p>'.$this->table($questsMaleterresEst).'</p>
			  	</div>
			  	<div class="content" id="panel17">
			    	<p>'.$this->table($questsMaleterresOuest).'</p>
			  	</div>
			  	<div class="content" id="panel18">
			    	<p>'.$this->table($questsMaraisChagrin).'</p>
			  	</div>
			  	<div class="content" id="panel19">
			    	<p>'.$this->table($questsMarcheOuest).'</p>
			  	</div>
			  	<div class="content" id="panel20">
			    	<p>'.$this->table($questsSteppesArdentes).'</p>
			  	</div>
			  	<div class="content" id="panel21">
			    	<p>'.$this->table($questsTerresFoudroyes).'</p>
			  	</div>
			  	<div class="content" id="panel22">
			    	<p>'.$this->table($questsTerresIngrates).'</p>
			  	</div>
			  	<div class="content" id="panel23">
			    	<p>'.$this->table($questsValleeStrangleronce).'</p>
			  	</div>
			  	<div class="content" id="panel24">
			    	<p>'.$this->table($questQuelDanas).'</p>
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
						- Mettre les liens de la DkDB pour les ids pour vous renvoyer directement sur la quête. - Fait<br/>
						- Faire les zones : Royaume de l\'est et Outreterre. - Fait<br/>
						- Permettre d\'ajouter des quêtes ailleurs qu\'en Norfendre. - Fait<br/>	
						- Une fonction de recherche par nom / id / statut / rapport de bug.<br/>	
						- Permettre de trier chaque tableau par chaque critère. <br/>
						- Ajouter un champ pour le nom du testeur ? <br/>
						- Ajouter un champ pour la faction -> Alliance / Horde ou les deux. <br/>
				</p>
				<p>Ce site utilise googleAnalytic à des fins de statistiques. Toutes les données receuillies sont strictement anonymes, en continuant votre navigation, vous reconnaissez en avoir été informé et acceptez la transmition de ces données.</p>
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

	public function googleAnalytic(){
		$html = '';
		$html.='
			<script>
			  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');

			  ga(\'create\', \'UA-58797963-2\', \'auto\');
			  ga(\'send\', \'pageview\');

			</script>
		';
		echo($html);
	}
}
?>