<?php
	/* General controller */

	require_once("./private/config.php");
	require_once("./views/IndexView.class.php");
	require_once("./models/IndexModel.class.php");


	$view = new IndexView();
	$model = new IndexModel($db);

	$view->header("DK-Quest - Norfendre");
		$view->topBar();

		$questsNorfendre = array();
		
		$questsNorfendre['Toundra Boreenne'] = $model->getQuestList("Norfendre - Toundra Boréenne");
		$questsNorfendre['Fjord Hurlant'] = $model->getQuestList("Norfendre - Fjord Hurlant");
		$questsNorfendre['Désolation des dragons'] = $model->getQuestList("Norfendre - Désolation des dragons");
		$questsNorfendre['Bassin de Sholazar'] = $model->getQuestList("Norfendre - Bassin de Sholazar");
		$questsNorfendre['Couronne de glace'] = $model->getQuestList("Norfendre - Couronne de glace");
		$questsNorfendre['Zul Drak'] = $model->getQuestList("Norfendre - Zul Drak");
		$questsNorfendre['Pics foudroyés'] = $model->getQuestList("Norfendre - Pics foudroyés");
		$questsNorfendre['Fôret du chant de cristal'] = $model->getQuestList("Norfendre - Fôret du chant de cristal");
		$questsNorfendre['Les Grisonnes'] = $model->getQuestList("Norfendre - Les Grisonnes");


		$view->tabNorfendre($questsNorfendre);

		$view->footer();
	$view->closeBody();
	$view->closeHTML();
?>