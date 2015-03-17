<?php
	/* Kalimdor quest controller */

	require_once("./private/config.php");
	require_once("./views/IndexView.class.php");
	require_once("./models/IndexModel.class.php");


	$view = new IndexView();
	$model = new IndexModel($db);

	$view->header("DK-Quest - Kalimdor");
		$view->topBar();

		$questsKalimdor = array();
		
		$questsKalimdor['Azshara'] = $model->getQuestList("Kalimdor - Azshara");
		$questsKalimdor['Berceau de l\'hiver'] = $model->getQuestList("Norfendre - Berceau de l'hiver");
		$questsKalimdor['Cratère d\'Un Goro'] = $model->getQuestList("Norfendre - Cratère d'Un Goro");
		$questsKalimdor['Durotar'] = $model->getQuestList("Norfendre - Durotar");
		$questsKalimdor['Désolace'] = $model->getQuestList("Norfendre - Désolace");
		$questsKalimdor['Féralas'] = $model->getQuestList("Norfendre - Féralas");
		$questsKalimdor['Gangrebois'] = $model->getQuestList("Norfendre - Gangrebois");
		$questsKalimdor['Les Serres-Rocheuses'] = $model->getQuestList("Norfendre - Les Serres-Rocheuses");
		$questsKalimdor['Les Tarides'] = $model->getQuestList("Norfendre - Les Tarides");
		$questsKalimdor['Marécage d\'Âprefange'] = $model->getQuestList("Norfendre - Marécage d\'Âprefange");
		$questsKalimdor['Mille pointes'] = $model->getQuestList("Norfendre - Mille pointes");
		$questsKalimdor['Mulgore'] = $model->getQuestList("Norfendre - Mulgore");
		$questsKalimdor['Orneval'] = $model->getQuestList("Norfendre - Orneval");
		$questsKalimdor['Reflet de Lune'] = $model->getQuestList("Norfendre - Reflet de Lune");
		$questsKalimdor['Silithus'] = $model->getQuestList("Norfendre - Silithus");
		$questsKalimdor['Sombrivage'] = $model->getQuestList("Norfendre - Sombrivage");
		$questsKalimdor['Tanaris'] = $model->getQuestList("Norfendre - Tanaris");
		$questsKalimdor['Teldrassil'] = $model->getQuestList("Norfendre - Teldrassil");
		$questsKalimdor['Île de Brume-azur'] = $model->getQuestList("Norfendre - Île de Brume-azur");
		$questsKalimdor['Île de Brume-sang'] = $model->getQuestList("Norfendre - Île de Brume-sang");

		$view->tabKalimdor($questsKalimdor);

		$view->footer();
	$view->closeBody();
	$view->closeHTML();
?>