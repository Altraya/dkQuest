<?php
/* 
	FormView.class.php : View for form and page to add / update or remove quest 

	Author = Karakayn
*/

class FormView{

	public function __construct(){
	}

	public function title(){
		$html = '
		<center>
			<h1 class="subheader">Ajouter une quête</h1>
			<p><small>Attention tout ajout est définitif, faites bien attention à ce que vous envoyez vous ne pourrez pas y modifier</small></p>
		</center>
		';
		echo($html);
	}

	public function formAddQuest(){
		$html = '';

		$html.='

		<form data-abide id="formAddQuest" action="addQuest.php" method="post">
			<div class="row">
		    	<div class="large-4 columns">
					<div class="id-field">
						<label for="id">Id <small>required</small>
					  		<input name="id" type="text" required pattern="number" placeholder="Id de la quête">
						</label>
						<small class="error">L\'id de la quête doit être un nombre valide</small>
					</div>
				</div>

				<div class="large-4 columns">
					<div class="nom-field">
						<label for="nom">Nom <small>required</small>
						  <input name="nom" type="text" required placeholder="Nom de la quête">
						</label>
					</div>
				</div>
		
			
				<div class="large-4 columns">
					<div class="date-field">
						<label for="date">Date de dernière modification ou test
							<input name="date" type="date" required pattern="date" placeholder="" />
						</label>
						<small class="error">Entrez une date valide sur le format (JJ/MM/AAAA)(ou AAAA-MM-DD pour les utilisateurs de firefox)</small>
					</div>
				</div>
			</div>

			<div class="row">
		    	<div class="large-6 columns">
					<div class="situation-field">
						<label for="situation">Situation
					        <select name="situation">
					          <option value="Débug">Débug</option>
					          <option value="Fonctionnelle">Fonctionnelle</option>
					          <option value="Bug">Bug</option>
					        </select>
					    </label>
					</div>
				</div>

				<div class="large-6 columns">
					<div class="zone-field">
						<label for="zone">Zone
					        <select name="zone">
								<optgroup label="Royaume de l\'est">
									<option value="Royaume de l\'est - Bois de la Pénombre">Bois de la Pénombre</option>
									<option value="Royaume de l\'est - Bois des Chants éternels">Bois des Chants éternels</option>
									<option value="Royaume de l\'est - Clairières de Tirisfal">Clairières de Tirisfal</option>
									<option value="Royaume de l\'est - Contreforts de Hautebrande">Contreforts de Hautebrande</option>
									<option value="Royaume de l\'est - Dun Morogh">Dun Morogh</option>
									<option value="Royaume de l\'est - Défilé de Deuillevent">Défilé de Deuillevent</option>
									<option value="Royaume de l\'est - Forêt d\'Elwynn">Forêt d\'Elwynn</option>
									<option value="Royaume de l\'est - Forêt des Pins argentés">Forêt des Pins argentés</option>
									<option value="Royaume de l\'est - Gorge des Vents brûlants">Gorge des Vents brûlants</option>
									<option value="Royaume de l\'est - Hautes-terres d\'Arathi">Hautes-terres d\'Arathi</option>
									<option value="Royaume de l\'est - Les carmines">Les carmines</option>
									<option value="Royaume de l\'est - Les Hinterlands">Les Hinterlands</option>
									<option value="Royaume de l\'est - Les Paluns">Les Paluns</option>
									<option value="Royaume de l\'est - Les Terres fantômes">Les Terres fantômes</option>
									<option value="Royaume de l\'est - Loch Modan">Loch Modan</option>
									<option value="Royaume de l\'est - Maleterres de l\'est">Maleterres de l\'est</option>
									<option value="Royaume de l\'est - Maleterres de l\'ouest">Maleterres de l\'ouest</option>
									<option value="Royaume de l\'est - Marais des Chagrins">Marais des Chagrins</option>
									<option value="Royaume de l\'est - Marche de l\'Ouest">Marche de l\'Ouest</option>
									<option value="Royaume de l\'est - Steppes ardentes">Steppes ardentes</option>
									<option value="Royaume de l\'est - Terres foudroyées">Terres foudroyées</option>
									<option value="Royaume de l\'est - Terres ingrates">Terres ingrates</option>
									<option value="Royaume de l\'est - Vallée de Strangleronce">Vallée de Strangleronce</option>
									<option value="Royaume de l\'est - Île de Quel\'Danas">Île de Quel\'Danas</option>
					        	</optgroup>

					        	<optgroup label="Kalimdor">
									<option value="Kalimdor - Azshara">Azshara</option>
						          	<option value="Kalimdor - Berceau de l\'hiver">Berceau de l\'hiver</option>
						          	<option value="Kalimdor - Cratère d\'Un Goro">Cratère d\'Un Goro</option>
						          	<option value="Kalimdor - Durotar">Durotar</option>
						          	<option value="Kalimdor - Désolace">Désolace</option>
						        	<option value="Kalimdor - Féralas">Féralas</option>
						           	<option value="Kalimdor - Les Serres-Rocheuses">Les Serres-Rocheuses</option>
						           	<option value="Kalimdor - Les Tarides">Les Tarides</option>
						           	<option value="Kalimdor - Marécage d\'Âprefange">Marécage d\'Âprefange</option>
						           	<option value="Kalimdor - Mille pointes">Mille pointes</option>
						           	<option value="Kalimdor - Mulgore">Mulgore</option>
						           	<option value="Kalimdor - Orneval">Orneval</option>
						           	<option value="Kalimdor - Reflet de Lune">Reflet de Lune</option>
						           	<option value="Kalimdor - Silithus">Silithus</option>
					           		<option value="Kalimdor - Sombrivage">Sombrivage</option>
				           			<option value="Kalimdor - Tanaris">Tanaris</option>
			           				<option value="Kalimdor - Teldrassil">Teldrassil</option>
			           				<option value="Kalimdor - Île de Brume-azur">Île de Brume-azur</option>
			           				<option value="Kalimdor - Île de Brume-sang">Île de Brume-sang</option>
					        	</optgroup>

					        	<optgroup label="Outreterre">
									<option value="Outreterre - Forêt de Terokkar">Forêt de Terokkar</option>
						          	<option value="Outreterre - Les Tranchantes">Les Tranchantes</option>
						          	<option value="Outreterre - Marécage de Zangar">Marécage de Zangar</option>
						          	<option value="Outreterre - Nagrand">Nagrand</option>
						          	<option value="Outreterre - Péninsule des Flammes infernales">Péninsule des Flammes infernales</option>
						        	<option value="Outreterre - Raz-de-Néant">Raz-de-Néant</option>
						           	<option value="Outreterre - Vallée d\'Ombrelune">Vallée d\'Ombrelune</option>
					        	</optgroup>

					        	<optgroup label="Norfendre">
						          	<option value="Norfendre - Toundra Boréenne">Toundra Boréenne</option>
						          	<option value="Norfendre - Fjord Hurlant">Fjord Hurlant</option>
						          	<option value="Norfendre - Désolation des dragons">Désolation des dragons</option>
						          	<option value="Norfendre - Bassin de Sholazar">Bassin de Sholazar</option>
						          	<option value="Norfendre - Couronne de glace">Couronne de glace</option>
						        	<option value="Norfendre - Zul Drak">Zul Drak</option>
						           	<option value="Norfendre - Pics foudroyés">Pics foudroyés</option>
						           	<option value="Norfendre - Fôret du chant de cristal">Fôret du champ de cristal</option>
						        </optgroup>
					        </select>
						</label>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="large-12 columns">
					<label for"lien">Lien
						<input name="lien" type="text" pattern="url" placeholder="Lien du rapport de bug (si existant)" />
					</label>
					<small class="error">Entrez une adresse URL valide (sous la forme http://machin.truc.com)</small>

				</div>
			</div>

			<div class="row">
				<div class="large-12 columns">
					<label for"commentaire">Commentaire
						<textarea name="commentaire" placeholder="Commentaire concernant la quête"></textarea>
					</label>
				</div>
			</div>

			<br/>
			<div class="row">
				<div class="large-12 columns">
					<button name="buttonFormAddQuest" form="formAddQuest" class="button secondary expand" type="submit">Ajouter cette quête</button>
				</div>
			</div>
		</form>
		';
		echo($html);
	}

	public function successMessage(){
		$html = 'Votre quête à bien été ajouté ! <a href="./index.php">Revenir à la liste des quêtes</a> <a href="./addQuest.php">Revenir à l\'ajout de quêtes</a>';
		echo($html);
	}
}
?>