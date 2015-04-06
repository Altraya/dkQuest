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
					          	<option value="Norfendre - Toundra Boréenne">Toundra Boréenne</option>
					          	<option value="Norfendre - Fjord Hurlant">Fjord Hurlant</option>
					          	<option value="Norfendre - Désolation des dragons">Désolation des dragons</option>
					          	<option value="Norfendre - Bassin de Sholazar">Bassin de Sholazar</option>
					          	<option value="Norfendre - Couronne de glace">Couronne de glace</option>
					        	<option value="Norfendre - Zul Drak">Zul Drak</option>
					           	<option value="Norfendre - Pics foudroyés">Pics foudroyés</option>
					           	<option value="Norfendre - Fôret du chant de cristal">Fôret du champ de cristal</option>
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