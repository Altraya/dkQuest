<?php
	/* Royaume de l'est quest controller */

	require_once("./private/config.php");
	require_once("./views/IndexView.class.php");
	require_once("./models/IndexModel.class.php");


	$view = new IndexView();
	$model = new IndexModel($db);

	$view->header("DK-Quest - Royaume de l'est");
		$view->topBar();

		$questsRoyaumeEst = array();
		
		$questsRoyaumeEst['Bois de la Pénombre'] = $model->getQuestList("Royaume de l'est - Bois de la Pénombre");
		$questsRoyaumeEst['Bois des Chants éternels'] = $model->getQuestList("Royaume de l'est - Bois des Chants éternels");
		$questsRoyaumeEst['Clairières de Tirisfal'] = $model->getQuestList("Royaume de l'est - Clairières de Tirisfal");
		$questsRoyaumeEst['Contreforts de Hautebrande'] = $model->getQuestList("Royaume de l'est - Contreforts de Hautebrande");
		$questsRoyaumeEst['Dun Morogh'] = $model->getQuestList("Royaume de l'est - Dun Morogh");
		$questsRoyaumeEst['Défilé de Deuillevent'] = $model->getQuestList("Royaume de l'est - Défilé de Deuillevent");
		$questsRoyaumeEst['Forêt d\'Elwynn'] = $model->getQuestList("Royaume de l'est - Forêt d'Elwynn");
		$questsRoyaumeEst['Forêt des Pins argentés'] = $model->getQuestList("Royaume de l'est - Forêt des Pins argentés");
		$questsRoyaumeEst['Gorge des Vents brûlants'] = $model->getQuestList("Royaume de l'est - Gorge des Vents brûlants");
		$questsRoyaumeEst['Hautes-terres d\'Arathi'] = $model->getQuestList("Royaume de l'est - Hautes-terres d'Arathi");
		$questsRoyaumeEst['Les carmines'] = $model->getQuestList("Royaume de l'est - Les carmines");
		$questsRoyaumeEst['Les Hinterlands'] = $model->getQuestList("Royaume de l'est - Les Hinterlands");
		$questsRoyaumeEst['Les Paluns'] = $model->getQuestList("Royaume de l'est - Les Paluns");
		$questsRoyaumeEst['Les Terres fantômes'] = $model->getQuestList("Royaume de l'est - Les Terres fantômes");
		$questsRoyaumeEst['Loch Modan'] = $model->getQuestList("Royaume de l'est - Loch Modan");
		$questsRoyaumeEst['Maleterres de l\'est'] = $model->getQuestList("Royaume de l'est - Maleterres de l'est");
		$questsRoyaumeEst['Maleterres de l\'ouest'] = $model->getQuestList("Royaume de l'est - Maleterres de l'ouest");
		$questsRoyaumeEst['Marais des Chagrins'] = $model->getQuestList("Royaume de l'est - Marais des Chagrins");
		$questsRoyaumeEst['Marche de l\'Ouest'] = $model->getQuestList("Royaume de l'est - Marche de l'Ouest");
		$questsRoyaumeEst['Steppes ardentes'] = $model->getQuestList("Royaume de l'est - Steppes ardentes");
		$questsRoyaumeEst['Terres foudroyées'] = $model->getQuestList("Royaume de l'est - Terres foudroyées");
		$questsRoyaumeEst['Terres ingrates'] = $model->getQuestList("Royaume de l'est - Terres ingrates");
		$questsRoyaumeEst['Vallée de Strangleronce'] = $model->getQuestList("Royaume de l'est - Vallée de Strangleronce");
		$questsRoyaumeEst['Île de Quel\'Danas'] = $model->getQuestList("Royaume de l'est - Île de Quel'Danas");

		$view->tabRoyaumeEst($questsRoyaumeEst);

		$view->footer();
	$view->closeBody();
	$view->closeHTML();
?>