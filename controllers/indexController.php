<?php
	/* General controller */

	require_once("./private/config.php");
	require_once("./views/IndexView.class.php");
	require_once("./models/IndexModel.class.php");


	$view = new IndexView();
	$model = new IndexModel($db);

	$view->header("DK-Quest - Accueil");
		$view->topBar();

		$questsNorfendre = $model->getQuestList("Norfendre");
		$questsOutreterre = $model->getQuestList("Outreterre");
		$questsKalimdor = $model->getQuestList("Kalimdor");
		$questsRoyaumeEst = $model->getQuestList("Royaume de l\'est");

		$view->tab($questsNorfendre, $questsOutreterre, $questsKalimdor, $questsRoyaumeEst);
	$view->closeBody();
	$view->closeHTML();
?>