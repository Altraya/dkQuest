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
		$questsKalimdor['Berceau de l\'hiver'] = $model->getQuestList("Kalimdor - Berceau de l'hiver");
		$questsKalimdor['Cratère d\'Un Goro'] = $model->getQuestList("Kalimdor - Cratère d'Un Goro");
		$questsKalimdor['Durotar'] = $model->getQuestList("Kalimdor - Durotar");
		$questsKalimdor['Désolace'] = $model->getQuestList("Kalimdor - Désolace");
		$questsKalimdor['Féralas'] = $model->getQuestList("Kalimdor - Féralas");
		$questsKalimdor['Gangrebois'] = $model->getQuestList("Kalimdor - Gangrebois");
		$questsKalimdor['Les Serres-Rocheuses'] = $model->getQuestList("Kalimdor - Les Serres-Rocheuses");
		$questsKalimdor['Les Tarides'] = $model->getQuestList("Kalimdor - Les Tarides");
		$questsKalimdor['Marécage d\'Âprefange'] = $model->getQuestList("Kalimdor - Marécage d\'Âprefange");
		$questsKalimdor['Mille pointes'] = $model->getQuestList("Kalimdor - Mille pointes");
		$questsKalimdor['Mulgore'] = $model->getQuestList("Kalimdor - Mulgore");
		$questsKalimdor['Orneval'] = $model->getQuestList("Kalimdor - Orneval");
		$questsKalimdor['Reflet de Lune'] = $model->getQuestList("Kalimdor - Reflet de Lune");
		$questsKalimdor['Silithus'] = $model->getQuestList("Kalimdor - Silithus");
		$questsKalimdor['Sombrivage'] = $model->getQuestList("Kalimdor - Sombrivage");
		$questsKalimdor['Tanaris'] = $model->getQuestList("Kalimdor - Tanaris");
		$questsKalimdor['Teldrassil'] = $model->getQuestList("Kalimdor - Teldrassil");
		$questsKalimdor['Île de Brume-azur'] = $model->getQuestList("Kalimdor - Île de Brume-azur");
		$questsKalimdor['Île de Brume-sang'] = $model->getQuestList("Kalimdor - Île de Brume-sang");

		$view->tabKalimdor($questsKalimdor);

		$view->footer();
	$view->closeBody();
	$view->closeHTML();
?>