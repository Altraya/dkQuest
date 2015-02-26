<?php
	/* General controller */

	require_once("./private/config.php");
	require_once("./views/IndexView.class.php");
	require_once("./models/IndexModel.class.php");


	$view = new IndexView();
	$model = new IndexModel($db);

	$view->header("DK-Quest - Accueil");
		$view->topBar();

		$questsHyjal = $model->getQuestList("Hyjal");
		$questsVash = $model->getQuestList("Vash\'Jir");
		$questsTrefond = $model->getQuestList("Le tréfond");
		$questsUldum = $model->getQuestList("Uldum");
		$questsCrepu = $model->getQuestList("Les Hautes terres du crépuscule");

		$view->tab($questsHyjal, $questsVash, $questsTrefond, $questsUldum, $questsCrepu);
	$view->closeBody();
	$view->closeHTML();
?>